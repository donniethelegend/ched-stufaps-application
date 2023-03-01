<?php

class Heiusers extends CI_Controller
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
		
		$this->load->model('heiusers_model');
		
		 $this->data = array(
            'title' => 'User Management',
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
			'subnavtitle' => 'HEI Users',
			'breadcrumb' =>array('bc'=>"HEI Users")
			);
			
		//javascript module
		$this->js = array(
            'jsfile' => 'heiusers.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Users Directory") ;
		$data['users_list'] = $this->heiusers_model->get();
		$data['hei_list'] = $this->heiusers_model->gethei();
		
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('users/heiusers_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function updatelinkeid(){
		
		$linkeid = $this->input->post('linkeid');
		$linkuid = $this->input->post('linkuid');

		$this->users_model->updatelinkeid($linkeid,$linkuid);
		
		
	}
	
	public function checkusername(){
		$username = $this->input->post('username');
		$duplicateresult = $this->heiusers_model->checkusername($username);
		
		echo json_encode($duplicateresult[0]);
	}
	
	
	public function saveheiuser(){
		$search_instcode = $this->input->post('search_instcode');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user_name = $this->input->post('user_name');
		$usertype = $this->input->post('usertype');
		$hei_email = $this->input->post('hei_email');
		$hei_contactno = $this->input->post('hei_contactno');
		//$usergroup = $this->input->post('usergroup');

		$this->heiusers_model->saveheiuser($username,$password,$usertype,$user_name,$search_instcode,$hei_email,$hei_contactno);
		
	}
	
	public function deleteheiuser(){
		$heiuid = $this->input->post('heiuid');
		$this->heiusers_model->deleteheiuser($heiuid);
		//echo $test;
	}
	
	public function getuser(){
		$userid = $this->input->post('heiuid');
		$this->heiusers_model->getuser($userid);
		
	}
	
	public function changepassword(){
		$heiuid = $this->input->post('heiuid');
		$newpassword = $this->input->post('newpassword');
			
		$this->heiusers_model->changepassword($heiuid,$newpassword);
		
		
	}
	
	public function updateuser(){
		$heiuid = $this->input->post('heiuid');
		//$username = $this->input->post('username');
		$user_name = $this->input->post('user_name');
		$usertype = $this->input->post('usertype');
		$search_instcode = $this->input->post('search_instcode');
		$hei_email = $this->input->post('hei_email');
		$hei_contactno = $this->input->post('hei_contactno');
		
			
		
		$this->heiusers_model->updateuser($heiuid,$user_name,$usertype,$search_instcode,$hei_email,$hei_contactno);
		
	}
	
	
	
	

	
	
}