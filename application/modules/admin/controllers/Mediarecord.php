<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mediarecord extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
                
                
	}
        // Course Crud
	public function index()
	{
			$crud = $this->generate_crud('mediarecords');    
			$crud->where('mediarecords.admin_id',$this->session->userdata('user_id'));
			
			$crud->columns('lid','user_id', 'lecture', 'duration','datetime','admin_id');
			$crud->set_relation('admin_id', 'admin_users', 'username');
			
			
			//$crud->set_relation('lecture_id', 'lectures', 'file_name');
			

			$crud->unset_add();
			$crud->unset_edit();
		
             
			$this->mTitle = 'Play History';
			$this->render_crud();
             
	}

}
