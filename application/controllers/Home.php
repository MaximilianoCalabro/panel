<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {


public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->push_breadcrumb('Demo');
		$this->load->model('SeccionChesse_Model');
		$this->load->model('SeccionContact_Model');
		$this->load->model('SeccionHeader_Model');
		$this->load->model('SeccionLocation_Model');
		$this->load->model('SeccionPlant_Model');
		$this->load->model('SeccionImage_Model');
		$this->load->model('SeccionWho_Model');
	}
	public function index()
	{
		//$this->render('home', 'full_width');

        // grab records from database table "cover_photos"
		//$this->load->model('demo_cover_photo_model', 'photos');
		//$this->mViewData['photos'] = $this->photos->get_all();
		$this->mViewData['photos'] = "mi foto";

		//SECCION_WHO
        $this->mViewData['who'] = $this->SeccionWho_Model->get_seccion_who();

        //SECCION_PLANT
        $this->mViewData['plant'] = $this->SeccionPlant_Model->get_seccion_plant();

		//SECCION_LOCATION
        $this->mViewData['loc'] = $this->SeccionLocation_Model->get_seccion_location();

        //SECCION_CONTACT
        $this->mViewData['cont'] = $this->SeccionContact_Model->get_seccion_contact();

        
     



		$this->render('home');
	}
}
