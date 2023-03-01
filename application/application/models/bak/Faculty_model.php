<?php


class Faculty_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->session;
		$dbname = $this->session->userdata('regioncode');
		$this->db = $this->load->database($dbname, true);
	}
	
	public function getfaculty($search_instcode)
	{
		//$result = $this->db->get('contacts');
		$permits = $this->db->query("SELECT a_faculty.instcode,instname,facultyid, faculty_name,faculty_full_part_code,fullpart_description,faculty_gender,highestdegree_description,faculty_programname,faculty_masters,faculty_doctorate,license_description,tenure,rank_description,teaching_description, subjects, salary_description,faculty_status
FROM a_faculty
LEFT JOIN ref_f_fullpart ON a_faculty.faculty_full_part_code = ref_f_fullpart.fullpartcode
LEFT JOIN ref_f_highestdegree ON a_faculty.highest_degree_code = ref_f_highestdegree.highestdegreecode
LEFT JOIN ref_f_license ON a_faculty.professional_license_code = ref_f_license.licensecode
LEFT JOIN ref_f_rank ON a_faculty.rank_code = ref_f_rank.rankcode
LEFT JOIN ref_f_teachingload ON a_faculty.teaching_load_code = ref_f_teachingload.teachingloadcode
LEFT JOIN ref_f_salary ON a_faculty.annual_salary_code = ref_f_salary.salarycode 
LEFT JOIN a_institution_profile ON a_faculty.instcode = a_institution_profile.instcode where a_faculty.instcode=".$this->db->escape($search_instcode)." and faculty_deleted=0");
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
	
	
	
	
	
	
	public function deletefaculty($facultyid){
		
		//$this->db->delete('a_buildings', array('buildingid' => $buildingid));
		$sql = "update a_faculty set faculty_deleted='1' where facultyid=".$this->db->escape($facultyid)."";
		$this->db->query($sql);
	}
	
	public function getfacultydetails($facultyid)
	{
		//$result = $this->db->get('contacts');
		$sqldetails = $this->db->query("SELECT a_faculty.instcode,instname,facultyid, faculty_name,faculty_full_part_code,fullpart_description,faculty_gender,highestdegree_description,faculty_programname,faculty_masters,faculty_doctorate,license_description,tenure,rank_description,teaching_description, subjects, salary_description,teaching_discipline,highest_degree_code,faculty_programcode,faculty_masterscode,faculty_doctoratecode,professional_license_code,rank_code,teaching_load_code,annual_salary_code,faculty_status
FROM a_faculty
LEFT JOIN ref_f_fullpart ON a_faculty.faculty_full_part_code = ref_f_fullpart.fullpartcode
LEFT JOIN ref_f_highestdegree ON a_faculty.highest_degree_code = ref_f_highestdegree.highestdegreecode
LEFT JOIN ref_f_license ON a_faculty.professional_license_code = ref_f_license.licensecode
LEFT JOIN ref_f_rank ON a_faculty.rank_code = ref_f_rank.rankcode
LEFT JOIN ref_f_teachingload ON a_faculty.teaching_load_code = ref_f_teachingload.teachingloadcode
LEFT JOIN ref_f_salary ON a_faculty.annual_salary_code = ref_f_salary.salarycode 
LEFT JOIN a_institution_profile ON a_faculty.instcode = a_institution_profile.instcode where facultyid=".$this->db->escape($facultyid)."");
		$result = $sqldetails->result_array();
		return $result[0];
		
		
	}
	
	
	public function savefaculty($instcode,$faculty_name,$faculty_full_part_code,$faculty_gender,$teaching_discipline,$highest_degree_code,$faculty_programcode,$faculty_programname,$faculty_masterscode,$faculty_masters,$faculty_doctoratecode,$faculty_doctorate,$professional_license_code,$tenure,$rank_code,$teaching_load_code,$subjects,$annual_salary_code){
		
		$uid = $this->session->userdata('uid');
		
		$sql = "INSERT INTO a_faculty (instcode,faculty_name,faculty_full_part_code,faculty_gender,teaching_discipline,highest_degree_code,faculty_programcode,faculty_programname,faculty_masterscode,faculty_masters,faculty_doctoratecode,faculty_doctorate,professional_license_code,tenure,rank_code,teaching_load_code,subjects,annual_salary_code,addedbyuid) VALUES (".$this->db->escape($instcode).", ".$this->db->escape($faculty_name).", ".$this->db->escape($faculty_full_part_code).", ".$this->db->escape($faculty_gender).", ".$this->db->escape($teaching_discipline).", ".$this->db->escape($highest_degree_code).", ".$this->db->escape($faculty_programcode).", ".$this->db->escape($faculty_programname).", ".$this->db->escape($faculty_masterscode).", ".$this->db->escape($faculty_masters).", ".$this->db->escape($faculty_doctoratecode).", ".$this->db->escape($faculty_doctorate).", ".$this->db->escape($professional_license_code).", ".$this->db->escape($tenure).", ".$this->db->escape($rank_code).", ".$this->db->escape($teaching_load_code).", ".$this->db->escape($subjects).", ".$this->db->escape($annual_salary_code).",'$uid')";
		$this->db->query($sql);
	}
	
	public function updatefaculty($instcode,$faculty_name,$faculty_full_part_code,$faculty_gender,$teaching_discipline,$highest_degree_code,$faculty_programcode,$faculty_programname,$faculty_masterscode,$faculty_masters,$faculty_doctoratecode,$faculty_doctorate,$professional_license_code,$tenure,$rank_code,$teaching_load_code,$subjects,$annual_salary_code,$edit_facultyid,$faculty_status)
	{
		
		$sql = "update a_faculty set instcode=".$this->db->escape($instcode).",faculty_name=".$this->db->escape($faculty_name).",faculty_full_part_code=".$this->db->escape($faculty_full_part_code).",faculty_gender=".$this->db->escape($faculty_gender).",teaching_discipline= ".$this->db->escape($teaching_discipline).",highest_degree_code= ".$this->db->escape($highest_degree_code).",faculty_programcode= ".$this->db->escape($faculty_programcode).",faculty_programname= ".$this->db->escape($faculty_programname).",faculty_masterscode= ".$this->db->escape($faculty_masterscode).",faculty_masters= ".$this->db->escape($faculty_masters).",faculty_doctoratecode= ".$this->db->escape($faculty_doctoratecode).",faculty_doctorate= ".$this->db->escape($faculty_doctorate).",professional_license_code= ".$this->db->escape($professional_license_code).",tenure= ".$this->db->escape($tenure).",rank_code= ".$this->db->escape($rank_code).",teaching_load_code= ".$this->db->escape($teaching_load_code).",subjects= ".$this->db->escape($subjects).",annual_salary_code= ".$this->db->escape($annual_salary_code).",faculty_status= ".$this->db->escape($faculty_status)." where facultyid=".$this->db->escape($edit_facultyid)."";
		//echo $sql;
		$this->db->query($sql);
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function getfullpart()
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * FROM ref_f_fullpart");
		return $sql->result_array();
		
		
	}
	public function gethighdegree()
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * FROM ref_f_highestdegree");
		return $sql->result_array();
		
		
	}

	public function getlicensecode()
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * FROM ref_f_license");
		return $sql->result_array();
		
		
	}
	public function getrank()
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * FROM ref_f_rank");
		return $sql->result_array();
		
		
	}

	public function getsalary()
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * FROM ref_f_salary");
		return $sql->result_array();
		
		
	}
	
	public function getteachingload()
	{
		//$result = $this->db->get('contacts');
		$sql = $this->db->query("SELECT * FROM ref_f_teachingload");
		return $sql->result_array();
		
		
	}
	
	public function downloadfaculty()
	{
		//$result = $this->db->get('contacts');
		$permits = $this->db->query("SELECT a_faculty.instcode,instname,street,municipality,province1,province2,heitype,facultyid, faculty_name,faculty_full_part_code,fullpart_description,faculty_gender,highestdegree_description,faculty_programname,faculty_masters,faculty_doctorate,license_description,tenure,rank_description,teaching_description, subjects, salary_description,faculty_status
FROM a_faculty
LEFT JOIN ref_f_fullpart ON a_faculty.faculty_full_part_code = ref_f_fullpart.fullpartcode
LEFT JOIN ref_f_highestdegree ON a_faculty.highest_degree_code = ref_f_highestdegree.highestdegreecode
LEFT JOIN ref_f_license ON a_faculty.professional_license_code = ref_f_license.licensecode
LEFT JOIN ref_f_rank ON a_faculty.rank_code = ref_f_rank.rankcode
LEFT JOIN ref_f_teachingload ON a_faculty.teaching_load_code = ref_f_teachingload.teachingloadcode
LEFT JOIN ref_f_salary ON a_faculty.annual_salary_code = ref_f_salary.salarycode 
LEFT JOIN a_institution_profile ON a_faculty.instcode = a_institution_profile.instcode WHERE faculty_deleted=0");
		return $permits->result_array();
		
		
	}
	
	public function getheifaculty($search_instcode_post)
	{
		$faculty = $this->db->query("SELECT a_faculty.instcode,instname,street,municipality,province1,province2,heitype,facultyid, faculty_name,faculty_full_part_code,fullpart_description,faculty_gender,highestdegree_description,faculty_programname,faculty_masters,faculty_doctorate,license_description,tenure,rank_description,teaching_description, subjects, salary_description,faculty_status
FROM a_faculty
LEFT JOIN ref_f_fullpart ON a_faculty.faculty_full_part_code = ref_f_fullpart.fullpartcode
LEFT JOIN ref_f_highestdegree ON a_faculty.highest_degree_code = ref_f_highestdegree.highestdegreecode
LEFT JOIN ref_f_license ON a_faculty.professional_license_code = ref_f_license.licensecode
LEFT JOIN ref_f_rank ON a_faculty.rank_code = ref_f_rank.rankcode
LEFT JOIN ref_f_teachingload ON a_faculty.teaching_load_code = ref_f_teachingload.teachingloadcode
LEFT JOIN ref_f_salary ON a_faculty.annual_salary_code = ref_f_salary.salarycode 
LEFT JOIN a_institution_profile ON a_faculty.instcode = a_institution_profile.instcode WHERE faculty_deleted=0 AND a_faculty.instcode=".$this->db->escape($search_instcode_post)."");
		return $faculty->result_array();
		
		
		
	}
	
	
	public function searchfaculty($facultysearch)
	{
		$clean_search = "%$facultysearch%";
		
		$query = $this->db->query("SELECT a_faculty.instcode,instname,facultyid, faculty_name,faculty_full_part_code,fullpart_description,faculty_gender,highestdegree_description,faculty_programname,faculty_masters,faculty_doctorate,license_description,tenure,rank_description,teaching_description, subjects, salary_description,faculty_status
FROM a_faculty
LEFT JOIN ref_f_fullpart ON a_faculty.faculty_full_part_code = ref_f_fullpart.fullpartcode
LEFT JOIN ref_f_highestdegree ON a_faculty.highest_degree_code = ref_f_highestdegree.highestdegreecode
LEFT JOIN ref_f_license ON a_faculty.professional_license_code = ref_f_license.licensecode
LEFT JOIN ref_f_rank ON a_faculty.rank_code = ref_f_rank.rankcode
LEFT JOIN ref_f_teachingload ON a_faculty.teaching_load_code = ref_f_teachingload.teachingloadcode
LEFT JOIN ref_f_salary ON a_faculty.annual_salary_code = ref_f_salary.salarycode 
LEFT JOIN a_institution_profile ON a_faculty.instcode = a_institution_profile.instcode where a_faculty.faculty_name like ".$this->db->escape($clean_search)." and faculty_deleted=0");
		return $query->result_array();
		
		
	}

	
}

?>