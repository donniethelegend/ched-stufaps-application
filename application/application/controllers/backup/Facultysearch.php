<?php

class Facultysearch extends CI_Controller
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
		
		
		$this->load->model('centraloffice_model');
		  $this->data = array(
            'title' => 'Program Search (National)',
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
			'facultyclass' => 'active',
			'programclass' => '',
			'enrolmentclass' => '',
			'graduateclass' => '',
			'breadcrumb' =>array('bc'=>"Home")
			);
			$this->js = array(
            'jsfile' => 'central.js'
			);
			
		
		
		
		
		
	}
	
	public function index()
	{

		$data = $this->data;
		$js = $this->js;
		$facultynamesearch = $this->input->post('facultynamesearch');
		
		if($facultynamesearch!=''){
			$data['facultyresult'] = $this->centraloffice_model->facultysearch($facultynamesearch);
		}else{
			$data['facultyresult'] = array();
		}	
		
		
		$this->load->view('central_office/central_header_view');
		$this->load->view('central_office/facultysearch_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	public function name($productID,$two){
		//$this->load->view('inc/header_view');
		//$productID =  $this->uri->segment(3);
		echo $two;
	}
	
	
}