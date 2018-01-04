<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
                
                
	}
        // Course Crud
	public function index()
	{
			$crud = $this->generate_crud('faqs');    
			
			//$crud->columns('lid','user_id', 'lecture', 'duration','datetime','admin_id');
			
			
			//$crud->set_relation('lecture_id', 'lectures', 'file_name');
			

			//$crud->unset_add();
			//$crud->unset_edit();
		
             
			$this->mTitle = 'Faqs';
			$this->render_crud();
             
	}

}
