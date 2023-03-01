<?php


class Buildings_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->session;
		$dbname = $this->session->userdata('regioncode');
		$this->db = $this->load->database($dbname, true);
	}
	
	public function getbuildings()
	{
		//$result = $this->db->get('contacts');
		$permits = $this->db->query("SELECT * FROM a_buildings LEFT JOIN a_institution_profile ON a_buildings.instcode = a_institution_profile.instcode");
		return $permits->result_array();
		
		
	}
	
	public function getperhei($instcode)
	{
		//$result = $this->db->get('contacts');
		$permits = $this->db->query("SELECT * FROM hei_eteeap LEFT JOIN a_institution_profile ON hei_eteeap.instcode = a_institution_profile.instcode where hei_eteeap.instcode=$instcode");
		return $permits->result_array();
		
		
	}
	
	
	public function getxls()
	{
		//$result = $this->db->get('contacts');
		$permits = $this->db->query("SELECT permitdate,permits_recognition.instcode,instname,programname,specialpermit,permitno,seriesyear,CONCAT(specialpermit,' No. ',permitno,' s. ',seriesyear),effectivitydate,programlevel FROM permits_recognition LEFT JOIN a_institution_profile ON permits_recognition.instcode = a_institution_profile.instcode ORDER BY permitid");
		return $permits->result_array();
		
		
	}
	
	public function getspecific($instcode)
	{
		//$result = $this->db->get('contacts');
		$permits = $this->db->query("SELECT permitid,permitdate,a_institution_profile.instcode,a_institution_profile.instname,programname,specialpermit,permitno,seriesyear,effectivitydate FROM permits_recognition LEFT JOIN a_institution_profile ON permits_recognition.instcode = a_institution_profile.instcode where permits_recognition.instcode='$instcode'");
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
	
	public function getprofile($eteeapid)
	{
		//$result = $this->db->get('contacts');
		$sqldetails = $this->db->query("SELECT eteeapid,hei_eteeap.instcode,hei_eteeap.programname,contact,eteeap_status,remarks,a_institution_profile.instname FROM hei_eteeap LEFT JOIN a_institution_profile ON hei_eteeap.instcode = a_institution_profile.instcode WHERE eteeapid=".$this->db->escape($eteeapid)."");
		$result = $sqldetails->result_array();
		return $result[0];
		
		
	}
	public function updateeteeap($instcode,$programname,$contact,$eteeap_status,$remarks,$eteeapid)
	{
		
		$sql = "update hei_eteeap set instcode=".$this->db->escape($instcode).",programname=".$this->db->escape($programname).",contact=".$this->db->escape($contact).",eteeap_status=".$this->db->escape($eteeap_status).",remarks= ".$this->db->escape($remarks)." where eteeapid=".$this->db->escape($eteeapid)."";
		//echo $sql;
		$this->db->query($sql);
		
		
	}
	
	public function deletebuilding($buildingid){
		
		$this->db->delete('a_buildings', array('buildingid' => $buildingid));
		//$sql = "DELETE from a_buildings where buildingid='".$buildingid."'";
		//$this->db->query($sql);
		//echo $this->db->affected_rows();
	}
	public function savebuildings($instcode,$building_name,$floor_count,$classroom_count){
		
		$sql = "INSERT INTO a_buildings (building_name,floor_count,classroom_count,instcode) VALUES (".$this->db->escape($building_name).", ".$this->db->escape($floor_count).", ".$this->db->escape($classroom_count).", ".$this->db->escape($instcode).")";
		$this->db->query($sql);
	}
	
	
	public function buildingsxls(){
		
		$sql = "SELECT instname,a_buildings.instcode,building_name,floor_count,classroom_count FROM a_buildings LEFT JOIN a_institution_profile ON a_buildings.instcode = a_institution_profile.instcode";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	
	


}

?>