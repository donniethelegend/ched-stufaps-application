<?php

class Enrollmentlist extends CI_Controller
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
		
		$this->load->model('enrollmentlist_model');
		 $this->data = array(
            'title' => 'Enrollment List',
			'heiclass' => 'active',
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
			'breadcrumb' =>array('bc'=>"CAV Enrollment List")
			);
			
			$this->js = array(
            'jsfile' => 'accounts.js'
			);


	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Enrollment List") ;
		//$data['accountslist'] = $this->enrollmentlist_model->get();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('cav/enrollmentlist_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	/*
	public function institution($instcode){
		$data = $this->data;
		$data['page'] = "institution";
		$data['details'] = $this->heidirectory_model->getinstname($instcode)->row();
		
		//if($data['details']->result=='0'){
			//echo 'none';
		//}else{
			$data['programs'] = $this->heidirectory_model->getprograms($instcode);
			$data['deans'] = $this->heidirectory_model->getdeans($instcode);
			$data['formernames'] = $this->heidirectory_model->getformernames($instcode);
			
			
			//$data['subnavtitle'] = $data['instname'];
			//$data['heidirectory'] = $result->result();
			
			$this->load->view('inc/header_view');
			$this->load->view('heidirectory/heidirectorydetails_view',$data);
			$this->load->view('heidirectory/mapheader_view');
			$this->load->view('inc/footer_view');
			//print_r($data);
		//}
		
	}*/
	
	public function editaccount(){

		$accountid = $this->input->post('accountid');	
		$account_details = $this->accounts_model->editaccount($accountid);
		echo json_encode($account_details[0]);
		
	
	}
	
	public function updateaccount(){
		
		$accountid = $this->input->post('accountid');
		$accountname = $this->input->post('accountname');
		$address = $this->input->post('address');
		$telno = $this->input->post('telno');
		$email = $this->input->post('email');
		
		$this->accounts_model->updateaccount($accountid,$accountname,$address,$telno,$email);
		
		
		
	}
	
	public function saveaccount(){
		
		//$instcode = $this->input->post('instcode');
		$accountname = $this->input->post('accountname');
		$email = $this->input->post('email');
		$telno = $this->input->post('telno');
		$address = $this->input->post('address');
		
		$this->accounts_model->saveaccount($accountname,$email,$telno,$address);
		
		
		
	}
	
	public function deleteaccount($accountid){

		$this->accounts_model->deleteaccount($accountid);
		
		
	}
	
	

	
	
}