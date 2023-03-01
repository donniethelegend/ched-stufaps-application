<?php


class Deans_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->session;
		$dbname = $this->session->userdata('regioncode');
		$this->db = $this->load->database($dbname, true);
	}
	
	
	public function getheidean($search_instcode_post)
	{
		//$this->db->get_where('permits_recognition', array('permitid' => $permitid));
		$this->db->select('a.deanid,a.instcode,b.instname,a.deansname,a.designation,a.assignment,a.baccalaureate,a.masters,a.doctoral,dean_status,dean_remarks,dean_deleted');
		$this->db->from('a_deans a');
		$this->db->join('a_institution_profile b', 'b.instcode = a.instcode', 'left');
		$this->db->where(array('a.instcode' => $search_instcode_post));
		$query = $this->db->get();
		return $query->result_array();
		
		
	}
	
	public function getalldean()
	{
		//$this->db->get_where('permits_recognition', array('permitid' => $permitid));
		$this->db->select('a.deanid,a.instcode,a.deansname,a.designation,a.assignment,a.baccalaureate,a.masters,a.doctoral,dean_status,dean_remarks,dean_deleted,b.instname,municipality,province1,province2');
		$this->db->from('a_deans a');
		$this->db->join('a_institution_profile b', 'b.instcode = a.instcode', 'left');
		//$this->db->where(array('a.instcode' => $search_instcode_post));
		$query = $this->db->get();
		return $query->result_array();
		
		
	}
	
	
	
	public function get()
	{
		//$result = $this->db->get('contacts');
		$deans = $this->db->query("SELECT a_deans.deanid,a_deans.deansname,a_deans.designation,a_deans.assignment,a_deans.instcode,a_institution_profile.instname FROM a_deans LEFT JOIN a_institution_profile ON a_deans.instcode = a_institution_profile.instcode");
		return $deans->result_array();
		
		
	}
	
	public function getdean($search_instcode)
	{
		//$result = $this->db->get('contacts');
		$deans = $this->db->query("SELECT a_deans.deanid,a_deans.deansname,a_deans.designation,a_deans.assignment,a_deans.baccalaureate,a_deans.masters,a_deans.doctoral,a_deans.dean_status,a_deans.dean_remarks,a_deans.instcode,a_institution_profile.instname FROM a_deans LEFT JOIN a_institution_profile ON a_deans.instcode = a_institution_profile.instcode where a_deans.instcode=".$this->db->escape($search_instcode)." and dean_deleted=0");
		return $deans->result_array();
		
		
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
	

	public function savedean($dean_instcode,$deansname,$designation,$assignment,$baccalaureate,$masters,$doctoral,$dean_status,$dean_remarks)
	{
			
		$sql = "INSERT INTO a_deans (instcode,deansname,designation,assignment,baccalaureate,masters,doctoral,dean_status,dean_remarks) VALUES (".$this->db->escape($dean_instcode).", ".$this->db->escape($deansname).", ".$this->db->escape($designation).", ".$this->db->escape($assignment).", ".$this->db->escape($baccalaureate).", ".$this->db->escape($masters).", ".$this->db->escape($doctoral).", ".$this->db->escape($dean_status).", ".$this->db->escape($dean_remarks).")";
		$this->db->query($sql);
		
	}
	
	public function update()
	{
		
	}
	
	public function deletedean($deanid){
		
		//$this->db->delete('a_buildings', array('buildingid' => $buildingid));
		$sql = "update a_deans set dean_deleted='1' where deanid=".$this->db->escape($deanid)."";
		$this->db->query($sql);
	}
	
	public function getdeandetails($deanid)
	{
		//$result = $this->db->get('contacts');
		$sqldetails = $this->db->query("SELECT * FROM a_deans LEFT JOIN a_institution_profile ON a_deans.instcode=a_institution_profile.instcode WHERE deanid=".$this->db->escape($deanid)."");
		$result = $sqldetails->result_array();
		return $result[0];
		
		
	}
	
	public function updatedean($edit_deanid,$dean_instcode,$deansname,$designation,$assignment,$baccalaureate,$masters,$doctoral,$dean_status,$dean_remarks)
	{
		
		$sql = "update a_deans set instcode=".$this->db->escape($dean_instcode).",deansname=".$this->db->escape($deansname).",designation=".$this->db->escape($designation).",assignment=".$this->db->escape($assignment).",baccalaureate= ".$this->db->escape($baccalaureate).",masters= ".$this->db->escape($masters).",doctoral= ".$this->db->escape($doctoral).",dean_status= ".$this->db->escape($dean_status).",dean_remarks= ".$this->db->escape($dean_remarks)." where deanid=".$this->db->escape($edit_deanid)."";
		//echo $sql;
		$this->db->query($sql);
		
		
	}
	
	
	
}

?>