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
		$this->load->model('SeccionChesse_Model');
		$this->load->model('SeccionImageChesse_Model');
		$this->load->model('SeccionContact_Model');
		$this->load->model('SeccionLocation_Model');
		$this->load->model('SeccionImageLocation_Model');
		$this->load->model('SeccionPlant_Model');
		$this->load->model('SeccionImagePlant_Model');
		$this->load->model('SeccionWho_Model');
	}
	public function index()
	{
		//$this->render('home', 'full_width');

        // grab records from database table "cover_photos"
		//$this->load->model('demo_cover_photo_model', 'photos');
		//$this->mViewData['photos'] = $this->photos->get_all();
		$this->mViewData['photos'] = "mi foto";

		//SECCION_HEADER
        $this->mViewData['head'] = $this->SeccionHeader_Model->get_seccion_header();

		//SECCION_WHO
        $this->mViewData['who'] = $this->SeccionWho_Model->get_seccion_who();

        //SECCION_PLANT
        $this->mViewData['plant'] = $this->SeccionPlant_Model->get_seccion_plant();

        //SECCION_IMG_PLANT
        $this->mViewData['impla'] = $this->SeccionImagePlant_Model->get_seccion_img_pla();

        //SECCION_CHESSE
        $this->mViewData['che'] = $this->SeccionChesse_Model->get_seccion_chesse();

        //SECCION_IMG_CHESSE
        $this->mViewData['imche'] = $this->SeccionImageChesse_Model->get_seccion_img_che();

		//SECCION_LOCATION
        $this->mViewData['loc'] = $this->SeccionLocation_Model->get_seccion_location();

        //SECCION_IMG_LOCATION
        $this->mViewData['imloc'] = $this->SeccionImageLocation_Model->get_seccion_img_loc();

        //SECCION_CONTACT
        $this->mViewData['cont'] = $this->SeccionContact_Model->get_seccion_contact();

        
     



		$this->render('home');
	}
}
