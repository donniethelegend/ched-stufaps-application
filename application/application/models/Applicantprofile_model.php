<?php


class Applicantprofile_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database("default", true);
	}
	
	
	public function loginapplicant($applicantid,$firstname,$lastname,$dateofbirth){
		
		$noofuser = $this->db->query("SELECT count(*) as noofuser FROM scholarship_applicant WHERE applicantid=".$this->db->escape($applicantid)." AND UPPER(firstname)=UPPER(".$this->db->escape($firstname).") AND UPPER(lastname)=UPPER(".$this->db->escape($lastname).") AND dateofbirth=".$this->db->escape($dateofbirth)." ");
		$usercount = $noofuser->result_array();
		$count = $usercount[0]['noofuser'];
		
		
		if($count ==0){
			//header('Location:../login');
			echo "0";
		}else{
			
			$userinfo = $this->db->query("SELECT * FROM scholarship_applicant WHERE applicantid=".$this->db->escape($applicantid)." AND UPPER(firstname)=UPPER(".$this->db->escape($firstname).") AND UPPER(lastname)=UPPER(".$this->db->escape($lastname).") AND dateofbirth=".$this->db->escape($dateofbirth)." ");
			$info = $userinfo->result_array();
			
			$this->session->set_userdata('applicantid', $applicantid);
			$this->session->set_userdata('applicantname', $info[0]['firstname']);
			//$this->session->set_userdata('contactno', $mobile_no);
			
			echo "1";
			//echo $this->session->userdata('name');
			//header('Location:../home');
		}
		
		//echo  "SELECT * FROM scholarship_applicant WHERE applicantid=".$this->db->escape($applicantid)." AND UPPER(firstname)=UPPER(".$this->db->escape($firstname).") AND UPPER(lastname)=UPPER(".$this->db->escape($lastname).") AND dateofbirth=".$this->db->escape($dateofbirth)." ";
		
	}
	
}

?>