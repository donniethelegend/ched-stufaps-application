<?php

class Systeminformation extends CI_Controller
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
		
		$this->load->model('users_model');
		
		 $this->data = array(
            'title' => 'System',
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
			'voucherlist' => '',
			'settingsclass' => 'active',
			'subnavtitle' => 'System Information',
			'scholarshipapplicant' => '',
			'paymentlist' => '',
			'settingsclass' => '',
			'voucherlist' => '',
			'facultyclass' => '',
			'programclass' => '',
			'enrolmentclass' => '',
			'graduateclass' => '',
			'breadcrumb' =>array('bc'=>"System Information")
			);
			
		//javascript module
		$this->js = array(
            'jsfile' => 'users.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Update Log") ;
		$data['users_list'] = $this->users_model->get();
		$data['utype'] = $this->session->userdata('usertype');
		
		
		$this->load->view('inc/header_view');
		$this->load->view('settings/systeminformation_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	
	
	
	

	
	
}