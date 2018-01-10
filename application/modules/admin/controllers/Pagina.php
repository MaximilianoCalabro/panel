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
		$crud->set_field_upload('ruta','public/images/header'); // Subir imagenes
		$crud->columns('titulo','ruta');
		$crud->display_as('ruta',"Imagen"); // Cambiar nombre visual
		$crud->display_as('titulo',"Título");
		$crud->set_subject('Cabecera'); // Cambiar nombre visual de tabla
		$this->render_crud();
	}

	// Frontend Seccion Quienes Somos CRUD
	public function seccion_who()
	{
		$crud = $this->generate_crud('seccion_who');
		$this->mPageTitle = 'Quienes Somos';
		$crud->columns('titulo', 'subtitulo', 'texto1', 'texto2');
		$crud->display_as('titulo',"Título");
		$crud->display_as('subtitulo',"Sub-título");
		$crud->display_as('texto1',"1º parrafo"); // Cambiar nombre visual
		$crud->display_as('texto2',"2º parrafo");
		$crud->set_subject('Quienes Somos'); // Cambiar nombre visual de tabla
		$crud->unset_add();
		$crud->unset_delete();
		$this->render_crud();
		
	}

	// Frontend Seccion Nuestra Planta CRUD
	public function seccion_plant()
	{
		$crud = $this->generate_crud('seccion_plant');
		$this->mPageTitle = 'Nuestra Planta';
		$crud->display_as('titulo',"Título");
		$crud->set_subject('Nuestra Planta');
		$crud->columns('titulo', 'texto');
		$crud->unset_add();
		$crud->unset_delete();
		$this->render_crud();
	}

	// Frontend Seccion Nuestra Planta IMG CRUD
	public function seccion_img_pla()
	{
		$crud = $this->generate_crud('seccion_img_pla');
		$this->mPageTitle = 'Imagenes Planta';
		$crud->required_fields('titulo','ruta');
		$crud->set_field_upload('ruta','public/images/planta');
		$crud->columns('titulo', 'ruta');
		$crud->display_as('ruta',"Imagen");
		$crud->display_as('titulo',"Título");
		$crud->set_subject('IMG Planta');
		$this->render_crud();
	}

	// Frontend Seccion Nuestros Quesos CRUD
	public function seccion_chesse()
	{
		$crud = $this->generate_crud('seccion_chesse');
		$this->mPageTitle = 'Nuestros Quesos';
		$crud->columns('titulo');
		$crud->display_as('titulo',"Título");
		$crud->unset_add();
		$crud->unset_delete();
		$this->render_crud();
	}

	// Frontend Seccion Nuestros Quesos IMG CRUD
	public function seccion_img_che()
	{
		$crud = $this->generate_crud('seccion_img_che');
		$this->mPageTitle = 'Imagenes Quesos';
		$crud->required_fields('titulo','ruta');
		$crud->set_field_upload('ruta','public/images/quesos');
		$crud->columns('titulo', 'ruta');
		$crud->display_as('ruta',"Imagen");
		$crud->display_as('titulo',"Título");
		$crud->set_subject('IMG Quesos');
		$this->render_crud();
	}

	// Frontend Seccion Ubicación CRUD
	public function seccion_location()
	{
		$crud = $this->generate_crud('seccion_location');
		$this->mPageTitle = 'Ubicacion';
		$crud->set_subject('Ubicación');
		$crud->columns('titulo', 'texto');
		$crud->display_as('titulo',"Título");
		$crud->unset_add();
		$crud->unset_delete();
		$this->render_crud();
	}

	// Frontend Seccion Ubicación IMG CRUD
	public function seccion_img_loc()
	{
		$crud = $this->generate_crud('seccion_img_loc');
		$this->mPageTitle = 'Imagenes Ubicación';
		$crud->required_fields('titulo','ruta');
		$crud->set_field_upload('ruta','public/images/ubicacion');
		$crud->columns('titulo', 'ruta');
		$crud->display_as('ruta',"Imagen");
		$crud->display_as('titulo',"Título");
		$crud->set_subject('IMG Ubicación');
		$this->render_crud();
	}

	// Frontend Seccion Contactenos CRUD
	public function seccion_contact()
	{
		$crud = $this->generate_crud('seccion_contact');
		$this->mPageTitle = 'Contactenos';
		$crud->columns('titulo','texto1','texto2');
		$crud->display_as('titulo',"Título");
		$crud->display_as('texto1',"Dirección");
		$crud->display_as('texto2',"Teléfono");
		$crud->unset_add();
		$crud->unset_delete();
		$this->render_crud();
	}
	
}
