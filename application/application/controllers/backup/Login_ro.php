<?php

class Login_ro extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->session;
	}
	
	public function index()
	{
		$uid = $this->session->userdata('uid');
		if ($uid !=''){
			header('Location:home');
		}else{
			$this->load->view('login/login_view');
		}
		

		
	}
	
	public function verify(){

		$username = $this->input->post('username');	
		$loginpassword = $this->input->post('login-password');	
		//$result = $this->db->get('contacts');
		//echo "SELECT count(*) as noofuser FROM users WHERE username='$username' AND password =md5('$loginpassword')";
		
		$noofuser = $this->db->query("SELECT count(*) as noofuser FROM users WHERE username='$username' AND password =md5('$loginpassword')");
		$usercount = $noofuser->result_array();
		$count = $usercount[0]['noofuser'];
		
		
		if($count ==0){
			header('Location:../login');
		}else{
			
			$userinfo = $this->db->query("SELECT * FROM users WHERE username='$username' AND password =md5('$loginpassword')");
			$info = $userinfo->result_array();
			//$_SESSION['username'] = $info[0]['username'];
			//$_SESSION['userid'] = $info[0]['uid'];
			//$_SESSION['name'] = $info[0]['name'];
			
			$this->session->set_userdata('username', $info[0]['username']);
			$this->session->set_userdata('name', $info[0]['name']);
			$this->session->set_userdata('uid', $info[0]['uid']);
			$this->session->set_userdata('usertype', $info[0]['usertype']);
			
			$office_name = $this->db->query("SELECT settings_value FROM settings WHERE settings_name='office_name'");
			$office = $office_name->result_array();
			
			$this->session->set_userdata('office_name', $office[0]['settings_value']);
			
			//echo $this->session->userdata('name');
			header('Location:../home');
		}
		//echo intval($permitarray[0]['permitno']);
	
	

	}
	
	public function logout(){
		//$this->load->view('inc/header_view');
		//$productID =  $this->uri->segment(3);
		//echo $two;
		$this->session->sess_destroy();
		header('Location:../login');
	}
	
	
}