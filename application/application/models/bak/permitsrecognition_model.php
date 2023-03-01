<?php


class Permitsrecognition_model extends CI_Model
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
		$permits = $this->db->query("SELECT permitid,permitdate,a_institution_profile.instcode,a_institution_profile.instname,programname,specialpermit,permitno,seriesyear,effectivitydate,programlevel,permit_filename FROM permits_recognition LEFT JOIN a_institution_profile ON permits_recognition.instcode = a_institution_profile.instcode ORDER BY permitid desc");
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
	

	public function generatepermitno($spcode,$seriesyear)
	{
			
		$lastpermitno = $this->db->query("SELECT * FROM permits_recognition where specialpermit=".$this->db->escape($spcode)." AND seriesyear=".$this->db->escape($seriesyear)." order by permitno desc");
		
		$permitarray = $lastpermitno->result_array();
		if($permitarray==null){
			echo "0";
		}else{
			echo intval($permitarray[0]['permitno']);
		}
	}
	
	public function savepermits($instcode,$permitdate,$programname,$specialpermit,$permitno,$seriesyear,$effectivitydate,$programlevel,$major)
	{
		$this->session;	
		$username = $this->session->userdata('username');
			
		//get programname
		$program_name = $this->db->query("SELECT * from b_program where programid=".$this->db->escape($programname)."");
		$result = $program_name->result_array();
		$mainprogram = $result[0]['mainprogram'];
		
		$sql = "INSERT INTO permits_recognition (instcode,permitdate,programname,specialpermit,permitno,seriesyear,effectivitydate,programlevel,applied_to) VALUES (".$this->db->escape($instcode).", ".$this->db->escape($permitdate).", ".$this->db->escape($mainprogram).", ".$this->db->escape($specialpermit).", ".$this->db->escape($permitno).", ".$this->db->escape($seriesyear).", ".$this->db->escape($effectivitydate).", ".$this->db->escape($programlevel).", ".$this->db->escape($major).")";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
		
		
		if($result[0]['remarks']==""){
			$remarks_append  = $result[0]['authcat'] ." No. ".$result[0]['authserial'].", s. ".$result[0]['authyear'];
			
		}else{
			$remarks_append  = $result[0]['remarks'] . "\n".$specialpermit." No. ".$permitno.", s. ".$seriesyear;
		}
		//update selected programid
		//update remarks field
		
		$data = array(
						   'authcat' => $specialpermit,
						   'authserial' => $permitno,
						   'authyear' => $seriesyear,
						   'remarks' => $remarks_append
						);
					$this->db->where('programid', $programname);
					$this->db->update('b_program', $data); 

		//get old data

			$remarks = "Programid:".$programname." \n";
			$remarks .= "from ".$result[0]['authcat']." to ".$specialpermit." \n";
			$remarks .="from ".$result[0]['authserial']." to ".$permitno." \n";
			$remarks .="from ".$result[0]['authyear']." to ".$seriesyear." \n";

			$data = array(
			   'proglogremarks' => $remarks ,
			   'user' => $username
			);

			$this->db->insert('b_program_log', $data); 
		
		//update if major is selected
		if($major!="None"){
			//update program if major is not empty
				$major_selected = explode(',', $major);
				
				foreach($major_selected as $mselected):
					//update the program
					$data = array(
						   'authcat' => $specialpermit,
						   'authserial' => $permitno,
						   'authyear' => $seriesyear
						);
					$this->db->where('programid', $mselected);
					$this->db->update('b_program', $data); 
					//insert log
					
					//get old data
					$mjor = $this->db->query("SELECT * from b_program where programid=".$this->db->escape($mselected)."");
					$resultmjor = $mjor->result_array();
					
					$remarks = "Programid:".$mselected." \n";
					$remarks .= "from ".$resultmjor[0]['authcat']." to ".$specialpermit." \n";
					$remarks .="from ".$resultmjor[0]['authserial']." to ".$permitno." \n";
					$remarks .="from ".$resultmjor[0]['authyear']." to ".$seriesyear." \n";
					
					
					$data = array(
					   'proglogremarks' => $remarks ,
					   'user' => $username
					);

					$this->db->insert('b_program_log', $data); 
				endforeach;
		}
		
		
		
		
	}
	
	public function updatepermit($permitid,$instcode,$permitdate,$programname,$specialpermit,$permitno,$seriesyear,$effectivitydate,$programlevel)
	{
		$data = array(
               'instcode' => $instcode,
               'permitdate' => $permitdate,
               'programname' => $programname,
               'specialpermit' => $specialpermit,
               'permitno' => $permitno,
               'seriesyear' => $seriesyear,
               'effectivitydate' => $effectivitydate,
               'programlevel' => $programlevel
            );

		$this->db->where('permitid', $permitid);
		$this->db->update('permits_recognition', $data); 
		
		
	}
	
	
	public function deletepermit($permitid)
	{
		$this->db->delete('permits_recognition', array('permitid' => $permitid));
	}
	
	public function editpermit($permitid)
	{
		//$this->db->get_where('permits_recognition', array('permitid' => $permitid));
		$this->db->select('*');
		$this->db->from('permits_recognition');
		$this->db->join('a_institution_profile', 'a_institution_profile.instcode = permits_recognition.instcode', 'left');
		$this->db->where(array('permitid' => $permitid));
		$query = $this->db->get();
		return $query->result_array();
		
		
	}
	
	public function showprograms($instcode)
	{
		//$this->db->get_where('permits_recognition', array('permitid' => $permitid));
		$this->db->select('*');
		$this->db->from('b_program');
		//$this->db->join('a_institution_profile', 'a_institution_profile.instcode = permits_recognition.instcode', 'left');
		$this->db->where(array('instcode' => $instcode));
		$query = $this->db->get();
		return $query->result_array();
		
		
	}
	public function showauthority($programid)
	{
		
		$this->db->select('*');
		$this->db->from('b_program');
		
		$this->db->where(array('programid' => $programid));
		$query = $this->db->get();
		return $query->result_array();
		
		
	}
	public function categorylist()
	{
		
		$query = $this->db->get('settings_permit');
		return $query->result_array();
		
		
	}
	
	
	public function updatepermitfile($filename,$fileattachmentid_permit){
		$data = array(
               'permit_filename' => $filename
            );

			$this->db->where('permitid', $fileattachmentid_permit);
			$this->db->update('permits_recognition', $data); 
	}
	
	public function updatefilename($permitid){
		$data = array(
               'permit_filename' => "NONE"
            );

			$this->db->where('permitid', $permitid);
			$this->db->update('permits_recognition', $data); 
	}
	
	
}

?>