<?php


class Users_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->session;
		$dbname = $this->session->userdata('regioncode');
		
		$this->db = $this->load->database($dbname, true);
		//$this->load->database();
	}

	
	public function get()
	{
		//$result = $this->db->get('contacts');
		
		
		$users = $this->db->query("SELECT * from users");
		return $users->result_array();
		
		
	}
	public function updatelinkeid($linkeid,$linkuid)
	{
		
		
		$sql = "update users set linkeid=".$this->db->escape($linkeid)." where uid=".$this->db->escape($linkuid)."";
		$this->db->query($sql);
	}
	
	public function getuser($userid)
	{
		$sqlselect = $this->db->query("SELECT * FROM users where uid=".$this->db->escape($userid)."");
		$userdetail = $sqlselect->result_array();
		echo json_encode($userdetail[0]);
		
		
	}
	
	public function updateuser($uid,$username,$user_name,$usertype,$usergroup)
	{
		
		
		$sql = "update users set username=".$this->db->escape($username).",name=".$this->db->escape($user_name).",usertype=".$this->db->escape($usertype).", usergroup=".$this->db->escape($usergroup)." where uid=".$this->db->escape($uid)."";
		
		$this->db->query($sql);
		
	}
	
	public function changepassword($uid,$newpassword)
	{
		
		
		$sql = "update users set password=MD5(".$this->db->escape($newpassword).") where uid=".$this->db->escape($uid)."";
		$this->db->query($sql);

		
	}
	public function changepassword_hei($uid,$cpassword,$npassword)
	{
		
		$checkuser = $this->db->query("SELECT count(heiuid) as user FROM users_hei where heiuid=".$this->db->escape($uid)." and password=MD5(".$this->db->escape($cpassword).")");
		//1003_encoder
		$result = $checkuser->result_array();
		//print_r("SELECT count(heiuid) as user FROM users_hei where uid=".$this->db->escape($uid)." and password=MD5(".$this->db->escape($cpassword).")");
		if($result['0']['user']>0){
			$sql = "update users_hei set password=MD5(".$this->db->escape($npassword).") where heiuid=".$this->db->escape($uid)."";
			$this->db->query($sql);
			return "yes";
		}else{
			return "none";
		}
		

		
	}
	public function changepassword_region($uid,$cpassword,$npassword)
	{
		
		$checkuser = $this->db->query("SELECT count(uid) as user FROM users where uid=".$this->db->escape($uid)." and password=MD5(".$this->db->escape($cpassword).")");
		//1003_encoder
		$result = $checkuser->result_array();
		//print_r("SELECT count(heiuid) as user FROM users_hei where uid=".$this->db->escape($uid)." and password=MD5(".$this->db->escape($cpassword).")");
		if($result['0']['user']>0){
			$sql = "update users set password=MD5(".$this->db->escape($npassword).") where uid=".$this->db->escape($uid)."";
			$this->db->query($sql);
			return "yes";
		}else{
			return "none";
		}
		

		
	}
	
	public function checkusername($username)
	{
		
		
		$checkuser = $this->db->query("SELECT count(uid) as duplicateid FROM users where username=".$this->db->escape($username)."");
		return $checkuser->result_array();
		
	}
	
	public function saveuser($username,$password,$user_name,$usertype,$usergroup)
	{
		
		$rawregioncode = $this->session->userdata('rawregioncode');
		
		$sql = "INSERT INTO users (username,password,name,usertype,usergroup,regioncode) VALUES (".$this->db->escape($username).", MD5(".$this->db->escape($password)."), ".$this->db->escape($user_name).", ".$this->db->escape($usertype).", ".$this->db->escape($usergroup).", ".$this->db->escape($rawregioncode).")";
		$this->db->query($sql);
		echo $this->db->affected_rows();
		
	}
	public function deleteuser($userid)
	{
		
		
		$sql = "DELETE FROM users where uid=".$this->db->escape($userid)."";
		$this->db->query($sql);
		
	}
	
	
	

}

?>