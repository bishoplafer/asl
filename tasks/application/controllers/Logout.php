<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	public function index()
	{
		// $this->session->set_userdata('is_logged_in', FALSE);
		$this->session->sess_destroy();
    	redirect('Login/');
	}

}