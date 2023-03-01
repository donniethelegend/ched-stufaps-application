<?php

class Settings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//check hei or ro
		
		
		$this->load->model('users_model');
		
	}
	
	public function index()
	{
		$this->session;	
		$utype = $this->session->userdata('usertype');
		if($utype=='Encoder'){
			redirect('login');
		}
		
	}
	
	
	
	public function changepassword(){
		
	//echo "test";
	
		$uid = $this->input->post('uid');
		$cpassword = $this->input->post('current_password');
		$npassword = $this->input->post('new_password');
			//echo $uid;
		
		$this->session;	
		$utype = $this->session->userdata('usertype');
		if($utype=='Encoder'){
			echo $this->users_model->changepassword_hei($uid,$cpassword,$npassword);
		}else{
			
			echo $this->users_model->changepassword_region($uid,$cpassword,$npassword);
		}
		
		
	
		
	}
	
		
	
	

	
	
}