<?php


class Checksavailable_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->session;
		//$dbname = $this->session->userdata('regioncode');
		//$this->db = $this->load->database($dbname, true);
	}
	
	public function get()
	{
		//$result = $this->db->get('contacts');
		$applicants = $this->db->query("select * from scholarship_applicant");
		return $applicants->result_array();
		
		
	}
	public function getfilteryear($year,$month,$congdistrict)
	{
		//$result = $this->db->get('contacts');
		
		
		$uid = $this->session->userdata('uid');
		$usertype = $this->session->userdata('usertype');
		
		
		if($usertype=="Staff"){
			$view_sql = " AND addedbyuid='$uid'";
		}else{
			$view_sql = "";
			
		}
		
		if($congdistrict=="All"){
			$cong_d_sql = "";
		}else{
			$cong_d_sql = " AND congressionaldistrict=".$this->db->escape($congdistrict)."";
		}
		
		
		if($month=="All"){
			$applicants = $this->db->query("SELECT *,(SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2) AS equivgrade ,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2) AS equivincome, (SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6 AS totalgrade,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4 AS totalincome, ((SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6)+((SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4) AS grandtotal  FROM scholarship_applicant WHERE yearapplied = ".$this->db->escape($year) . $cong_d_sql. $view_sql." ORDER BY grandtotal desc ");
		}else{
			$applicants = $this->db->query("SELECT *,(SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2) AS equivgrade ,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2) AS equivincome, (SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6 AS totalgrade,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4 AS totalincome, ((SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6)+((SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4) AS grandtotal  FROM scholarship_applicant WHERE yearapplied = ".$this->db->escape($year)." AND month(time_encoded) = ".$this->db->escape($month). $cong_d_sql. $view_sql." ORDER BY grandtotal desc ");
		}
		
		return $applicants->result_array();
		
		
	}
	public function getsearch($keyword)
	{
		//$result = $this->db->get('contacts');
		
			//$keyword_u = "%".$keyword."%";
		
			$this->db->select('*');
			$this->db->from('scholarship_checks');
			$this->db->like('complete_name',$keyword);
			$result = $this->db->get();
			//return $this->db->escape($fullname);
			return $result->result_array();
			/*
		$applicants = $this->db->query("SELECT *,(SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2) AS equivgrade ,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2) AS equivincome, (SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6 AS totalgrade,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4 AS totalincome, ((SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6)+((SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4) AS grandtotal  FROM scholarship_applicant WHERE lastname like ".$this->db->escape($keyword_u)." OR firstname like ".$this->db->escape($keyword_u)." ");
		return $applicants->result_array();
		*/
		
	}
	
	public function getcheck($checkidnum)
	{
		//$result = $this->db->get('contacts');
		
			//$keyword_u = "%".$keyword."%";

			$this->db->select('*');
			$this->db->from('scholarship_checks');
			$this->db->where('checkidnum',$checkidnum);
			$result = $this->db->get();
			//return $this->db->escape($fullname);
			return $result->result_array();
			/*
		$applicants = $this->db->query("SELECT *,(SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2) AS equivgrade ,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2) AS equivincome, (SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6 AS totalgrade,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4 AS totalincome, ((SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6)+((SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4) AS grandtotal  FROM scholarship_applicant WHERE lastname like ".$this->db->escape($keyword_u)." OR firstname like ".$this->db->escape($keyword_u)." ");
		return $applicants->result_array();
		*/
		
	}
	
	
	
	
	public function getprofile($id)
	{
		//$result = $this->db->get('contacts');
		
		$sql = $this->db->query("SELECT *,(SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2) AS equivgrade ,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2) AS equivincome, (SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6 AS totalgrade,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4 AS totalincome, ((SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6)+((SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4) AS grandtotal FROM scholarship_applicant LEFT JOIN scholarship_hei ON scholarship_applicant.hei = scholarship_hei.heicode LEFT JOIN users ON scholarship_applicant.addedbyuid = users.uid WHERE applicantid=".$this->db->escape($id)."");
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
	

	public function updateprofile($applicantid,$lastname,$firstname,$middlename,$dateofbirth,$placeofbirth,$gender,$civilstatus,$citizenship,$contactno,$email,$extension,$barangay,$towncity,$province,$zipcode,$congressionaldistrict,$heicode,$course,$father,$foccupation,$mother,$moccupation,$siblingno,$disability,$yearofapplication,$year_level,$average_grade,$income,$type,$hsgraduated,$fstatus,$mstatus,$dswd4p,$datereceived,$father_m,$father_l,$mother_m,$mother_l,$lrn_no)
	{
		//$result = $this->db->get('contacts');
		
		$sql = "update scholarship_applicant set lastname=".$this->db->escape($lastname).",firstname=".$this->db->escape($firstname).",middlename=".$this->db->escape($middlename).",extension=".$this->db->escape($extension).",gender= ".$this->db->escape($gender).",barangay=".$this->db->escape($barangay).",towncity=".$this->db->escape($towncity).",province=".$this->db->escape($province).",zipcode=".$this->db->escape($zipcode).",dateofbirth=".$this->db->escape($dateofbirth).",placeofbirth=".$this->db->escape($placeofbirth).",civilstatus=".$this->db->escape($civilstatus).",citizenship=".$this->db->escape($citizenship).",congressionaldistrict=".$this->db->escape($congressionaldistrict).",hei=".$this->db->escape($heicode).",course=".$this->db->escape($course).",contactno=".$this->db->escape($contactno).",email=".$this->db->escape($email).",father=".$this->db->escape($father).",foccupation=".$this->db->escape($foccupation).",mother=".$this->db->escape($mother).",moccupation=".$this->db->escape($moccupation).",siblingno=".$this->db->escape($siblingno).",disability=".$this->db->escape($disability).",yearapplied=".$this->db->escape($yearofapplication).",year_level=".$this->db->escape($year_level).",average_grade=".$this->db->escape($average_grade).",income=".$this->db->escape($income).",type=".$this->db->escape($type).",hsgraduated=".$this->db->escape($hsgraduated).",fstatus=".$this->db->escape($fstatus).",mstatus=".$this->db->escape($mstatus).",dswd4p=".$this->db->escape($dswd4p).",datereceived=".$this->db->escape($datereceived).",father_m=".$this->db->escape($father_m).",father_l=".$this->db->escape($father_l).",mother_m=".$this->db->escape($mother_m).",mother_l=".$this->db->escape($mother_l).",lrn_no=".$this->db->escape($lrn_no)." where applicantid=".$this->db->escape($applicantid)."";
		//echo $sql;
		$this->db->query($sql);
		
	}
	public function getequiv($average_grade)
	{
		//$result = $this->db->get('contacts');

		$sql = $this->db->query("SELECT equivalentpoint FROM scholarship_grade where range1>=$average_grade && range2<=$average_grade");
		$sqlresult = $sql->result_array();
		return $sqlresult[0]['equivalentpoint'];
		
	}
	
	public function checkduplicate($lastname,$firstname,$middlename,$yearofapplication)
	{
		//$result = $this->db->get('contacts');
		$lastname_u = "%".$lastname."%";
		$firstname_u = "%".$firstname."%";
		$middlename_u = "%".$middlename."%";
		
		$sql = $this->db->query("select count(*) as duplicatecount from scholarship_applicant WHERE lastname=upper(".$this->db->escape($lastname).") AND firstname=upper(".$this->db->escape($firstname).")  AND middlename=upper(".$this->db->escape($middlename).") AND yearapplied=".$this->db->escape($yearofapplication)."");
		//$sql = $this->db->query("select count(*) as duplicatecount from scholarship_applicant WHERE lastname=upper(".$this->db->escape($lastname).") AND firstname=upper(".$this->db->escape($firstname).")  AND middlename=upper(".$this->db->escape($middlename).")");
		$sqlresult = $sql->result_array();
		return $sqlresult[0]['duplicatecount'];
		
	}
	
	public function listyearapplied($lastname,$firstname,$middlename)
	{
		//$result = $this->db->get('contacts');
		$lastname_u = "%".$lastname."%";
		$firstname_u = "%".$firstname."%";
		$middlename_u = "%".$middlename."%";
		
		//$sql = $this->db->query("select count(*) as duplicatecount from scholarship_applicant WHERE lastname=upper(".$this->db->escape($lastname).") AND firstname=upper(".$this->db->escape($firstname).")  AND middlename=upper(".$this->db->escape($middlename).") AND yearapplied=".$this->db->escape($yearofapplication)."");
		$sql = $this->db->query("select yearapplied from scholarship_applicant WHERE lastname=upper(".$this->db->escape($lastname).") AND firstname=upper(".$this->db->escape($firstname).") AND middlename=upper(".$this->db->escape($middlename).")");
		$sqlresult = $sql->result_array();
		return $sqlresult;
		
		//echo "select yearapplied from scholarship_applicant WHERE lastname=upper(".$this->db->escape($lastname).") AND firstname=upper(".$this->db->escape($firstname).") AND middlename=upper(".$this->db->escape($middlename).")";
		
	}
	
	public function applicantgrantee($applicantid)
	{
		
		
		$sql = $this->db->query("select * from scholarship_applicant WHERE applicantid=".$this->db->escape($applicantid)."");
		$sqlresult = $sql->result_array();
		$applicant_profile = $sqlresult[0];
		
		//print_r($applicant_profile);
		
		
		$sql = "INSERT INTO scholarship_studentprofile(lastname,firstname,middlename,extension,gender,barangay,towncity,province,zipcode,dateofbirth,placeofbirth,civilstatus,citizenship,congressionaldistrict,hei,course,contactno,email,father,foccupation,mother,moccupation,siblingno,disability,yearapplied,year_level,average_grade,income,grantee_status,hsgraduated,grantee_remarks) VALUES (".$this->db->escape($applicant_profile['lastname']).", ".$this->db->escape($applicant_profile['firstname']).", ".$this->db->escape($applicant_profile['middlename']).", ".$this->db->escape($applicant_profile['extension']).", ".$this->db->escape($applicant_profile['gender']).", ".$this->db->escape($applicant_profile['barangay']).", ".$this->db->escape($applicant_profile['towncity']).", ".$this->db->escape($applicant_profile['province']).", ".$this->db->escape($applicant_profile['zipcode']).", ".$this->db->escape($applicant_profile['dateofbirth']).", ".$this->db->escape($applicant_profile['placeofbirth']).", ".$this->db->escape($applicant_profile['civilstatus']).", ".$this->db->escape($applicant_profile['citizenship']).", ".$this->db->escape($applicant_profile['congressionaldistrict']).", ".$this->db->escape($applicant_profile['hei']).", ".$this->db->escape($applicant_profile['course']).", ".$this->db->escape($applicant_profile['contactno']).", ".$this->db->escape($applicant_profile['email']).", ".$this->db->escape($applicant_profile['father']).", ".$this->db->escape($applicant_profile['foccupation']).", ".$this->db->escape($applicant_profile['mother']).", ".$this->db->escape($applicant_profile['moccupation']).", ".$this->db->escape($applicant_profile['siblingno']).", ".$this->db->escape($applicant_profile['disability']).", ".$this->db->escape($applicant_profile['yearapplied']).", ".$this->db->escape($applicant_profile['year_level']).", ".$this->db->escape($applicant_profile['average_grade']).", ".$this->db->escape($applicant_profile['income']).", 'Unawarded', ".$this->db->escape($applicant_profile['hsgraduated']).", 'Unawarded')";
		$this->db->query($sql);
		
		
		$lastgranteeid = $this->db->query("SELECT MAX(scholarid) as lastid FROM scholarship_studentprofile");
		$grantee_id = $lastgranteeid->result_array();
		
		$data = array(
			'scholarid' => $grantee_id[0]['lastid'] 
			
		);

		$this->db->insert('scholarship_award_student', $data); 
		
		return $grantee_id[0]['lastid'];
		
		
		
	}
	
	public function city_municipality()
	{
		//$result = $this->db->get('contacts');
		$sqlquery = $this->db->query("SELECT * FROM scholarship_cong_district");
		return $sqlquery->result_array();
		
		
	}
	
	public function congid($congid)
	{
		//$result = $this->db->get('contacts');
		$sqlquery = $this->db->query("SELECT * FROM scholarship_cong_district where congid=$congid");
		$sql_result = $sqlquery->result_array();
		return $sql_result[0];
		
		
	}
	
	public function getcourses()
	{
		//$result = $this->db->get('contacts');
		$courselist = $this->db->query("SELECT * FROM scholarship_course");
		return $courselist->result_array();
		
		
	}
	public function congressionaldistrict()
	{
		//$result = $this->db->get('contacts');
		$courselist = $this->db->query("SELECT cong_district FROM scholarship_cong_district GROUP BY cong_district");
		return $courselist->result_array();
		
		
	}
	
	public function grantapplicant($applicantid,$uid){
		
		$esql = "INSERT INTO scholarship_studentprofile(lastname,firstname,middlename,extension,gender,barangay,towncity,province,zipcode,dateofbirth,placeofbirth,civilstatus,citizenship,congressionaldistrict,hei,course,contactno,email,father,foccupation,mother,moccupation,siblingno,disability,yearapplied,addedbyuid,year_level,average_grade,income,grantee_status,hsgraduated,grantee_remarks,applicantid) 
SELECT lastname,firstname,middlename,extension,gender,barangay,towncity,province,zipcode,dateofbirth,placeofbirth,civilstatus,citizenship,congressionaldistrict,hei,course,contactno,email,father,foccupation,mother,moccupation,siblingno,disability,yearapplied,".$uid.",year_level,average_grade,income,'New',hsgraduated,'', ".$this->db->escape($applicantid)."  FROM scholarship_applicant where applicantid=".$this->db->escape($applicantid)."";
			$this->db->query($esql);
		
	}
	
	
}

?>