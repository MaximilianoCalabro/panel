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

		$this->mPageTitle = 'Users';
		$this->render_crud();
	}

	// Frontend Seccion Header CRUD
	public function seccion_header()
	{
		$crud = $this->generate_crud('seccion_header');
		$this->mPageTitle = 'Cabecera';

		$crud->set_relation_n_n('imagen','rel_header_imagenes', 'imagenes', 'fk_seccion_header','fk_imagenes', 'titulo_imagen');

		$crud->columns('nombre','imagen');
		$crud->display_as('nombre','Título Cabecera');
		$crud->display_as('imagen','Imagenes');
		
		$crud->set_subject('Cabecera');
		
        $this->render_crud();
	}

	// Frontend Seccion Quienes Somos CRUD
	public function seccion_who()
	{
		$crud = $this->generate_crud('seccion_who');
		$this->mPageTitle = 'Quienes Somos';

		$crud->columns('titulo', 'subtitulo', 'texto1', 'texto2');
		$crud->display_as('texto1','Primer Parrafo');

		$crud->set_subject('Quienes Somos');
		$crud->unset_add();
		$crud->unset_delete();
        $this->render_crud();
	}

	// Frontend Seccion Nuestra Planta CRUD
	public function seccion_plant()
	{
		$crud = $this->generate_crud('seccion_plant');
		$this->mPageTitle = 'Nuestra Planta';

		$crud->columns('titulo', 'texto');
		
		$crud->unset_add();
		$crud->unset_delete();
        $this->render_crud();
	}

	// Frontend Seccion Nuestra Planta IMG CRUD
	public function seccion_imgplant()
	{
		$crud = $this->generate_crud('seccion_imgplant');
		$this->mPageTitle = 'IMG Planta';

		$crud->set_relation_n_n('imagen','rel_plant_imagenes', 'imagenes', 'fk_seccion_imgplant','fk_imagenes', 'titulo_imagen');

		$crud->columns('nombre','imagen');
		$crud->display_as('nombre','Título Cabecera');
		$crud->display_as('imagen','Imagenes');
		
		$crud->set_subject('IMG Planta');
		
        $this->render_crud();
	}

	// Frontend Seccion Nuestros Quesos CRUD
	public function seccion_chesse()
	{
		$crud = $this->generate_crud('seccion_chesse');
		$this->mPageTitle = 'Nuestros Quesos';

		$crud->columns('titulo');
		
		$crud->unset_add();
		$crud->unset_delete();
        $this->render_crud();
	}

	// Frontend Seccion Nuestros Quesos IMG CRUD
	public function seccion_imgche()
	{
		$crud = $this->generate_crud('seccion_imgche');
		$this->mPageTitle = 'IMG Quesos';

		$crud->set_relation_n_n('imagen','rel_chesse_imagenes', 'imagenes', 'fk_seccion_imgche','fk_imagenes', 'titulo_imagen');

		$crud->columns('nombre','imagen');
		$crud->display_as('nombre','Título Cabecera');
		$crud->display_as('imagen','Imagenes');
		
		$crud->set_subject('IMG Quesos');
		
        $this->render_crud();
	}

	// Frontend Seccion Ubicación CRUD
	public function seccion_location()
	{
		$crud = $this->generate_crud('seccion_location');
		$this->mPageTitle = 'Ubicación';
		
		$crud->columns('titulo', 'texto');
        
        $crud->unset_add();
		$crud->unset_delete();
        $this->render_crud();
	}

	// Frontend Seccion Ubicación IMG CRUD
	public function seccion_imgloc()
	{
		$crud = $this->generate_crud('seccion_imgloc');
		$this->mPageTitle = 'IMG Ubicación';

		$crud->set_relation_n_n('imagen','rel_location_imagenes', 'imagenes', 'fk_seccion_imgloc','fk_imagenes', 'titulo_imagen');

		$crud->columns('nombre','imagen');
		$crud->display_as('nombre','Título Cabecera');
		$crud->display_as('imagen','Imagenes');
		
		$crud->set_subject('IMG Ubicación');
		
        $this->render_crud();
	}

	// Frontend Seccion Contactenos CRUD
	public function seccion_contact()
	{
		$crud = $this->generate_crud('seccion_contact');
		$this->mPageTitle = 'Contactenos';
		
		$crud->columns('titulo','texto1','texto2');

		$crud->display_as('texto1','Dirección');
		$crud->display_as('texto2','Teléfono');

		$crud->unset_add();
		$crud->unset_delete();
        $this->render_crud();
	}
	
	// Frontend Seccion Imagenes CRUD
	public function imagenes()
	{
		$crud = $this->generate_crud('imagenes');
		$this->mPageTitle = 'Imágenes';

		$crud->columns('titulo_imagen', 'descripcion_imagen', 'ruta_imagen');
		$crud->display_as('titulo_imagen','Título');
		$crud->display_as('descripcion_imagen','Descripción');
		$crud->display_as('ruta_imagen','Imagen');
		
		$crud->set_field_upload('ruta_imagen','public/images');
		$crud->required_fields('descripcion_imagen','ruta_imagen');
		$crud->set_subject('Imágenes');
		
        $this->render_crud();
	}
}
