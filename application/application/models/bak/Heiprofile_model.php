<?php


class Heiprofile_model extends CI_Model
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
		$result = $this->db->get('a_institution_profile');
		
		return $result->result_array();
	}
	
	public function getinstname($icode)
	{
			//get institution name
			$this->db->select('*');
			$this->db->from('a_institution_profile');
			$this->db->where('instcode',$icode);
			//$query = $this->db->get();
			//if ($query->num_rows() > 0) {
			// query returned results
			return $this->db->get();
			//} else {
			// query returned no results
			//	$returnzero = array(array('result'=>'0'));
			//	return $returnzero;
			//}
			
		
	}
	public function getcontacts($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get(); */
			$contacts = $this->db->query("SELECT * FROM contacts WHERE instcode=".$this->db->escape($icode)."");
			return $contacts->result_array();
		
	}
	public function getprograms($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get(); */
			$progs = $this->db->query("SELECT programlevel,programid, mainprogram,supervisor,major,pstatuscode,authcat,authserial,authyear,discipline,discipline2,remarks FROM b_program where instcode=".$this->db->escape($icode)."");
			return $progs->result_array();
		
	}
	public function getdeans($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get(); */
			$deans = $this->db->query("SELECT * FROM a_deans where instcode=".$this->db->escape($icode)."");
			return $deans->result_array();
		
	}
	
	public function getformernames($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get(); */
			$formernames = $this->db->query("SELECT * FROM a_formernames where instcode=".$this->db->escape($icode)."");
			return $formernames->result_array();
		
	}

	public function getxls()
	{
		//$result = $this->db->get('contacts');
		$heidir = $this->db->query("SELECT b_program.programid, b_program.instcode,supervisor,datayear,programlevel,mainprogram,mpcode,major,mjcode,discipline,discipline2,thesisdisert,pstatuscode,pstatyear,authcat,authserial,authyear,remarks,pmcode,pmif,nlyears,b_program.pcredit,b_program.tuitionperunit,b_program.programfee,newstudm,newstudf,oldstudm,oldstudf,secondm,secondf,thirdm,thirdf,fourthm,fourthf,fifthm,fifthf,sixthm,sixthf,seventhm,seventhf,gradm,gradf FROM b_program LEFT JOIN b_program_enrolment ON b_program.programid = b_program_enrolment.e_programid LEFT JOIN b_program_graduate ON b_program.programid = b_program_graduate.g_programid WHERE program_deleted=0");
		return $heidir->result_array();
		
		
	}
	
	public function getxlsinstprofile()
	{
		//$result = $this->db->get('contacts');
		$heidir = $this->db->query("SELECT * FROM a_institution_profile");
		return $heidir->result_array();
		
		
	}
	
	public function getbuilding($icode)
	{

			$building = $this->db->query("SELECT * FROM a_buildings where instcode=".$this->db->escape($icode)."");
			return $building->result_array();
		
	}
	
	public function getdepartment($icode)
	{

			$department = $this->db->query("SELECT * FROM a_departments where instcode=".$this->db->escape($icode)."");
			return $department->result_array();
		
	}
	
	public function getfaculty($icode)
	{

			$department = $this->db->query("SELECT facultyid, faculty_name,fullpart_description,faculty_gender,highestdegree_description,faculty_programname,faculty_masters,faculty_doctorate,license_description,tenure,rank_description,teaching_description, subjects, salary_description
FROM a_faculty
LEFT JOIN ref_f_fullpart ON a_faculty.faculty_full_part_code = ref_f_fullpart.fullpartcode
LEFT JOIN ref_f_highestdegree ON a_faculty.highest_degree_code = ref_f_highestdegree.highestdegreecode
LEFT JOIN ref_f_license ON a_faculty.professional_license_code = ref_f_license.licensecode
LEFT JOIN ref_f_rank ON a_faculty.rank_code = ref_f_rank.rankcode
LEFT JOIN ref_f_teachingload ON a_faculty.teaching_load_code = ref_f_teachingload.teachingloadcode
LEFT JOIN ref_f_salary ON a_faculty.annual_salary_code = ref_f_salary.salarycode where instcode=".$this->db->escape($icode)."");
			return $department->result_array();
		
	}
	
	
	public function savehei($instcode,$instname)
	{
			
		$sql = "INSERT INTO a_institution_profile (instcode,instname) VALUES (".$this->db->escape($instcode).", ".$this->db->escape($instname).")";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
		/*
		$sqlselect = $this->db->query("SELECT MAX(heid) AS lastid FROM a_institution_profile");
		$lastidinserted = $sqlselect->result_array();
		//echo json_encode($lastidinserted[0]);
		$currentid = $lastidinserted[0]['lastid'];
		echo $currentid;*/
	}
	
	public function checkduplicatehei($instcode)
	{
			
		$duplicate = $this->db->query("SELECT count(*) as duplicate FROM a_institution_profile where instcode=".$this->db->escape($instcode)."");
		$duplicate_record = $duplicate->result_array();
		return $duplicate_record['0']['duplicate'];
	}
	
	public function checkduplicateprogram($instcode,$newprogramname)
	{
			
		$duplicate = $this->db->query("SELECT count(*) as duplicate FROM b_program where instcode=".$this->db->escape($instcode)." AND mainprogram like ".$this->db->escape($newprogramname)."");
		$duplicate_record = $duplicate->result_array();
		return $duplicate_record['0']['duplicate'];
	}
	
	public function saveformername($former_name,$former_year,$instcode)
	{
			
		$sql = "INSERT INTO a_formernames (instcode,formername,year) VALUES (".$this->db->escape($instcode).", ".$this->db->escape($former_name).", ".$this->db->escape($former_year).")";
		$this->db->query($sql);
		
	}
	
	public function deactivatehei()
	{
			
		
		
	}
	
	public function getprograminfo($programid)
	{
			
		$programinfo = $this->db->query("SELECT * FROM b_program where programid=".$this->db->escape($programid)."");
		$programinfoarray = $programinfo->result_array();
		return $programinfoarray;
	}
	
	public function updateprogram($editprogramname,$supervisor,$discipline,$discipline2,$authcat,$authserial,$authyear,$editmajor,$programid)
	{
			
		
		$sql = "update b_program set supervisor=".$this->db->escape($supervisor).", discipline=".$this->db->escape($discipline).",discipline2=".$this->db->escape($discipline2).",authcat=".$this->db->escape($authcat).",authserial=".$this->db->escape($authserial).",authyear=".$this->db->escape($authyear).",major=".$this->db->escape($editmajor).",mainprogram=".$this->db->escape($editprogramname)." where programid=".$this->db->escape($programid)."";

		$this->db->query($sql);
	}
	
	
	public function saveheiinfo($province2,$insthead,$titlehead,$atel,$afax,$ainsttelhead,$aemail,$awebsite,$astreet,$amunicipality,$aprovince,$aregion,$azip,$aestablished,$asec,$ayearapproved,$acollege,$auniversity,$instcode,$heid,$latitude,$longitude)
	{
			
		//Log Changes
		$this->load->helper('date');
		$now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Manila'));
		$now_timestamp = $now->format('Y-m-d H:i:s');
		//username
		$this->session;	
		$username = $this->session->userdata('username');
		//remarks
		$remarks = "";
		
		//get current values
		$heiprofile = $this->db->query("SELECT * FROM a_institution_profile where instcode=".$this->db->escape($instcode)." AND heid=".$this->db->escape($heid)."");
		$heiprofile_info = $heiprofile->result_array();
		
		
		//remarks
		if($heiprofile_info[0]['street']!=$astreet){
			$remarks.="Street from ".$heiprofile_info[0]['street']. " to " .$this->db->escape($astreet)."\n";
		}
		
		if($heiprofile_info[0]['municipality']!=$amunicipality){
			$remarks.="Municipality from ".$heiprofile_info[0]['municipality']. " to " .$this->db->escape($amunicipality)."\n";
		}
		
		if($heiprofile_info[0]['province1']!=$aprovince){
			$remarks.="Province from ".$heiprofile_info[0]['province1']. " to " .$this->db->escape($aprovince)."\n";
		}
		if($heiprofile_info[0]['province2']!=$province2){
			$remarks.="Province2 from ".$heiprofile_info[0]['province2']. " to " .$this->db->escape($province2)."\n";
		}
		if($heiprofile_info[0]['postalcode']!=$azip){
			$remarks.="Zip Code  from ".$heiprofile_info[0]['postalcode']. " to " .$this->db->escape($azip)."\n";
		}
		if($heiprofile_info[0]['insthead']!=$insthead){
			$remarks.="Head from ".$heiprofile_info[0]['insthead']. " to " .$this->db->escape($insthead)."\n";
		}
		if($heiprofile_info[0]['titlehead']!=$titlehead){
			$remarks.="Head Title from ".$heiprofile_info[0]['titlehead']. " to " .$this->db->escape($titlehead)."\n";
		}
		if($heiprofile_info[0]['insttel']!=$atel){
			$remarks.="Tel. No. from ".$heiprofile_info[0]['insttel']. " to " .$this->db->escape($atel)."\n";
		}
		if($heiprofile_info[0]['instfax']!=$afax){
			$remarks.="Fax No. from ".$heiprofile_info[0]['instfax']. " to " .$this->db->escape($afax)."\n";
		}
		if($heiprofile_info[0]['insttelhead']!=$ainsttelhead){
			$remarks.="Head Tel. No. from ".$heiprofile_info[0]['insttelhead']. " to " .$this->db->escape($ainsttelhead)."\n";
		}
		if($heiprofile_info[0]['email']!=$aemail){
			$remarks.="Email from ".$heiprofile_info[0]['email']. " to " .$this->db->escape($aemail)."\n";
		}
		if($heiprofile_info[0]['website']!=$awebsite){
			$remarks.="Website from ".$heiprofile_info[0]['website']. " to " .$this->db->escape($awebsite)."\n";
		}
		if($heiprofile_info[0]['established']!=$aestablished){
			$remarks.="Established from ".$heiprofile_info[0]['established']. " to " .$this->db->escape($aestablished)."\n";
		}
		if($heiprofile_info[0]['sec']!=$asec){
			$remarks.="SEC from ".$heiprofile_info[0]['sec']. " to " .$this->db->escape($asec)."\n";
		}
		if($heiprofile_info[0]['yearapproved']!=$ayearapproved){
			$remarks.="Year Approved from ".$heiprofile_info[0]['yearapproved']. " to " .$this->db->escape($ayearapproved)."\n";
		}
		if($heiprofile_info[0]['tocollege']!=$acollege){
			$remarks.="To College from ".$heiprofile_info[0]['tocollege']. " to " .$this->db->escape($acollege)."\n";
		}
		if($heiprofile_info[0]['touniversity']!=$auniversity){
			$remarks.="To University from ".$heiprofile_info[0]['touniversity']. " to " .$this->db->escape($auniversity)."\n";
		}
		if($heiprofile_info[0]['latitude']!=$latitude){
			$remarks.="Latitude from ".$heiprofile_info[0]['latitude']. " to " .$this->db->escape($latitude)."\n";
		}
		if($heiprofile_info[0]['longtitude']!=$longitude){
			$remarks.="Longitude from ".$heiprofile_info[0]['longtitude']. " to " .$this->db->escape($longitude)."\n";
		}
		

		if($remarks!=""){
			$sql_log = "INSERT INTO a_hei_log (heilogremarks,heiuser) VALUES (".$this->db->escape($remarks).", ".$this->db->escape($username).")";
			$this->db->query($sql_log);
		}
		
		
		
		
		
		//update heiprofile
		//$sql = "update a_institution_profile set street=".$this->db->escape($astreet)." where instcode=".$this->db->escape($instcode)."";
		$sql = "update a_institution_profile set insttel=".$this->db->escape($atel).", instfax=".$this->db->escape($afax).", insttelhead=".$this->db->escape($ainsttelhead).", email=".$this->db->escape($aemail).", website=".$this->db->escape($awebsite).", insthead=".$this->db->escape($insthead).", titlehead=".$this->db->escape($titlehead).", province2=".$this->db->escape($province2).", street=".$this->db->escape($astreet).", municipality=".$this->db->escape($amunicipality).", province1=".$this->db->escape($aprovince).", postalcode=".$this->db->escape($azip).", established=".$this->db->escape($aestablished).", sec=".$this->db->escape($asec).", yearapproved=".$this->db->escape($ayearapproved).", tocollege=".$this->db->escape($acollege).", touniversity=".$this->db->escape($auniversity).", latitude=".$this->db->escape($latitude).", longtitude=".$this->db->escape($longitude)." where instcode=".$this->db->escape($instcode)." AND heid=".$this->db->escape($heid)."";

		$this->db->query($sql);
	}
	
	public function savecontact($instcode,$contactname,$position,$email,$telno,$address)
	{
			
		$sql = "INSERT INTO contacts (contactname,telno,position,address,email,instcode) VALUES (".$this->db->escape($contactname).", ".$this->db->escape($telno).", ".$this->db->escape($position).", ".$this->db->escape($address).", ".$this->db->escape($email).", ".$this->db->escape($instcode).")";
		$this->db->query($sql);
		
	}
	public function deleteheicontact($contactid)
	{
		$this->db->delete('contacts', array('contactid' => $contactid));
		
	}
	
	public function deleteprogram($programid)
	{
		//$this->db->delete('contacts', array('programid' => $programid));
		$sql = "update b_program set program_deleted='1' where programid=".$this->db->escape($programid)."";

		$this->db->query($sql);
		
	}
	
	public function savedean($instcode,$deansname,$designation,$assignment,$baccalaureate,$masters,$doctoral)
	{
			
		$sql = "INSERT INTO a_deans (instcode,deansname,designation,assignment,baccalaureate,masters,doctoral) VALUES (".$this->db->escape($instcode).", ".$this->db->escape($deansname).", ".$this->db->escape($designation).", ".$this->db->escape($assignment).", ".$this->db->escape($baccalaureate).", ".$this->db->escape($masters).", ".$this->db->escape($doctoral).")";
		$this->db->query($sql);
		
	}
	
	public function deletedean($deanid)
	{
		$this->db->delete('a_deans', array('deanid' => $deanid));
		
	}
	
	
	public function getfacultyprofile($facultyid)
	{
			
		$faculty_profile = $this->db->query("SELECT * FROM a_faculty where facultyid=".$this->db->escape($facultyid)."");
		$faculty_details = $faculty_profile->result_array();
		return $faculty_details;
	}
	
	public function getfullpart()
	{
		$ref_fullpart = $this->db->query("SELECT * FROM ref_f_fullpart");
		return $ref_fullpart->result_array();
	}
	
	public function addnewprogram($instcode,$newprogramname,$newauthcat,$newauthserial,$newauthyear,$newmajor,$newselectsupervisor,$newselectdiscipline,$newselectdiscipline2)
	{
			
		$sql = "INSERT INTO b_program (instcode,supervisor,mainprogram,major,discipline,discipline2,authcat,authserial,authyear) VALUES (".$this->db->escape($instcode).", ".$this->db->escape($newselectsupervisor).", ".$this->db->escape($newprogramname).", ".$this->db->escape($newmajor).", ".$this->db->escape($newselectdiscipline).", ".$this->db->escape($newselectdiscipline2).", ".$this->db->escape($newauthcat).", ".$this->db->escape($newauthserial).", ".$this->db->escape($newauthyear).")";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
		
		$sqlselect = $this->db->query("SELECT MAX(programid) AS lastid FROM b_program");
		$lastidinserted = $sqlselect->result_array();
		//echo json_encode($lastidinserted[0]);
		$currentid = $lastidinserted[0]['lastid'];
		echo $currentid;
	}
	
	public function activehei()
	{
			
		$record = $this->db->query("SELECT count(*) as activehei from a_institution_profile where hei_status='ACTIVE'");
		$record_result = $record->result_array();
		return $record_result['0']['activehei'];
	}
	
	public function privatehei()
	{
			
		$record = $this->db->query("SELECT count(*) as privatehei from a_institution_profile where heitype='Private' and hei_status='ACTIVE'");
		$record_result = $record->result_array();
		return $record_result['0']['privatehei'];
	}
	public function luchei()
	{
			
		$record = $this->db->query("SELECT count(*) as luchei from a_institution_profile where heitype='LUC' and hei_status='ACTIVE'");
		$record_result = $record->result_array();
		return $record_result['0']['luchei'];
	}
	public function suchei()
	{
			
		$record = $this->db->query("SELECT count(*) as suchei from a_institution_profile where heitype='SUC' and hei_status='ACTIVE'");
		$record_result = $record->result_array();
		return $record_result['0']['suchei'];
	}
	
	public function savecoordinates($latitude,$longtitude,$instcode)
	{
			
		
		$sql = "update a_institution_profile set latitude=".$this->db->escape($latitude)." ,longtitude=".$this->db->escape($longtitude)." where instcode=".$this->db->escape($instcode)."";

		$this->db->query($sql);
	}
	
}

?>