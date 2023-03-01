<?php


class Centraloffice_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->session;
		$dbname = $this->session->userdata('regioncode');
		if($dbname==null){
			//echo $dbname;
			 redirect('login');
			//header('Location:http://google.com');
		}
		$this->db = $this->load->database($dbname, true);
		
	}
	
	public function regionlist()
	{
		$sqlq = $this->db->query("Select region_description as label from regions order by regionid ASC");
		return $sqlq->result_array();
		/*$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("Select count(*) as value,'".$regions['region_description']."' as label from a_institution_profile where hei_status='ACTIVE'");
			$countper_region[] = $cpr->result_array();
			$ctr++;
		endforeach;
		
		return $countper_region;*/
	}
	
	public function regionlist_all()
	{
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		return $sqlq->result_array();
		
	}
	
	
	public function totalheiperregion()
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("Select count(*) as value from a_institution_profile where hei_status='ACTIVE'");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function totalheiperregion_table()
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("Select count(*) as value,'".$regions['region_description']."' as regionname,'".$regions['region_db']."' as region_db  from a_institution_profile where hei_status='ACTIVE'");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	
	public function searchhei($heisearch)
	{
		$clean_search = "%$heisearch%";
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		//$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("Select * from a_institution_profile where hei_status='ACTIVE' AND instname like ".$this->db->escape($clean_search)."");
			$countper_region += $cpr->result_array();
			///array_push($countper_region,$searchresult[0]);
			//$countper_region[$ctr]=$result;
			//$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function facultysearch($facultynamesearch)
	{
		$clean_search = "%$facultynamesearch%";
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		//$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("SELECT a_faculty.instcode,instname,facultyid, faculty_name,faculty_full_part_code,fullpart_description,faculty_gender,highestdegree_description,faculty_programname,faculty_masters,faculty_doctorate,license_description,tenure,rank_description,teaching_description, subjects, salary_description,faculty_status,a_institution_profile.region
FROM a_faculty
LEFT JOIN ref_f_fullpart ON a_faculty.faculty_full_part_code = ref_f_fullpart.fullpartcode
LEFT JOIN ref_f_highestdegree ON a_faculty.highest_degree_code = ref_f_highestdegree.highestdegreecode
LEFT JOIN ref_f_license ON a_faculty.professional_license_code = ref_f_license.licensecode
LEFT JOIN ref_f_rank ON a_faculty.rank_code = ref_f_rank.rankcode
LEFT JOIN ref_f_teachingload ON a_faculty.teaching_load_code = ref_f_teachingload.teachingloadcode
LEFT JOIN ref_f_salary ON a_faculty.annual_salary_code = ref_f_salary.salarycode 
LEFT JOIN a_institution_profile ON a_faculty.instcode = a_institution_profile.instcode where faculty_deleted=0 AND faculty_name like ".$this->db->escape($clean_search)."");
			$countper_region += $cpr->result_array();
			///array_push($countper_region,$searchresult[0]);
			//$countper_region[$ctr]=$result;
			//$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function getxlsinstprofile($heidb,$status)
	{
		//$result = $this->db->get('contacts');
		$this->db3 = $this->load->database($heidb, true);
		if($status=="ALL"){
			$heidir = $this->db3->query("SELECT * FROM a_institution_profile");
		}else{
			$heidir = $this->db3->query("SELECT * FROM a_institution_profile where hei_status=".$this->db->escape($status)."");
		}
		
		return $heidir->result_array();
		
		
	}
	
	public function totalloginperregion()
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("Select count(*) as value from users_log");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function totalloginperregion_table()
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("Select count(*) as value,'".$regions['region_description']."' as regionname,'".$regions['region_db']."' as region_db from users_log");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function getxlsuserlog($heidb)
	{
		//$result = $this->db->get('contacts');
		$this->db3 = $this->load->database($heidb, true);
		
			$heidir = $this->db3->query("SELECT * FROM users_log");
		
		
		return $heidir->result_array();
		
		
	}
	
		public function get()
	{
		
		$query = $this->db->get('school_year');
		return $query->result_array();
		
		
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
		
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		//$countper_region = array();
		//$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			
			
			$b_program = $this->db2->query("SELECT * FROM b_program where program_deleted=0");
			$programlist = $b_program->result_array();
			
			//insert blank enrolment
			$esql = "INSERT INTO b_program_enrolment (e_programid,instcode,edatayear,pcredit,tuitionperunit,programfee) SELECT programid, instcode,".$this->db2->escape($school_year)." ,pcredit,tuitionperunit,programfee FROM b_program";
			$this->db2->query($esql);
			
			//insert blank graduate
			$gsql = "INSERT INTO b_program_graduate (g_programid,instcode,gdatayear)
	SELECT programid, instcode, ".$this->db2->escape($school_year)." FROM b_program";
			$this->db2->query($gsql);
				

		endforeach;
		
		//return $countper_region;
		

		
	}
	public function deletesy($syid)
	{
		$data = array(
               'aydeleted' => 1
            );
		$this->db->where('syid', $syid);
		$this->db->update('school_year', $data); 
		
	}
	public function enablesy($syid,$ayear)
	{
		//enable clicked
		$data = array(
               'collection_status' => 1
            );
		$this->db->where('syid', $syid);
		$this->db->update('school_year', $data);
		//disable others
		$data = array(
               'collection_status' => 0
            );
		$this->db->where('syid !=', $syid);
		$this->db->update('school_year', $data);

		$data2 = array(
               'settings_value' => $ayear
            );
		$this->db->where('settings_name', 'current_ay');
		$this->db->update('settings', $data2); 
		
	}
	public function disablesy($syid)
	{
		$data = array(
               'collection_status' => 0
            );
		$this->db->where('syid', $syid);
		$this->db->update('school_year', $data); 
		
	}
	
	public function programsearch($programnamesearch)
	{
		$clean_search = "%$programnamesearch%";
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		//$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("SELECT instname,b_program.instcode,mainprogram,major,supervisor,pstatuscode,CONCAT(authcat,' ',authserial,', s. ', authyear) AS authority,remarks, a_institution_profile.region,mpcode,programlevel,major,discipline_description FROM b_program 
LEFT JOIN a_institution_profile ON b_program.instcode = a_institution_profile.instcode
LEFT JOIN ref_b_discipline_group on b_program.discipline = ref_b_discipline_group.groupcode
WHERE mainprogram LIKE ".$this->db->escape($clean_search)."");
			$countper_region += $cpr->result_array();
			///array_push($countper_region,$searchresult[0]);
			//$countper_region[$ctr]=$result;
			//$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	
	public function totalprogramperregion()
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("Select count(*) as value from b_program");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function totalprogramperregion_table()
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("Select count(*) as value,'".$regions['region_description']."' as regionname,'".$regions['region_db']."' as region_db from b_program");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function getxlsprogprofile($heidb)
	{
		//$result = $this->db->get('contacts');
		$this->db3 = $this->load->database($heidb, true);
		//if($status=="ALL"){
			$heidir = $this->db3->query("SELECT programid,b_program.instcode,instname,supervisor,programlevel,mainprogram,mpcode,major,mjcode,discipline,thesisdisert,pstatuscode,pstatyear,authcat,authserial,authyear,remarks,pmcode,pmif,nlyears,pcredit,tuitionperunit,programfee,region,discipline_description, majordisciplinename,specificdisciplinename FROM b_program LEFT JOIN a_institution_profile ON b_program.instcode = a_institution_profile.instcode
LEFT JOIN ref_b_discipline_group ON b_program.discipline = ref_b_discipline_group.groupcode
LEFT JOIN ref_b_discipline_specific ON b_program.mpcode = ref_b_discipline_specific.specificcode");
		//}else{
			//$heidir = $this->db3->query("SELECT * FROM a_institution_profile where hei_status=".$this->db->escape($status)."");
		//}
		
		return $heidir->result_array();
		
		
	}
	
	public function getaylist(){
		
		$this->db->order_by("syid", "desc"); 
		$query = $this->db->get('school_year');
		
		return $query->result_array();
	}
	
	public function getcurrentay(){
		
		$this->db->order_by("syid", "desc"); 
		$query = $this->db->get('school_year',1);
		return $query->result_array();
	}
	
	public function totalmaleenrolment($currentay,$programlevel)
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("SELECT SUM(newstudm+oldstudm+secondm+thirdm+fourthm+fifthm+sixthm+seventhm) AS value FROM b_program_enrolment LEFT JOIN b_program ON b_program_enrolment.e_programid = b_program.programid WHERE enrolment_deleted=0 AND edatayear='".$currentay."' AND b_program.programlevel = '".$programlevel."'");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function totalfemaleenrolment($currentay,$programlevel)
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("SELECT SUM(newstudf+oldstudf+secondf+thirdf+fourthf+fifthf+sixthf+seventhf) AS value FROM b_program_enrolment LEFT JOIN b_program ON b_program_enrolment.e_programid = b_program.programid WHERE enrolment_deleted=0 AND edatayear='".$currentay."' AND b_program.programlevel = '".$programlevel."'");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	public function totalenrolmentbygender_table()
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("Select count(*) as value,'".$regions['region_description']."' as regionname,'".$regions['region_db']."' as region_db from b_program");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function totalenrolmentbyprogramlevel($currentay,$currentregion,$programlevel)
	{
		$this->db2 = $this->load->database($currentregion, true);
		$sqlquery =$this->db2->query("SELECT mainprogram AS label, SUM(newstudm+newstudf+oldstudm+oldstudf+secondm+secondf+thirdm+thirdf+fourthm+fourthf+fifthm+fifthf+sixthm+sixthf+seventhm+seventhf) AS VALUE FROM b_program  
LEFT JOIN b_program_enrolment ON
b_program.programid = b_program_enrolment.e_programid
WHERE program_deleted=0 AND programlevel = '$programlevel' and b_program_enrolment.edatayear ='$currentay' GROUP BY mainprogram ORDER BY VALUE DESC");
		$result = $sqlquery->result_array();
		return $result;
		
	}
	
	public function totalenrolmentbydiscipline($currentay,$currentregion,$programlevel)
	{
		$this->db2 = $this->load->database($currentregion, true);
		
		$sqlquery_result2 =$this->db2->query("DROP VIEW IF EXISTS enrolmentbydiscipline");
		
		$sqlquery =$this->db2->query("CREATE VIEW enrolmentbydiscipline AS SELECT discipline_description AS label,SUM(newstudm+newstudf+oldstudm+oldstudf+secondm+secondf+thirdm+thirdf+fourthm+fourthf+fifthm+fifthf+sixthm+sixthf+seventhm+seventhf) AS totalenrolment,groupcode,sum(newstudm+oldstudm+secondm+thirdm+fourthm+fifthm+sixthm+seventhm) as totalmale, sum(newstudf+oldstudf+secondf+thirdf+fourthf+fifthf+sixthf+seventhf) as totalfemale FROM ref_b_discipline_group LEFT JOIN b_program ON ref_b_discipline_group.groupcode = b_program.discipline LEFT JOIN b_program_enrolment ON b_program_enrolment.e_programid = b_program.programid WHERE b_program_enrolment.edatayear ='$currentay' and b_program.programlevel = '$programlevel' GROUP BY b_program.discipline ORDER BY totalenrolment DESC");

$sqlquery_result =$this->db2->query("SELECT label,totalenrolment as totalen,totalmale,totalfemale, (totalenrolment / (SELECT SUM(totalenrolment) FROM enrolmentbydiscipline)) * 100 AS value FROM enrolmentbydiscipline");
		$result = $sqlquery_result->result_array();
		return $result;
		
	}
	
	public function totalenrolmentbycongdistrict($currentay,$currentregion,$programlevel)
	{
		$this->db2 = $this->load->database($currentregion, true);
		
		$sqlquery_result2 =$this->db2->query("DROP VIEW IF EXISTS enrolmentbycongdistrict");
		
		$sqlquery =$this->db2->query("CREATE VIEW enrolmentbycongdistrict AS
		SELECT congressional_district_name AS label ,SUM(newstudm+newstudf+oldstudm+oldstudf+secondm+secondf+thirdm+thirdf+fourthm+fourthf+fifthm+fifthf+sixthm+sixthf+seventhm+seventhf) AS totalenrolment,groupcode,
SUM(newstudm+oldstudm+secondm+thirdm+fourthm+fifthm+sixthm+seventhm) AS totalmale, SUM(newstudf+oldstudf+secondf+thirdf+fourthf+fifthf+sixthf+seventhf) AS totalfemale
FROM ref_b_discipline_group
LEFT JOIN b_program ON
ref_b_discipline_group.groupcode = b_program.discipline
LEFT JOIN b_program_enrolment ON
b_program_enrolment.e_programid = b_program.programid
LEFT JOIN a_institution_profile ON
b_program.instcode = a_institution_profile.instcode
LEFT JOIN a_institution_cong_district
ON a_institution_profile.instcode = a_institution_cong_district.instcode
WHERE b_program_enrolment.edatayear ='$currentay' AND b_program.programlevel = '$programlevel'
GROUP BY congressional_district_name
ORDER BY a_institution_cong_district.province ASC");

		$sqlquery_result =$this->db2->query("SELECT label,totalenrolment AS totalen,totalmale,totalfemale, (totalenrolment / (SELECT SUM(totalenrolment) FROM enrolmentbycongdistrict)) * 100 AS value
FROM enrolmentbycongdistrict;");
		$result = $sqlquery_result->result_array();
		return $result;
		
	}
	
	
	public function totalgraduatebyprogramlevel($currentay,$currentregion,$programlevel)
	{
		$this->db2 = $this->load->database($currentregion, true);
		$sqlquery =$this->db2->query("SELECT mainprogram AS label, SUM(gradm+gradf) AS VALUE FROM b_program  
LEFT JOIN b_program_graduate ON
b_program.programid = b_program_graduate.g_programid
WHERE program_deleted=0 AND programlevel = '$programlevel' AND b_program_graduate.gdatayear ='$currentay' GROUP BY mainprogram ORDER BY VALUE DESC");
		$result = $sqlquery->result_array();
		return $result;
		
	}
	
	
	public function totalmalegraduate($currentay,$programlevel)
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("SELECT SUM(gradm) AS VALUE FROM b_program_graduate LEFT JOIN b_program ON b_program_graduate.g_programid = b_program.programid 
WHERE graduate_deleted=0 AND gdatayear='$currentay' AND b_program.programlevel = '$programlevel'");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function totalfemalegraduate($currentay,$programlevel)
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("SELECT SUM(gradf) AS VALUE FROM b_program_graduate LEFT JOIN b_program ON b_program_graduate.g_programid = b_program.programid 
WHERE graduate_deleted=0 AND gdatayear='$currentay' AND b_program.programlevel = '$programlevel'");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function totalgraduatebydiscipline($currentay,$currentregion,$programlevel)
	{
		$this->db2 = $this->load->database($currentregion, true);
		
		$sqlquery_result2 =$this->db2->query("DROP VIEW IF EXISTS graduatebydiscipline");
		
		$sqlquery =$this->db2->query("CREATE VIEW graduatebydiscipline AS SELECT discipline_description AS label,SUM(gradm+gradf) AS totalgraduate,groupcode,SUM(gradm) AS totalmale, SUM(gradf) AS totalfemale 
FROM ref_b_discipline_group LEFT JOIN b_program ON ref_b_discipline_group.groupcode = b_program.discipline 
LEFT JOIN b_program_graduate ON b_program_graduate.g_programid = b_program.programid 
WHERE b_program_graduate.gdatayear ='$currentay' AND b_program.programlevel = '$programlevel' 
GROUP BY b_program.discipline ORDER BY totalgraduate DESC");

$sqlquery_result =$this->db2->query("SELECT label,totalgraduate as totalen,totalmale,totalfemale, (totalgraduate / (SELECT SUM(totalgraduate) FROM graduatebydiscipline)) * 100 AS value FROM graduatebydiscipline");
		$result = $sqlquery_result->result_array();
		return $result;
		
	}
	
	public function totalgraduatebycongdistrict($currentay,$currentregion,$programlevel)
	{
		$this->db2 = $this->load->database($currentregion, true);
		
		$sqlquery_result2 =$this->db2->query("DROP VIEW IF EXISTS graduatebycongdistrict");
		
		$sqlquery =$this->db2->query("CREATE VIEW graduatebycongdistrict AS
		SELECT congressional_district_name AS label ,SUM(gradm+gradf) AS totalgraduate,groupcode,
SUM(gradm) AS totalmale, SUM(gradf) AS totalfemale
FROM ref_b_discipline_group
LEFT JOIN b_program ON
ref_b_discipline_group.groupcode = b_program.discipline
LEFT JOIN b_program_graduate ON
b_program_graduate.g_programid = b_program.programid
LEFT JOIN a_institution_profile ON
b_program.instcode = a_institution_profile.instcode
LEFT JOIN a_institution_cong_district
ON a_institution_profile.instcode = a_institution_cong_district.instcode
WHERE b_program_graduate.gdatayear ='$currentay' AND b_program.programlevel = '$programlevel'
GROUP BY congressional_district_name
ORDER BY a_institution_cong_district.province ASC");

		$sqlquery_result =$this->db2->query("SELECT label,totalgraduate AS totalen,totalmale,totalfemale, (totalgraduate / (SELECT SUM(totalgraduate) FROM graduatebycongdistrict)) * 100 AS value
FROM graduatebycongdistrict;");
		$result = $sqlquery_result->result_array();
		return $result;
		
	}
	
	
}

?>