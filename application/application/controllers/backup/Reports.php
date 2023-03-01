<?php

class Reports extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		//check hei or ro
		$this->session;	
		$utype = $this->session->userdata('usertype');
		if($utype=='Encoder'){
			redirect('login');
		}
		if($utype=='Superadmin'){
			redirect('cohome');
		}
		
		
		$this->load->model('reports_model');
		  $this->data = array(
            'title' => 'Reports',
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
			'voucherlist' => '',
			'breadcrumb' =>array('bc'=>"Home")
			);
			$this->js = array(
            'jsfile' => null
			);
			
		$this->session;	
		$utype = $this->session->userdata('usertype');
		
		
		
		
		
		if($utype=='Encoder'){
			 redirect('heiprofile');
		}
		
	}
	
	public function index()
	{

		$data = $this->data;
		$js = $this->js;
		$this->load->view('inc/header_view');
		
		/*$data['totalinstitution'] = $this->dashboard_model->getinsttotal()->row();
		$data['totalcontacts'] = $this->dashboard_model->getcontacttotal()->row();
		$data['totalprograms'] = $this->dashboard_model->getactiveprograms()->row();
		$data['toptenenroll'] = $this->dashboard_model->toptenenroll();
		$data['toptengraduate'] = $this->dashboard_model->toptengraduate();

		
		$data['totalpermits'] = $this->dashboard_model->totalpermits()->row();
		$data['discipline'] = $this->dashboard_model->discipline();
		$data['enrollmentperprovince'] = $this->dashboard_model->enrollmentperprovince();
		*/
		$this->load->view('reports/reports_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	
	
}