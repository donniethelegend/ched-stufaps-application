<?php


class Programapplication_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->session;
		$dbname = $this->session->userdata('regioncode');
		$this->db = $this->load->database($dbname, true);
	}
	
	public function get()
	{
		//$result = $this->db->get('contacts');
		$permits = $this->db->query("SELECT * FROM a_programapplication LEFT JOIN a_institution_profile ON a_programapplication.instcode = a_institution_profile.instcode left join users on a_programapplication.assigned_to_uid = users.uid where application_deleted=0");
		return $permits->result_array();
		
		
	}
	public function getstaff($uid)
	{
		//$result = $this->db->get('contacts');
		$permits = $this->db->query("SELECT * FROM a_programapplication LEFT JOIN a_institution_profile ON a_programapplication.instcode = a_institution_profile.instcode left join users on a_programapplication.assigned_to_uid = users.uid where a_programapplication.assigned_to_uid= '$uid' and application_deleted=0");
		return $permits->result_array();
		
		
	}
	
	public function gethei()
	{
		//$result = $this->db->get('contacts');
		$heilist = $this->db->query("SELECT * FROM a_institution_profile");
		return $heilist->result_array();
		
		
	}
	
	public function getaccount()
	{
		//$result = $this->db->get('contacts');
		$account = $this->db->query("SELECT * FROM accounts");
		return $account->result_array();
		
		
	}
	

	public function getemployee()
	{
		//$result = $this->db->get('contacts');
		$heilist = $this->db->query("SELECT * FROM users where usergroup='Technical'");
		return $heilist->result_array();
		
		
	}
	
	public function saveapplication($instcode,$datereceived,$programname,$yearlevel,$assigned_to_uid,$application_status,$schoolyear)
	{
		//$result = $this->db->get('contacts');
		$sql = "INSERT INTO a_programapplication (instcode,programname,yearlevel,datereceived,assigned_to_uid,status,schoolyear) VALUES (".$this->db->escape($instcode).", ".$this->db->escape($programname).", ".$this->db->escape($yearlevel).", ".$this->db->escape($datereceived).", ".$this->db->escape($assigned_to_uid).", ".$this->db->escape($application_status).", ".$this->db->escape($schoolyear).")";
		$sqlquery = $this->db->query($sql);
		//return $sqlquery->result_array();
		
		
	}
	
	public function getapplicationdetails($progappid)
	{
		$sql = $this->db->query("SELECT progappid,a_programapplication.instcode,a_programapplication.programname,a_programapplication.yearlevel,a_programapplication.datereceived,a_programapplication.assigned_to_uid,a_programapplication.status, a_institution_profile.instname,users.name,a_programapplication.schoolyear FROM a_programapplication LEFT JOIN a_institution_profile ON a_programapplication.instcode = a_institution_profile.instcode LEFT JOIN users ON a_programapplication.assigned_to_uid = users.uid where progappid=".$this->db->escape($progappid)."");
		$getdetails = $sql->result_array();
		return $getdetails[0];
		
		
	}
	
	public function getremarks($progappid)
	{
		$sql = $this->db->query("SELECT remarksid, remarks,remarks_status,remarkstime,a_programapplication_remarks.uid,users.name from a_programapplication_remarks left join users on a_programapplication_remarks.uid = users.uid where progappid=".$this->db->escape($progappid)."");
		return $sql->result_array();
		
		
	}
	
	public function saveremarks($progappid,$remarks_reply,$application_status,$uid)
	{
		
		
		$sql = "INSERT INTO a_programapplication_remarks (progappid,remarks,remarks_status,uid) VALUES (".$this->db->escape($progappid).", ".$this->db->escape($remarks_reply).", ".$this->db->escape($application_status).", ".$this->db->escape($uid).")";
		$sqlquery = $this->db->query($sql);
		
		
		
	}
	
	public function updateapplication($instcode,$datereceived,$programname,$yearlevel,$assigned_to_uid,$application_status,$progappid,$schoolyear)
	{

		$sql = "update a_programapplication set instcode=".$this->db->escape($instcode).",datereceived=".$this->db->escape($datereceived).",programname=".$this->db->escape($programname).",yearlevel=".$this->db->escape($yearlevel).",assigned_to_uid=".$this->db->escape($assigned_to_uid).",status=".$this->db->escape($application_status).",schoolyear=".$this->db->escape($schoolyear)." where progappid=".$this->db->escape($progappid)."";
		$this->db->query($sql);
		
		
		$logdetails = "Updated program application status: $application_status";
		
		$sql = "INSERT INTO a_programapplication_log (log_progappid,logdetails,action_uid) VALUES (".$this->db->escape($progappid).", ".$this->db->escape($logdetails).", ".$this->db->escape($this->session->userdata('uid')).")";
		$sqlquery = $this->db->query($sql);
		
		
	}
	
	public function filterlist()
	{
		$sql = $this->db->query("SELECT status,count(*) as noapp from a_programapplication where application_deleted=0 group by status");
		return $sql->result_array();
		
		
	}
	public function filterliststaff($uid)
	{
		$sql = $this->db->query("SELECT status,count(*) as noapp from a_programapplication where assigned_to_uid='$uid' AND application_deleted=0 group by status");
		return $sql->result_array();
		
		
	}
	
	public function totalrecords()
	{
		$sql = $this->db->query("select count(*) as totalrecords from a_programapplication where application_deleted=0");
		$getdetails = $sql->result_array();
		return $getdetails[0]['totalrecords'];
		
		
	}
	public function totalrecordsstaff($uid)
	{
		$sql = $this->db->query("select count(*) as totalrecords from a_programapplication where assigned_to_uid='$uid' and application_deleted=0");
		$getdetails = $sql->result_array();
		return $getdetails[0]['totalrecords'];
		
		
	}
	
	
	public function getfilteredlist($status)
	{
		//$result = $this->db->get('contacts');
		$permits = $this->db->query("SELECT * FROM a_programapplication LEFT JOIN a_institution_profile ON a_programapplication.instcode = a_institution_profile.instcode left join users on a_programapplication.assigned_to_uid = users.uid where status=".$this->db->escape($status)." and application_deleted=0");
		return $permits->result_array();
		
		
	}
	
	public function getfilteredliststaff($status,$uid)
	{
		//$result = $this->db->get('contacts');
		$permits = $this->db->query("SELECT * FROM a_programapplication LEFT JOIN a_institution_profile ON a_programapplication.instcode = a_institution_profile.instcode left join users on a_programapplication.assigned_to_uid = users.uid where status=".$this->db->escape($status)." AND a_programapplication.assigned_to_uid=".$this->db->escape($uid)." and application_deleted=0");
		return $permits->result_array();
		
		
	}
	
	public function deleteapplication($progappid)
	{
		$data = array(
               'application_deleted' => 1
            );

		$this->db->where('progappid', $progappid);
		$this->db->update('a_programapplication', $data); 
		
		
	}
	public function allprogramapplicationxls()
	{
		
		$query = $this->db->query("SELECT a_programapplication.instcode,instname,programname,yearlevel,schoolyear,datereceived,NAME,STATUS FROM a_programapplication
LEFT JOIN a_institution_profile ON a_programapplication.instcode = a_institution_profile.instcode LEFT JOIN users ON a_programapplication.assigned_to_uid = users.uid");
		return $query->result_array();
		
	}
	
	
	
}

?>