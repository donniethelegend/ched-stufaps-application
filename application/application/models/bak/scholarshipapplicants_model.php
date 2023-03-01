<?php


class Scholarshipapplicants_model extends CI_Model
{
	
	public function get()
	{
		//$result = $this->db->get('contacts');
		$applicants = $this->db->query("select * from scholarship_applicant");
		return $applicants->result_array();
		
		
	}
	public function getfilteryear($year)
	{
		//$result = $this->db->get('contacts');
		$applicants = $this->db->query("SELECT *,(SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2) AS equivgrade ,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2) AS equivincome, (SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6 AS totalgrade,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4 AS totalincome, ((SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6)+((SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4) AS grandtotal  FROM scholarship_applicant WHERE yearapplied = $year ORDER BY grandtotal desc ");
		return $applicants->result_array();
		
		
	}
	
	public function getprofile($id)
	{
		//$result = $this->db->get('contacts');
		
		$sql = $this->db->query("SELECT *,(SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2) AS equivgrade ,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2) AS equivincome, (SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6 AS totalgrade,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4 AS totalincome, ((SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6)+((SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4) AS grandtotal FROM scholarship_applicant LEFT JOIN scholarship_hei ON scholarship_applicant.hei = scholarship_hei.heicode WHERE applicantid=".$this->db->escape($id)."");
		$sqlresult = $sql->result_array();
		return $sqlresult[0];
		
	}
	
	public function getyearapplied()
	{
		//$result = $this->db->get('contacts');
		
		$sql = $this->db->query("SELECT yearapplied FROM scholarship_applicant GROUP BY yearapplied order by yearapplied desc");
		return $sql->result_array();
		
		
	}
	
	
	
	public function gethei()
	{
		//$result = $this->db->get('contacts');
		$heilist = $this->db->query("SELECT * FROM scholarship_hei");
		return $heilist->result_array();
		
		
	}
	
	public function getaccount()
	{
		//$result = $this->db->get('contacts');
		$account = $this->db->query("SELECT * FROM accounts");
		return $account->result_array();
		
		
	}
	
	public function getusercount()
	{
		//$result = $this->db->get('contacts');
		$usercount = $this->db->query("SELECT COUNT(*) as totalcount,users.name as username FROM scholarship_applicant LEFT JOIN users ON scholarship_applicant.addedbyuid = users.uid GROUP BY addedbyuid");
		return $usercount->result_array();
		
		
	}
	

	public function updateprofile($applicantid,$lastname,$firstname,$middlename,$dateofbirth,$placeofbirth,$gender,$civilstatus,$citizenship,$contactno,$email,$extension,$barangay,$towncity,$province,$zipcode,$congressionaldistrict,$heicode,$course,$father,$foccupation,$mother,$moccupation,$siblingno,$disability,$yearofapplication,$year_level,$average_grade,$income,$type,$hsgraduated)
	{
		//$result = $this->db->get('contacts');
		
		$sql = "update scholarship_applicant set lastname=".$this->db->escape($lastname).",firstname=".$this->db->escape($firstname).",middlename=".$this->db->escape($middlename).",extension=".$this->db->escape($extension).",gender= ".$this->db->escape($gender).",barangay=".$this->db->escape($barangay).",towncity=".$this->db->escape($towncity).",province=".$this->db->escape($province).",zipcode=".$this->db->escape($zipcode).",dateofbirth=".$this->db->escape($dateofbirth).",placeofbirth=".$this->db->escape($placeofbirth).",civilstatus=".$this->db->escape($civilstatus).",citizenship=".$this->db->escape($citizenship).",congressionaldistrict=".$this->db->escape($congressionaldistrict).",hei=".$this->db->escape($heicode).",course=".$this->db->escape($course).",contactno=".$this->db->escape($contactno).",email=".$this->db->escape($email).",father=".$this->db->escape($father).",foccupation=".$this->db->escape($foccupation).",mother=".$this->db->escape($mother).",moccupation=".$this->db->escape($moccupation).",siblingno=".$this->db->escape($siblingno).",disability=".$this->db->escape($disability).",yearapplied=".$this->db->escape($yearofapplication).",year_level=".$this->db->escape($year_level).",average_grade=".$this->db->escape($average_grade).",income=".$this->db->escape($income).",type=".$this->db->escape($type).",hsgraduated=".$this->db->escape($hsgraduated)."where applicantid=".$this->db->escape($applicantid)."";
		echo $sql;
		$this->db->query($sql);
		
	}
	public function getequiv($average_grade)
	{
		//$result = $this->db->get('contacts');

		$sql = $this->db->query("SELECT equivalentpoint FROM scholarship_grade where range1>=$average_grade && range2<=$average_grade");
		$sqlresult = $sql->result_array();
		return $sqlresult[0]['equivalentpoint'];
		
	}
	
	public function checkduplicate($lastname,$firstname,$middlename)
	{
		//$result = $this->db->get('contacts');
		
		$sql = $this->db->query("select count(*) as duplicatecount from scholarship_applicant WHERE lastname=upper(".$this->db->escape($lastname).") AND firstname=upper(".$this->db->escape($firstname).") AND middlename=upper(".$this->db->escape($middlename).")");
		$sqlresult = $sql->result_array();
		return $sqlresult[0]['duplicatecount'];
		
	}
	
}

?>