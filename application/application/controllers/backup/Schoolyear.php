<?php

class Schoolyear extends CI_Controller
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
		
		$this->load->model('schoolyear_model');
		$this->load->model('centraloffice_model');
		 $this->data = array(
            'title' => 'School Year management',
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
			'subnavtitle' => 'School Year',
			'breadcrumb' =>array('bc'=>"School Year")
			);
			
		//javascript module
		$this->js = array(
            'jsfile' => 'schoolyear.js'
			);
			
		//check session 
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('uid');
		if ($uid =='1'){
			//header('Location:home');
		}else{
			//$this->load->view('login/login_view');
			$baseurl = base_url().'login';
			header('Location:'.$baseurl);
		}
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"School Year Management") ;
		$data['sy_list'] = $this->schoolyear_model->get();
		
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('settings/schoolyear_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function updatelinkeid(){
		
		$linkeid = $this->input->post('linkeid');
		$linkuid = $this->input->post('linkuid');

		$this->users_model->updatelinkeid($linkeid,$linkuid);
		
		
	}
	
	
	

	
	

	
	
}