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
		$this->load->model('SeccionHeader_Model');
		$this->load->model('SeccionWho_Model');
		$this->load->model('SeccionChesse_Model');
		$this->load->model('SeccionImageChesse_Model');
		$this->load->model('SeccionPlant_Model');
		$this->load->model('SeccionImagePlant_Model');
		$this->load->model('SeccionLocation_Model');
		$this->load->model('SeccionImageLocation_Model');
		$this->load->model('SeccionContact_Model');
		$this->load->model('SeccionImage_Model');
	}
	public function index()
	{
		//$this->render('home', 'full_width');

        // grab records from database table "cover_photos"
		//$this->load->model('demo_cover_photo_model', 'photos');
		//$this->mViewData['photos'] = $this->photos->get_all();
		$this->mViewData['photos'] = "mi foto";

        //SECCION_HEADER
        $this->mViewData['cabecera'] = $this->SeccionHeader_Model->get_seccion_header()->result();

		//SECCION_WHO
        $this->mViewData['who'] = $this->SeccionWho_Model->get_seccion_who();

        //SECCION_CHESSE
        $this->mViewData['che'] = $this->SeccionChesse_Model->get_seccion_chesse();

        //SECCION_CHESSE_IMG
        $this->mViewData['queso'] = $this->SeccionImageChesse_Model->get_seccion_imgche()->result();

        //SECCION_PLANT
        $this->mViewData['plan'] = $this->SeccionPlant_Model->get_seccion_plant();

        //SECCION_PLANT_IMG
        $this->mViewData['planta'] = $this->SeccionImagePlant_Model->get_seccion_imgplant()->result();

		//SECCION_LOCATION
        $this->mViewData['loc'] = $this->SeccionLocation_Model->get_seccion_location();

        //SECCION_LOCATION_IMG
        $this->mViewData['ubicacion'] = $this->SeccionImageLocation_Model->get_seccion_imgloc()->result();

        //SECCION_CONTACT
        $this->mViewData['cont'] = $this->SeccionContact_Model->get_seccion_contact();
        

		$this->render('home');
	}
}
