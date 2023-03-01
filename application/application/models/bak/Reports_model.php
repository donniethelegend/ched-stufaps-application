<?php


class Reports_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->session;
		$dbname = $this->session->userdata('regioncode');
		$this->db = $this->load->database($dbname, true);
	}
	
	public function get($search_instcode)
	{
		//$result = $this->db->get('b_program');
		$result = $this->db->query("SELECT * FROM b_program LEFT JOIN a_institution_profile ON b_program.instcode = a_institution_profile.instcode where b_program.instcode=".$this->db->escape($search_instcode)." AND program_deleted=0");
		return $result->result_array();
	}
	
	public function getprogramdetails($programid)
	{
		$sqldetails = $this->db->query("SELECT * from b_program left join a_institution_profile on b_program.instcode = a_institution_profile.instcode where programid=".$this->db->escape($programid)."");
		$result = $sqldetails->result_array();
		return $result[0];
	}
	
	public function enrolmentlist($programid)
	{
		//$result = $this->db->get('b_program');
		$result = $this->db->query("SELECT *,(newstudm+oldstudm+secondm+thirdm+fourthm+fifthm+sixthm+seventhm) AS totalmale,(newstudf+oldstudf+secondf+thirdf+fourthf+fifthf+sixthf+seventhf) AS totalfemale,(newstudm+oldstudm+secondm+thirdm+fourthm+fifthm+sixthm+seventhm+newstudf+oldstudf+secondf+thirdf+fourthf+fifthf+sixthf+seventhf)AS gtotal FROM b_program_enrolment WHERE  e_programid=".$this->db->escape($programid)." AND enrolment_deleted=0");
		return $result->result_array();
	}
	
	public function graduatelist($programid)
	{
		//$result = $this->db->get('b_program');
		$result = $this->db->query("SELECT *, gradm+gradf AS gtotal FROM b_program_graduate WHERE  g_programid =".$this->db->escape($programid)." AND graduate_deleted=0");
		return $result->result_array();
	}
	
	
	public function getprograms($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get();
			$progs = $this->db->query("SELECT mainprogram,supervisor,major,pstatuscode,authcat,authserial,authyear,(newstudm+oldstudm+secondm+thirdm+fourthm+fifthm+sixthm+seventhm) AS totalmale,(newstudf+oldstudf+secondf+thirdf+fourthf+fifthf+sixthf+seventhf) AS totalfemale FROM b_program where instcode='$icode'");
			return $progs->result_array();
		 */
	}
	public function getdeans($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get();
			$deans = $this->db->query("SELECT * FROM a_deans where instcode='$icode'");
			return $deans->result_array();
		 */
	}
	
	public function gethei()
	{
		//$result = $this->db->get('contacts');
		$heilist = $this->db->query("SELECT * FROM a_institution_profile");
		return $heilist->result_array();
		
		
	}
	
	public function updateprogram($programid,$mainprogram,$mpcode,$major,$mjcode,$discipline,$discipline2,$pstatuscode,$thesisdisert,$pstatyear,$authserial,$authyear,$pmcode,$remarks,$nlyears,$pcredit,$tuitionperunit,$programfee,$supervisor,$programlevel,$authcat,$pmif)
	{

		
		$sql = "update b_program set mainprogram=".$this->db->escape($mainprogram).", mpcode=".$this->db->escape($mpcode).", major=".$this->db->escape($major).", mjcode=".$this->db->escape($mjcode).", discipline=".$this->db->escape($discipline).", discipline2=".$this->db->escape($discipline2).", pstatuscode=".$this->db->escape($pstatuscode).", thesisdisert=".$this->db->escape($thesisdisert).", pstatyear=".$this->db->escape($pstatyear).", authserial=".$this->db->escape($authserial).", authyear=".$this->db->escape($authyear).", pmcode=".$this->db->escape($pmcode).", remarks=".$this->db->escape($remarks).", nlyears=".$this->db->escape($nlyears).", pcredit=".$this->db->escape($pcredit).", tuitionperunit=".$this->db->escape($tuitionperunit).", programfee=".$this->db->escape($programfee).", supervisor=".$this->db->escape($supervisor).", programlevel=".$this->db->escape($programlevel).", authcat=".$this->db->escape($authcat).", pmif=".$this->db->escape($pmif)." where programid=".$this->db->escape($programid)."";
		$this->db->query($sql);
	}
	
	public function checkduplicateprogram($instcode,$newprogramname)
	{
			
		$duplicate = $this->db->query("SELECT count(*) as duplicate FROM b_program where instcode=".$this->db->escape($instcode)." AND mainprogram like ".$this->db->escape($newprogramname)."");
		$duplicate_record = $duplicate->result_array();
		return $duplicate_record['0']['duplicate'];
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
	
	public function deleteprogram($programid){
		
		//$this->db->delete('a_buildings', array('buildingid' => $buildingid));
		$sql = "update b_program set program_deleted='1' where programid=".$this->db->escape($programid)."";
		$this->db->query($sql);
		//delete enrollment and graduate
		$sql2 = "update b_program_enrolment set enrolment_deleted='1' where e_programid=".$this->db->escape($programid)."";
		$this->db->query($sql2);
		
		$sql2 = "update b_program_graduate set graduate_deleted='1' where g_programid=".$this->db->escape($programid)."";
		$this->db->query($sql2);
	}
	
	public function saveprogramsy($programsy,$programtable,$pid,$instcode,$pcredit,$tuitionperunit,$programfee)
	{
			
		
		if($programtable=="Enrolment"){
			$sql = "INSERT INTO b_program_enrolment (e_programid,instcode,edatayear,pcredit,tuitionperunit,programfee) VALUES (".$this->db->escape($pid).", ".$this->db->escape($instcode).", ".$this->db->escape($programsy).", ".$this->db->escape($pcredit).", ".$this->db->escape($tuitionperunit).", ".$this->db->escape($programfee).")";
		}else{
			$sql = "INSERT INTO b_program_graduate (g_programid,instcode,gdatayear) VALUES (".$this->db->escape($pid).", ".$this->db->escape($instcode).", ".$this->db->escape($programsy).")";
			
		}
		

		$this->db->query($sql);
		
		//echo $this->db->affected_rows();
		/*
		$sqlselect = $this->db->query("SELECT MAX(programid) AS lastid FROM b_program");
		$lastidinserted = $sqlselect->result_array();
		//echo json_encode($lastidinserted[0]);
		$currentid = $lastidinserted[0]['lastid'];
		echo $currentid;
		*/
	}
	
	public function deleteenrolment($programenrolmentid){
		
		//$this->db->delete('a_buildings', array('buildingid' => $buildingid));
		$sql = "update b_program_enrolment set enrolment_deleted='1' where programenrolmentid=".$this->db->escape($programenrolmentid)."";
		$this->db->query($sql);
	}
	public function deletegraduate($programgraduateid){
		
		//$this->db->delete('a_buildings', array('buildingid' => $buildingid));
		$sql = "update b_program_graduate set graduate_deleted='1' where programgraduateid=".$this->db->escape($programgraduateid)."";
		$this->db->query($sql);
	}
	
	public function updateenr($programenrolmentid,$pcredit,$tuitionperunit,$programfee,$newstudm,$newstudf,$oldstudm,$oldstudf,$secondm,$secondf,$thirdm,$thirdf,$fourthm,$fourthf,$fifthm,$fifthf,$sixthm,$sixthf,$seventhm,$seventhf)
	{
		
		$sql = "update b_program_enrolment set pcredit=".$this->db->escape($pcredit).",tuitionperunit=".$this->db->escape($tuitionperunit).",programfee=".$this->db->escape($programfee).",newstudm=".$this->db->escape($newstudm).",newstudf= ".$this->db->escape($newstudf).",oldstudm= ".$this->db->escape($oldstudm).",oldstudf= ".$this->db->escape($oldstudf).",secondm= ".$this->db->escape($secondm).",secondf= ".$this->db->escape($secondf).",thirdm= ".$this->db->escape($thirdm).",thirdf= ".$this->db->escape($thirdf).",fourthm= ".$this->db->escape($fourthm).",fourthf= ".$this->db->escape($fourthf).",fifthm= ".$this->db->escape($fifthm).",fifthf= ".$this->db->escape($fifthf).",sixthm= ".$this->db->escape($sixthm).",sixthf= ".$this->db->escape($sixthf).",seventhm= ".$this->db->escape($seventhm).",seventhf= ".$this->db->escape($seventhf)." where programenrolmentid=".$this->db->escape($programenrolmentid)."";
		//echo $sql;
		$this->db->query($sql);
		
		
	}
	
	public function updategnr($programgraduateid,$gradm,$gradf)
	{
		
		$sql = "update b_program_graduate set gradm=".$this->db->escape($gradm).",gradf=".$this->db->escape($gradf)." where programgraduateid=".$this->db->escape($programgraduateid)."";
		$this->db->query($sql);
		
		
	}
	
	public function savesupervisorprogram($programid,$supervisor)
	{
		$sql = "update b_program set supervisor=".$this->db->escape($supervisor)." where programid=".$this->db->escape($programid)."";

		$this->db->query($sql);
		
		
	}
	
	public function getheiprogram($search_instcode_post)
	{
		$faculty = $this->db->query("SELECT programid, b_program.instcode, instname, supervisor,programlevel,mainprogram,mpcode,major,mjcode,discipline,discipline2,thesisdisert,pstatuscode,pstatyear,authcat,authserial,authyear,remarks,pmcode,pmif,nlyears,pcredit,tuitionperunit,programfee
FROM b_program LEFT JOIN a_institution_profile ON b_program.instcode = a_institution_profile.instcode WHERE program_deleted=0 AND b_program.instcode=".$this->db->escape($search_instcode_post)."");
		return $faculty->result_array();
		
		
		
	}
	public function getenrolment($search_instcode_post)
	{
		$enrolment = $this->db->query("SELECT b_program_enrolment.instcode, instname,edatayear,mainprogram,newstudm,newstudf,oldstudm,oldstudf,secondm,secondf,thirdm,thirdf,fourthm,fourthf,fifthm,fifthf,sixthm,sixthf,seventhm,seventhf,
(newstudm+oldstudm+secondm+thirdm+fourthm+fifthm+sixthm+seventhm) AS totalm,
(newstudf+oldstudf+secondf+thirdf+fourthf+fifthf+sixthf+seventhf) AS totalf, 
(newstudm+oldstudm+secondm+thirdm+fourthm+fifthm+sixthm+seventhm+newstudf+oldstudf+secondf+thirdf+fourthf+fifthf+sixthf+seventhf) AS grandtotal FROM b_program_enrolment
LEFT JOIN b_program ON b_program_enrolment.e_programid = b_program.programid
LEFT JOIN a_institution_profile ON b_program_enrolment.instcode = a_institution_profile.instcode
WHERE b_program_enrolment.e_programid= ".$this->db->escape($search_instcode_post)." AND enrolment_deleted=0");
		return $enrolment->result_array();
		
		
		
	}
	
	public function getgraduate($search_instcode_post)
	{
		$enrolment = $this->db->query("SELECT b_program_graduate.instcode, instname,gdatayear,mainprogram,gradm,gradf,
(gradm+gradf) AS totalgrad FROM b_program_graduate
LEFT JOIN b_program ON b_program_graduate.g_programid = b_program.programid
LEFT JOIN a_institution_profile ON b_program_graduate.instcode = a_institution_profile.instcode
WHERE b_program_graduate.g_programid= ".$this->db->escape($search_instcode_post)." AND graduate_deleted=0");
		return $enrolment->result_array();
		
		
		
	}
	
	
}

?>