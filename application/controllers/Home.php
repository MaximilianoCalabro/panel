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
		$this->load->model('SeccionWho_Model');
		$this->load->helper('form');
		//Load email library
		$this->load->library('email');

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
        $this->mViewData['who'] = $this->SeccionWho_Model->get_seccion_who()->result();

        //SECCION_CHESSE
        $this->mViewData['che'] = $this->SeccionChesse_Model->get_seccion_chesse()->result();

        //SECCION_PLANT
        $this->mViewData['plant'] = $this->SeccionPlant_Model->get_seccion_plant()->result();

		//SECCION_LOCATION
        $this->mViewData['loc'] = $this->SeccionLocation_Model->get_seccion_location()->result();

        //SECCION_CONTACT
        $this->mViewData['cont'] = $this->SeccionContact_Model->get_seccion_contact()->result();

		$this->render('home');
	}
	
	public function sendcontact() {
	    
	    //SMTP & mail configuration
	    $config = array(
	        'protocol'  => 'smtp',
	        'smtp_host' => 'ssl://smtp.example.com',
	        'smtp_port' => 465,
	        'smtp_user' => 'email@example.com',
	        'smtp_pass' => 'email_password',
	        'mailtype'  => 'html',
	        'charset'   => 'utf-8'
	    );
	    $this->email->initialize($config);
	    $this->email->set_mailtype("html");
	    $this->email->set_newline("\r\n");
	    
	    if ( $this->input->post('name') != '' ) {
	    
    	    //Email content
//     	    $htmlContent = '<h1>' . $this->input->post('motivo') . '</h1>';
    	    $htmlContent .= '<p>'. $this->input->post('name') . ', ' . $this->input->post('apellido') . '</p>';
    	    $htmlContent .= '</br>' . $this->input->post('message');
    	    
    	    $this->email->to('recipient@example.com');
    	    $this->email->from($this->input->post('email'), $this->input->post('name'));
    	    $this->email->subject($this->input->post('motivo'));
    	    $this->email->message($htmlContent);
    	    
    	    //Send email
    // 	    $this->email->send();
    	    
    	    if ($this->email->send())
    	        echo 'Email enviado';
    	    else {
    // 	       echo $this->email->print_debugger();
                echo 'Email no enviado';	        
    	    }       
	    }
	    echo 'Email enviado';
	    $this->index();
	}
}
