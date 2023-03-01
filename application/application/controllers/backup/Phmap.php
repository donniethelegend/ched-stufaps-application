<?php

class Phmap extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('dashboard_model');
		  $this->data = array(
            'title' => 'Welcome',
			'heiclass' => '',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => '',
			'programapplication' => '',
			'accounts' => '',
			'contacts' => '',
			'permits' => '',
			'scholarship' => '',
			'scholarslist' => '',
			'accreditedhei' => '',
			'scholarshipapplicant' => '',
			'paymentlist' => '',
			'settingsclass' => '',
			'voucherlist' => ''
			);
			$this->js = array(
            'jsfile' => null
			);
			
		$this->session;	
		$utype = $this->session->userdata('usertype');
		if($utype=='scholarship'){
			$this->data = array(
            'title' => 'Welcome',
			'heiclass' => 'hidden',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => '',
			'programapplication' => '',
			'accounts' => 'hidden',
			'contacts' => 'hidden',
			'permits' => '',
			'scholarship' => '',
			'scholarslist' => '',
			'accreditedhei' => '',
			'scholarshipapplicant' => '',
			'paymentlist' => '',
			'voucherlist' => ''
			);
		}
		

	}
	
	public function index()
	{
	
		$data = $this->data;
		$js = $this->js;
		$this->load->view('inc/header_view');
		
		//$data['allheimap'] = $this->dashboard_model->allheimap();
		$data['allheimap2'] = $this->dashboard_model->allheimap2();
		//print_r($this->dashboard_model->allheimap2());
		$this->load->view('map/phmap_view',$data);
		$this->load->view('map/mapheader_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}

	
	
}