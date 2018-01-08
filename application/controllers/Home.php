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
	}
	public function index()
	{
		//$this->render('home', 'full_width');

        // grab records from database table "cover_photos"
		//$this->load->model('demo_cover_photo_model', 'photos');
		//$this->mViewData['photos'] = $this->photos->get_all();
		$this->mViewData['photos'] = "mi foto";

        $this->mViewData['usuarios'] = $this->SeccionHeader_Model->get_admin_user();

		$this->render('home');
	}
}
