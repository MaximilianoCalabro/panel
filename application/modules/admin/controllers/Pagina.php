<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}

	// Frontend User CRUD
	public function index()
	{
		$crud = $this->generate_crud('groups');
		$this->mPageTitle = 'User Groups';
		$this->render_crud();
		$crud = $this->generate_crud('users');
	    $crud->columns('groups', 'username', 'email', 'first_name', 'last_name', 'active');
        $this->unset_crud_fields('ip_address', 'last_login');

		// only webmaster and admin can change member groups
		if ($crud->getState()=='list' || $this->ion_auth->in_group(array('webmaster', 'admin')))
		{
		    $crud->set_relation_n_n('groups', 'users_groups', 'groups', 'user_id', 'group_id', 'name');
		}

		// only webmaster and admin can reset user password
		if ($this->ion_auth->in_group(array('webmaster', 'admin')))
		{
		    $crud->add_action('Resetear Password', '', 'admin/user/reset_password', 'fa fa-repeat');
		}

		// disable direct create / delete Frontend User
		$crud->unset_add();
		$crud->unset_delete();

		$this->mPageTitle = 'Usuarios';
		$this->render_crud();
	}

	// Frontend Seccion Header CRUD
	public function seccion_header()
	{
		$crud = $this->generate_crud('seccion_header');
		$this->mPageTitle = 'Cabecera';
		$crud->required_fields('titulo','ruta');
		$crud->set_field_upload('ruta','public/images'); // Subir imagenes
		$crud->columns('titulo','ruta');
		$this->render_crud();
	}

	// Frontend Seccion Quienes Somos CRUD
	public function seccion_who()
	{
		$crud = $this->generate_crud('seccion_who');
		$this->mPageTitle = 'Quienes Somos';
		$crud->columns('titulo', 'subtitulo', 'texto1', 'texto2');
		$crud->display_as('texto1',"1º parrafo"); // Cambiar nombre visual
		$crud->set_subject('Quienes Somos'); // Cambiar nombre visual de tabla
		$crud->unset_add();
		$this->render_crud();
		
	}

	// Frontend Seccion Nuestra Planta CRUD
	public function seccion_plant()
	{
		$crud = $this->generate_crud('seccion_plant');
		$this->mPageTitle = 'Nuestra Planta';
		$this->render_crud();
		$crud->columns('titulo', 'texto', 'nombre', 'imagen');
	}

	// Frontend Seccion Nuestros Quesos CRUD
	public function seccion_chesse()
	{
		$crud = $this->generate_crud('seccion_chesse');
		$this->mPageTitle = 'Nuestros Quesos';
		$this->render_crud();
		$crud->columns('titulo', 'nombre', 'imagen');
	}

	// Frontend Seccion Nuestros Quesos IMG CRUD
	public function seccion_img()
	{
		$crud = $this->generate_crud('seccion_img');
		$this->mPageTitle = 'Quesos Imagenes';
		$this->render_crud();
		$crud->columns('titulo', 'ruta');
	}

	// Frontend Seccion Ubicación CRUD
	public function seccion_location()
	{
		$crud = $this->generate_crud('seccion_location');
		$this->mPageTitle = 'Ubicacion';
		$this->render_crud();
		$crud->columns('titulo', 'texto', 'nombre', 'imagen');
	}

	// Frontend Seccion Contactenos CRUD
	public function seccion_contact()
	{
		$crud = $this->generate_crud('seccion_contact');
		$this->mPageTitle = 'Contactenos';
		$this->render_crud();
		$crud->columns('titulo','texto1','texto2');
	}
	
}
