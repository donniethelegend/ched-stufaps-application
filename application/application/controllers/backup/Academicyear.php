<?php

class Academicyear extends CI_Controller
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
			'programclass' => '',
			'facultyclass' => '',
			'programclass' => '',
			'enrolmentclass' => '',
			'graduateclass' => '',
			'breadcrumb' =>array('bc'=>"School Year")
			);
			
		//javascript module
		$this->js = array(
            'jsfile' => 'central.js'
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
		$data['details'] =array('instname'=>"Academic Year Management") ;
		$data['sy_list'] = $this->centraloffice_model->get();
		
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('settings/academicyear_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function updatelinkeid(){
		
		$linkeid = $this->input->post('linkeid');
		$linkuid = $this->input->post('linkuid');

		$this->users_model->updatelinkeid($linkeid,$linkuid);
		
		
	}
	
	public function checksy(){
		$school_year = $this->input->post('school_year');
		$duplicateresult = $this->centraloffice_model->checksy($school_year);
		
		echo json_encode($duplicateresult[0]);
	}
	
	
	public function savesy(){
		$school_year = $this->input->post('school_year');
	

		$this->centraloffice_model->savesy($school_year);
		

		
		
	}
	
	public function deletesy(){
		$syid = $this->input->post('syid');
		$this->centraloffice_model->deletesy($syid);
		
		//echo $sql;
	}
	
	public function enablesy(){
		$syid = $this->input->post('syid');
		$ayear = $this->input->post('ayear');
		$this->centraloffice_model->enablesy($syid,$ayear);
		
		//echo $sql;
	}
	public function disablesy(){
		$syid = $this->input->post('syid');
		$this->centraloffice_model->disablesy($syid);
		
		//echo $sql;
	}
	

	
	

	
	
}