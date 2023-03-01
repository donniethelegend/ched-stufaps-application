<?php


class Supervisor_model extends CI_Model
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
		$users = $this->db->query("SELECT * from settings_supervisor");
		return $users->result_array();
		
		
	}
	
	public function checkname($username)
	{
		
		$checkuser = $this->db->query("SELECT count(supervisorid) as duplicateid FROM settings_supervisor where supervisorname=".$this->db->escape($username)."");
		$checkuseroarray = $checkuser->result_array();
		return $checkuseroarray;
		
		
	}
	
	public function savesupervisor($supervisor_name)
	{

		$data = array(
					   'supervisorname' => $supervisor_name
					);
		$this->db->insert('settings_supervisor', $data); 
		
		
	}
	public function deletesupervisor($supervisorid)
	{

		$this->db->delete('settings_supervisor', array('supervisorid' => $supervisorid)); 
		
		
	}
	
	
	public function updatelinkeid($linkeid,$linkuid){
		
		$sql = "update users set linkeid=".$this->db->escape($linkeid)." where uid=".$this->db->escape($linkuid)."";
		$this->db->query($sql);
	}

}

?>