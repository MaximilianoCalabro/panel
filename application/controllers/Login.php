<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
    
    
	public function index()
	{
                $this->load->view('temp/header');
                $this->load->view('temp/login_view');
		$this->load->view('temp/footer');
	}
}
