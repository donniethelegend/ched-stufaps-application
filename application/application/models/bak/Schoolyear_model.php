<?php


class Schoolyear_model extends CI_Model
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
		
		
		$users = $this->db->query("SELECT * from school_year");
		return $users->result_array();
		
		
	}
	public function updatelinkeid($linkeid,$linkuid)
	{
		
		
		$sql = "update users set linkeid=".$this->db->escape($linkeid)." where uid=".$this->db->escape($linkuid)."";
		$this->db->query($sql);
	}
	
	
	public function checksy($school_year)
	{
		
		
		$checkuser = $this->db->query("SELECT count(syid) as duplicateid FROM school_year where school_year=".$this->db->escape($school_year)."");
		return $checkuser->result_array();
		
	}
	
	public function savesy($school_year)
	{
		
		
		$sql = "INSERT INTO school_year (school_year) VALUES (".$this->db->escape($school_year).")";
		$this->db->query($sql);
		
		$b_program = $this->db->query("SELECT * FROM b_program where program_deleted=0");
		$programlist = $b_program->result_array();
		
		//insert blank enrolment
		$esql = "INSERT INTO b_program_enrolment (e_programid,instcode,edatayear,pcredit,tuitionperunit,programfee) SELECT programid, instcode,".$this->db->escape($school_year)." ,pcredit,tuitionperunit,programfee FROM b_program";
		$this->db->query($esql);
		
		//insert blank graduate
		$gsql = "INSERT INTO b_program_graduate (g_programid,instcode,gdatayear)
SELECT programid, instcode, ".$this->db->escape($school_year)." FROM b_program";
		$this->db->query($gsql);
		
		
		//insert blank enrolment
		/*
		foreach($programlist as $plist):
			$sql = "INSERT INTO b_program_enrolment (e_programid,instcode,edatayear,pcredit,tuitionperunit,programfee) VALUES (".$this->db->escape($plist['programid']).",".$this->db->escape($plist['instcode']).",".$this->db->escape($school_year).",".$this->db->escape($plist['pcredit']).",".$this->db->escape($plist['tuitionperunit']).",".$this->db->escape($plist['programfee']).")";
			$this->db->query($sql);
			
				//insert blank graduate
			$sql2 = "INSERT INTO b_program_graduate (g_programid,instcode,gdatayear) VALUES (".$this->db->escape($plist['programid']).",".$this->db->escape($plist['instcode']).",".$this->db->escape($school_year).")";
			$this->db->query($sql2);
			
		endforeach;
		
	*/
		
		//echo $this->db->affected_rows();
		
	}
	public function deletesy($syid)
	{
		
		//$this->db->delete('project', array('projectid' => $projectid));
		$sql = "DELETE FROM school_year where syid=".$this->db->escape($syid)."";
		$this->db->query($sql);
		
	}
	
	
	

}

?>