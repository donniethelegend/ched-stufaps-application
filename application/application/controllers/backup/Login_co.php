<?php

class Login_co extends CI_Controller
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
			$usertype = $this->session->userdata('usertype');
			if($usertype=='Encoder'){
				header('Location:heiprofile');
			}else{
				header('Location:home');
			}
			
		}else{
			//$regionlist = $this->db->query("select * from regions");
			//$data['regions'] = $regionlist->result_array();
			$this->load->view('login/login_view_co');
		}
		

		
	}
	
	public function verify(){

		$username = $this->input->post('username');	
		$loginpassword = $this->input->post('login-password');	
		$regioncode = "main";	
		$dbname = "ched_main";
		$this->db = $this->load->database($dbname, true);
		
		//$result = $this->db->get('contacts');
		//echo "SELECT count(*) as noofuser FROM users WHERE username='$username' AND password =md5('$loginpassword')";
		
		$noofuser = $this->db->query("SELECT count(*) as noofuser FROM users WHERE username=".$this->db->escape($username)." AND password =md5(".$this->db->escape($loginpassword).") AND regioncode=".$this->db->escape($regioncode)."");
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
			$this->session->set_userdata('regioncode', $dbname);
			$this->session->set_userdata('rawregioncode', $regioncode);
			
			$office_name = $this->db->query("SELECT settings_value FROM settings WHERE settings_name='office_name'");
			$office = $office_name->result_array();
			
			$this->session->set_userdata('office_name', $office[0]['settings_value']);
			
			//Log Changes
			$this->load->helper('date');
			$now = new DateTime();
			$now->setTimezone(new DateTimezone('Asia/Manila'));
			$now_timestamp = $now->format('Y-m-d H:i:s');
			$ip = $this->input->ip_address();
			$sql_log = "INSERT INTO users_log (username,user_ip,userlogin_timestamp) VALUES (".$this->db->escape($info[0]['username']).", ".$this->db->escape($ip).", ".$this->db->escape($now_timestamp).")";
			$this->db->query($sql_log);
			
			//echo $this->session->userdata('name');
			header('Location:../cohome');
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