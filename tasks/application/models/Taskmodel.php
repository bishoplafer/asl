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
}
