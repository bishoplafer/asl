<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taskmodel extends CI_Model {

	public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

   	public function create_task()
	{
		$new_task_insert_data = array(
			'task_name' => $this->input->post('taskName'),
			'task_desc' => $this->input->post('taskDesc'),
			'task_dead' => $this->input->post('taskDead'),
			'task_owner' => $this->session->userdata('userId')
		);

		$insert = $this->db->insert('tasks', $new_task_insert_data);

		$user = $this->session->userdata('username');
		$data['user'] = $user;
		$data['main_content'] = 'create-task';
		$this->load->view('includes/template', $data);
	}

	public function update_task($taskId)
	{
		$new_task_insert_data = array(
			'task_name' => $this->input->post('taskName'),
			'task_desc' => $this->input->post('taskDesc'),
			'task_dead' => $this->input->post('taskDead'),
			'task_owner' => $this->session->userdata('userId')
		);

		$this->db->where('task_id', $taskId);
		$this->db->update('tasks', $new_task_insert_data);

		$user = $this->session->userdata('username');
		$data['user'] = $user;
		$data['main_content'] = 'create-task';
		$this->load->view('includes/template', $data);
	}

	public function delete_task($taskId)
	{
		$task_data = array(
				'task_id' => $taskId
			);
		$this->db->delete('tasks', $task_data);

		$user = $this->session->userdata('username');
		$data['user'] = $user;
		$data['main_content'] = 'create-task';
		$this->load->view('includes/template', $data);
	}

	public function completed_by($taskId)
	{
		$this->load->helper('date');
		$format = 'DATE_ATOM';
		$time = time();
		$date = standard_date($format, $time);

		$task_data = array(
				'message' => $this->input->post('message'),
				'comp_user_id' => $this->session->userdata('userId'),
				'task_comp' => $date
			);

		$this->db->where('task_id', $taskId);
		$this->db->update('tasks', $task_data);
		$this->send_confirmation_email($taskId, $task_data);
	}

	public function send_confirmation_email($taskId, $task_data)
	{
		$this->db->where('task_id', $taskId);
		$this->db->from('tasks');
		$task = $this->db->get();
		$task_info = $task->result_array();
		$task_owner = $task_info[0]['task_owner'];
		$task_name = $task_info[0]['task_name'];

		$this->db->where('id', $task_owner);
		$this->db->from('users');
		$owner = $this->db->get();
		$owner_email = $owner->result_array();

		$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'bishopstaskmanager@gmail.com',
				'smtp_pass' => 'Pass1wor',
				'mailtype'  => 'html',
            	'starttls'  => true,
            	'newline'   => "\r\n"
			);
		$this->load->library('email', $config);

		$this->email->from('bishopstaskmanager@gmail.com', $this->session->userdata('username'));
		$this->email->to($owner_email[0]['email']);
		$this->email->subject($task_name.' Task has been completed!');
		$this->email->message($task_name.' has been completed'."<br /><br />".$this->session->userdata('username').' sends this message:'."<br /><br />".$task_data['message'].'.');
		
		if($this->email->send()){
			$user = $this->session->userdata('username');
			$data['user'] = $user;
			$userType = $this->session->userdata('userType');

			if ($userType == 1){
				$data['main_content'] = 'create-task';
				$this->load->view('includes/template', $data);
			}
			else{
				$data['main_content'] = 'task-list';
				$this->load->view('includes/template', $data);
			}
		}else
		{
			show_error($this->email->print_debugger());
		}
	}
}