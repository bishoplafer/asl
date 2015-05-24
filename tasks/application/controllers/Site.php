<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->is_logged_in();
    }

	public function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');

		if(!isset($is_logged_in) || $is_logged_in !== true)
		{
			redirect('Login/');
		}
	}

	public function members_area()
	{
		$user = $this->session->userdata('username');
		$userType = $this->session->userdata('userType');
		$data['user'] = $user;
		$data['userType'] = $userType;

		if ($userType == 1){
			$data['main_content'] = 'create-task';
			$this->load->view('includes/template', $data);
		}
		else{
			$data['main_content'] = 'task-list';
			$this->load->view('includes/template', $data);
		}
	}

	public function new_task()
	{
		$this->load->model('Taskmodel');
		$query = $this->Taskmodel->create_task();

	}

	public function edit_task()
	{
		$data['main_content'] = 'edit-task';
		$this->load->view('includes/template', $data);
	}

	public function change_task()
	{
		$this->load->model('Taskmodel');
		$taskId = $this->uri->segment(3);
		$this->Taskmodel->update_task($taskId);
	}

	public function remove_task()
	{
		$this->load->model('Taskmodel');
		$taskId = $this->uri->segment(3);
		$this->Taskmodel->delete_task($taskId);
	}

}