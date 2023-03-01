<?php


class Heiusers_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->session;
		$rawregioncode = $this->session->userdata('rawregioncode');
		$dbname = $this->session->userdata('regioncode');
		$this->db = $this->load->database($dbname, true);
		//$this->load->database();
	}

	
	public function get()
	{
		//$result = $this->db->get('contacts');
		
		
		$users = $this->db->query("SELECT * from users_hei");
		return $users->result_array();
		
		
	}
	
	public function gethei()
	{
		//$result = $this->db->get('contacts');
		
		
		$users = $this->db->query("SELECT * from a_institution_profile");
		return $users->result_array();
		
		
	}
	
	public function updatelinkeid($linkeid,$linkuid)
	{
		
		
		$sql = "update users set linkeid=".$this->db->escape($linkeid)." where uid=".$this->db->escape($linkuid)."";
		$this->db->query($sql);
	}
	
	public function getuser($userid)
	{
		$sqlselect = $this->db->query("SELECT * FROM users_hei left join a_institution_profile on users_hei.user_instcode = a_institution_profile.instcode where heiuid=".$this->db->escape($userid)."");
		$userdetail = $sqlselect->result_array();
		echo json_encode($userdetail[0]);
		
		
	}
	
	public function updateuser($heiuid,$user_name,$usertype,$search_instcode,$hei_email,$hei_contactno)
	{
		
		
		$sql = "update users_hei set name=".$this->db->escape($user_name).",usertype=".$this->db->escape($usertype).", user_instcode=".$this->db->escape($search_instcode).", hei_email=".$this->db->escape($hei_email).", hei_contactno=".$this->db->escape($hei_contactno)." where heiuid=".$this->db->escape($heiuid)."";
		
		$this->db->query($sql);
		
	}
	
	public function changepassword($heiuid,$newpassword)
	{
		
		
		$sql = "update users_hei set password=MD5(".$this->db->escape($newpassword).") where heiuid=".$this->db->escape($heiuid)."";
		$this->db->query($sql);

		
	}

	public function checkusername($username)
	{
		
		
		$checkuser = $this->db->query("SELECT count(heiuid) as duplicateid FROM users_hei where username=".$this->db->escape($username)."");
		return $checkuser->result_array();
		
		
	}
	
	public function saveheiuser($username,$password,$usertype,$user_name,$search_instcode,$hei_email,$hei_contactno)
	{
		$rawregioncode = $this->session->userdata('rawregioncode');
		
		$sql = "INSERT INTO users_hei (username,password,name,usertype,user_instcode,regioncode,hei_email,hei_contactno) VALUES (".$this->db->escape($username).", MD5(".$this->db->escape($password)."), ".$this->db->escape($user_name).", ".$this->db->escape($usertype).", ".$this->db->escape($search_instcode).", ".$this->db->escape($rawregioncode).", ".$this->db->escape($hei_email).", ".$this->db->escape($hei_contactno).")";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
		
		
	}
	
	public function deleteheiuser($heiuid)
	{
		
		$sql = "DELETE FROM users_hei where heiuid=".$this->db->escape($heiuid)."";
		echo $sql;
		$this->db->query($sql);
		
		
	}

}

?>