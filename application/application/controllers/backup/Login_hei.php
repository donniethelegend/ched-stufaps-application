<?php

class Login_hei extends CI_Controller
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
			$regionlist = $this->db->query("select * from regions");
			$data['regions'] = $regionlist->result_array();
			$this->load->view('login/login_view_ro',$data);
		}
		

		
	}
	
	public function verify(){

		$username = $this->input->post('heiusername');	
		$loginpassword = $this->input->post('heilogin-password');	
		$regioncode = $this->input->post('heiregioncode');	
		$dbname = "ched_".$regioncode;
		$this->db = $this->load->database($dbname, true);
		
		//$result = $this->db->get('contacts');
		//echo "SELECT count(*) as noofuser FROM users WHERE username='$username' AND password =md5('$loginpassword')";
		
		$noofuser = $this->db->query("SELECT count(*) as noofuser FROM users_hei WHERE username=".$this->db->escape($username)." AND password =md5(".$this->db->escape($loginpassword).") AND regioncode=".$this->db->escape($regioncode)."");
		$usercount = $noofuser->result_array();
		$count = $usercount[0]['noofuser'];
		
		
		if($count ==0){
			header('Location:../login');
		}else{
			
			$userinfo = $this->db->query("SELECT * FROM users_hei WHERE username='$username' AND password =md5('$loginpassword')");
			$info = $userinfo->result_array();
			//$_SESSION['username'] = $info[0]['username'];
			//$_SESSION['userid'] = $info[0]['uid'];
			//$_SESSION['name'] = $info[0]['name'];
			
			$this->session->set_userdata('username', $info[0]['username']);
			$this->session->set_userdata('name', $info[0]['name']);
			$this->session->set_userdata('uid', $info[0]['heiuid']);
			$this->session->set_userdata('usertype', $info[0]['usertype']);
			$this->session->set_userdata('regioncode', $dbname);
			$this->session->set_userdata('rawregioncode', $regioncode);
			$this->session->set_userdata('user_instcode', $info[0]['user_instcode']);
			
			$office_name = $this->db->query("SELECT settings_value FROM settings WHERE settings_name='office_name'");
			$office = $office_name->result_array();
			
			$this->session->set_userdata('office_name', $office[0]['settings_value']);
			
			//set current SY
			$this->db2 = $this->load->database("ched_main", true);
			$currentay = $this->db2->query("SELECT settings_value FROM settings WHERE settings_name='current_ay'");
			$noway = $currentay->result_array();
			$this->session->set_userdata('current_ay', $noway[0]['settings_value']);
			
			//Log Changes
			$this->load->helper('date');
			$now = new DateTime();
			$now->setTimezone(new DateTimezone('Asia/Manila'));
			$now_timestamp = $now->format('Y-m-d H:i:s');
			$ip = $this->input->ip_address();
			$sql_log = "INSERT INTO users_hei_log (heiusername,heiuser_ip,heiuserlogin_timestamp) VALUES (".$this->db->escape($info[0]['username']).", ".$this->db->escape($ip).", ".$this->db->escape($now_timestamp).")";
			$this->db->query($sql_log);
			
			//redirect user
			header('Location:../heiprofile');
		}
			

	}
	
	public function logout(){

		$this->session->sess_destroy();
		header('Location:../login');
	}
	
	
}