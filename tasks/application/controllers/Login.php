<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	public function index()
	{
		$data['main_content'] = 'login-form';
		$this->load->view('includes/template', $data);
	}

	public function validate_credentials()
	{
		$this->load->model('Usermodel');
		$query = $this->Usermodel->validate();

		if($query) // if the user's credentials validated...
		{
			$userType = $this->db->query('SELECT * FROM users WHERE username ="'.$this->input->post("username").'";');
			$type = $userType->row_array();
			$data = array(
				'username' => $this->input->post('username'),
				'userType' => $type['type_id'],
				'userId' => $type['id'],
				'is_logged_in' => true
				);

			$this->session->set_userdata($data);
			redirect('Site/members_area');
		}

		else
		{
			$this->index();
		}
	}

}