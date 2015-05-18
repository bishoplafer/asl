<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->is_logged_in();
    }

	public function members_area()
	{
		$user = $this->session->userdata('username');
		$data['user'] = $user;
		$data['main_content'] = 'members_area';
		$this->load->view('includes/template', $data);
		
	}

	public function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');

		if(!isset($is_logged_in) || $is_logged_in !== true)
		{
			redirect('Login/');
		}
	}

}