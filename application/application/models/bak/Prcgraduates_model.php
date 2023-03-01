<?php


class Prcgraduates_model extends CI_Model
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
		$result = $this->db->get('accounts');
		
		return $result->result_array();
	}
	
	
	public function getactivehei()
	{
			//get institution name
			$this->db->select('*');
			$this->db->from('a_institution_profile');
			$this->db->where('hei_status','ACTIVE');
			$result = $this->db->get();
			return $result->result_array();

			
		
	}
	public function showprograms($instcode)
	{
		
		$this->db->select('*');
		$this->db->from('b_program');
		
		$this->db->where(array('instcode' => $instcode));
		$query = $this->db->get();
		return $query->result_array();
		
		
	}
	
	
	public function save_el($instcode,$course,$schoolyear,$filename,$uid,$file_type,$semester)
	{
		//save to dbmain
		//$this->db = $this->load->database('cav_main', true);
		//for online time on saving
		$this->db->query("SET SESSION time_zone = '+8:00';");
		
		$this->load->helper('date');
		$now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Manila'));
		$now_timestamp = $now->format('Y-m-d H:i:s');
		
		$data = array(
		   'instcode' => $instcode ,
		   'course' => $course ,
		   'semester' => $semester ,
		   'school_year' => $schoolyear,
		   'filename' => $filename,
		   'uid' => $uid,
		   'filetype' => $file_type,
		   
		);

		$this->db->insert('enrollment_list', $data); 

		
		//$sql = "INSERT INTO remarks_agent (aticketid,aremarks_info,uid,replytype,atime_stamp) VALUES (".$this->db->escape($ticketid).",".$this->db->escape($ticket_reply).",".$this->db->escape($uid).",".$this->db->escape($file_type).",".$this->db->escape($now_timestamp).")";
		//$this->db->query($sql);
		
					
		
	}
	
	public function getenrollmentlist()
	{
		//save to dbmain
		//$this->db2 = $this->load->database('cav_main', true);
		
		$this->db2->select('*');
		$this->db2->from('enrollment_list');
		$this->db2->join('a_institution_profile', 'a_institution_profile.instcode = enrollment_list.instcode', 'left');
		$this->db2->where(array('eldeleted' => 0));
		$query = $this->db2->get();
		return $query->result_array();
		
		
	}
	
	public function eluploaddetails($elid)
	{
		//$this->db2 = $this->load->database('cav_main', true);
		
		$this->db2->select('*');
		$this->db2->from('enrollment_list');
		$this->db2->join('a_institution_profile', 'a_institution_profile.instcode = enrollment_list.instcode', 'left');
		$this->db2->where(array('elid' => $elid));
		$query = $this->db2->get();
		$result =  $query->result_array();
		
		return $result[0];
		
		
	}
	
	public function importelfile($csvcontent,$elid)
	{
		//save to dbmain
		//$this->db = $this->load->database('cav_main', true);
		//for online time on saving
		$this->db->query("SET SESSION time_zone = '+8:00';");
		
		$this->load->helper('date');
		$now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Manila'));
		$now_timestamp = $now->format('Y-m-d H:i:s');
		
		
		foreach ($csvcontent as $content)
        {
            $data[] = array(
                'nameofstudent' => $content['NameOfStudent'],
                'eladdress' => $content['Address'],
                'gender' => $content['Gender'],
                'subject1' => $content['Subject1'],
                'units1' => $content['Units1'],
				'subject2' => $content['Subject2'],
                'units2' => $content['Units2'],
				'subject3' => $content['Subject3'],
                'units3' => $content['Units3'],
				'subject4' => $content['Subject4'],
                'units4' => $content['Units4'],
				'subject5' => $content['Subject5'],
                'units5' => $content['Units5'],
				'subject6' => $content['Subject6'],
                'units6' => $content['Units6'],
				'subject7' => $content['Subject7'],
                'units7' => $content['Units7'],
				'subject8' => $content['Subject8'],
                'units8' => $content['Units8'],
				'subject9' => $content['Subject9'],
                'units9' => $content['Units9'],
				'subject10' => $content['Subject10'],
                'units10' => $content['Units10'],
                'remarks' => $content['remarks'],
                'data_year_level' => $content['year_level'],
                'data_semester' => $content['semester'],
                'data_school_year' => $content['school_year'],
                'elid' => $elid
                
                );
        }
		
		
		$this->db->insert_batch('enrollmentlist_data', $data); 
		
		//update el list
		$data2 = array(
               'elstatus' => 'DONE',
               'import_date' => $now_timestamp
            );
		$this->db->where('elid', $elid);
		$this->db->update('enrollment_list', $data2); 
		
		
	
		
					
		
	}
	public function keywordsearch($keyword)
	{
		//save to dbmain
		//$this->db2 = $this->load->database('cav_main', true);
		
		$this->db2->select('*');
		$this->db2->from('enrollmentlist_data');
		$this->db2->join('enrollment_list', 'enrollment_list.elid = enrollmentlist_data.elid', 'left');
		$this->db2->join('a_institution_profile', 'a_institution_profile.instcode = enrollment_list.instcode', 'left');
		$this->db2->like(array('nameofstudent' => $keyword));
		//$this->db2->where(array('nameofstudent' => 0));
		$query = $this->db2->get();
		return $query->result_array();
		
		
	}
	public function deletefile($elid)
	{
		
		//$this->db2 = $this->load->database('cav_main', true);
		$this->db2->delete('enrollment_list', array('elid' => $elid));
	}
	
	
	
	public function eldetails($elid)
	{
		//$this->db2 = $this->load->database('cav_main', true);
		
		$this->db2->select('*');
		$this->db2->from('enrollment_list');
		$this->db2->where(array('elid' => $elid));
		$query = $this->db2->get();
		//print_r($query);
		$result =  $query->result_array();
		
		return $result[0];
		
		
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
	
	
	
	

	public function getprograms($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get(); */
			$progs = $this->db->query("SELECT mainprogram,supervisor,major,pstatuscode,authcat,authserial,authyear,(newstudm+oldstudm+secondm+thirdm+fourthm+fifthm+sixthm+seventhm) AS totalmale,(newstudf+oldstudf+secondf+thirdf+fourthf+fifthf+sixthf+seventhf) AS totalfemale FROM b_program where instcode='$icode'");
			return $progs->result_array();
		
	}
	public function getdeans($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get(); */
			$deans = $this->db->query("SELECT * FROM a_deans where instcode='$icode'");
			return $deans->result_array();
		
	}
	
	public function getformernames($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get(); */
			$formernames = $this->db->query("SELECT * FROM a_formernames where instcode='$icode'");
			return $formernames->result_array();
		
	}

	public function saveaccount($accountname,$email,$telno,$address)
	{
		$sql = "INSERT INTO accounts (accountname,address,telno,email) VALUES (".$this->db->escape($accountname).", ".$this->db->escape($address).", ".$this->db->escape($telno).", ".$this->db->escape($email).")";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
	}
	
	public function updateaccount($accountid,$accountname,$address,$telno,$email)
	{
		$sql = "update accounts set accountname=".$this->db->escape($accountname)." ,address=".$this->db->escape($address).",telno=".$this->db->escape($telno).",email=".$this->db->escape($email)." where accountid=".$this->db->escape($accountid)."";

		$this->db->query($sql);
	}
	
	public function deleteaccount($accountid)
	{
		$this->db->delete('accounts', array('accountid' => $accountid));
	}
	
	public function editaccount($accountid)
	{
		$account = $this->db->query("SELECT * from accounts WHERE accountid=".$this->db->escape($accountid)."");
		
		return $account->result_array();
	}
}

?>