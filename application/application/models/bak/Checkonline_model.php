<?php


class Checkonline_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		//$this->load->library('session');
		//$this->session;
		//$dbname = $this->session->userdata('regioncode');
		//$this->db = $this->load->database($dbname, true);
	}
	
	
	
	public function checkstatus($formsubmitted)
	{
			
			//$this->db = $this->load->database(, true);
			$fullname = $formsubmitted['fname'] ." %". $formsubmitted['middlei'].". ". $formsubmitted['lastname'];
			
			
			$this->db->select('checkidnum,semester,school_year,released,complete_name,checkdate,checkstatus,hei_name,awardnumber');
			$this->db->from('scholarship_checks');
			$this->db->like('complete_name',$fullname);
			$result = $this->db->get();
			//return $this->db->escape($fullname);
			return $result->result_array();

			
		
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
	
	
	
	public function saveapplication($formsubmitted)
	{
		//save to dbmain
		$this->db = $this->load->database('cav_main', true);
		//for online time on saving
		$this->db->query("SET SESSION time_zone = '+8:00';");
		
		$this->load->helper('date');
		$now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Manila'));
		$now_timestamp = $now->format('Y-m-d H:i:s');
		$current_year = $now->format('Y');
		
		$dbcav_cert_num = $this->generatenumber($formsubmitted['studtype']);
		
		//insert application form
		$data = array(
		   'lname' => $formsubmitted['lastname'] ,
		   'fname' => $formsubmitted['firstname'] ,
		   'mname' => $formsubmitted['middlename'] ,
		   'gender' => $formsubmitted['gender'] ,
		   'mobileno' => $formsubmitted['contactno'] ,
		   'email' => $formsubmitted['email'] ,
		   'instcode' => $formsubmitted['instcode'] ,
		   'course' => $formsubmitted['degree'] ,
		   'purpose' => $formsubmitted['purpose'] ,
		   'year_start' => $formsubmitted['yrstart'] ,
		   'year_end' => $formsubmitted['yrend'] ,
		   'student_type' => $formsubmitted['studtype'] ,
		   'applicant_bdate' => $formsubmitted['birthday'],
		   'dateofgraduation'=>$formsubmitted['dateofgraduation'],
		   'numberofunits'=>$formsubmitted['numberofunits'],
		   'semester'=>$formsubmitted['semester'],
		   'boardresolution'=>$formsubmitted['boardresolution'],
		   'cav_cert_year'=>$current_year,
		   'cav_cert_number'=>$dbcav_cert_num
		   
		   
		);

		$this->db->insert('cav_application', $data); 
		
		//$lastid = $this->db->insert_id();
		//insert remarks
		//$data2 = array(
		   //'cavappid' =>$lastid ,
		   //'cavapp_status' => 'For Processing'

		//);
			
		//$this->db->insert('cav_application_status', $data2); 

		
		//$sql = "INSERT INTO remarks_agent (aticketid,aremarks_info,uid,replytype,atime_stamp) VALUES (".$this->db->escape($ticketid).",".$this->db->escape($ticket_reply).",".$this->db->escape($uid).",".$this->db->escape($file_type).",".$this->db->escape($now_timestamp).")";
		//$this->db->query($sql);
		
					
		
	}
	
	public function updateapplication($formsubmitted)
	{
		//save to dbmain
		$this->db = $this->load->database('cav_main', true);
		//for online time on saving
		$this->db->query("SET SESSION time_zone = '+8:00';");
		
		$this->load->helper('date');
		$now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Manila'));
		$now_timestamp = $now->format('Y-m-d H:i:s');
		
		//insert application form
		$data = array(
		   'lname' => $formsubmitted['lastname'] ,
		   'fname' => $formsubmitted['firstname'] ,
		   'mname' => $formsubmitted['middlename'] ,
		   'gender' => $formsubmitted['gender'] ,
		   'mobileno' => $formsubmitted['contactno'] ,
		   'email' => $formsubmitted['email'] ,
		   'instcode' => $formsubmitted['instcode'] ,
		   'course' => $formsubmitted['degree'] ,
		   'purpose' => $formsubmitted['purpose'] ,
		   'year_start' => $formsubmitted['yrstart'] ,
		   'year_end' => $formsubmitted['yrend'] ,
		   'student_type' => $formsubmitted['studtype'] ,
		   'applicant_bdate' => $formsubmitted['birthday'],
		   'dateofgraduation'=>$formsubmitted['dateofgraduation'],
		   'numberofunits'=>$formsubmitted['numberofunits'],
		   'semester'=>$formsubmitted['semester'],
		   'boardresolution'=>$formsubmitted['boardresolution']
		   
		   
		);

		$this->db->where('cavappid', $formsubmitted['cavappid']);
		$this->db->update('cav_application', $data); 
		
		//$lastid = $this->db->insert_id();
		//insert remarks
		//$data2 = array(
		   //'cavappid' =>$lastid ,
		   //'cavapp_status' => 'For Processing'

		//);
			
		//$this->db->insert('cav_application_status', $data2); 

		
		//$sql = "INSERT INTO remarks_agent (aticketid,aremarks_info,uid,replytype,atime_stamp) VALUES (".$this->db->escape($ticketid).",".$this->db->escape($ticket_reply).",".$this->db->escape($uid).",".$this->db->escape($file_type).",".$this->db->escape($now_timestamp).")";
		//$this->db->query($sql);
		
					
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function save_pl($instcode,$course,$schoolyear,$filename,$uid,$file_type,$semester)
	{
		//save to dbmain
		$this->db = $this->load->database('cav_main', true);
		//for online time on saving
		$this->db->query("SET SESSION time_zone = '+8:00';");
		
		$this->load->helper('date');
		$now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Manila'));
		$now_timestamp = $now->format('Y-m-d H:i:s');
		
		$data = array(
		   'instcode' => $instcode ,
		   'pcourse' => $course ,
		   'psemester' => $semester ,
		   'pschool_year' => $schoolyear,
		   'pfilename' => $filename,
		   'uid' => $uid,
		   'pfiletype' => $file_type,
		   
		);

		$this->db->insert('promotional_list', $data); 

		
		//$sql = "INSERT INTO remarks_agent (aticketid,aremarks_info,uid,replytype,atime_stamp) VALUES (".$this->db->escape($ticketid).",".$this->db->escape($ticket_reply).",".$this->db->escape($uid).",".$this->db->escape($file_type).",".$this->db->escape($now_timestamp).")";
		//$this->db->query($sql);
		
					
		
	}
	
	public function getpromotionallist()
	{
		//save to dbmain
		$this->db2 = $this->load->database('cav_main', true);
		
		$this->db2->select('*');
		$this->db2->from('promotional_list');
		$this->db2->join('a_institution_profile', 'a_institution_profile.instcode = promotional_list.instcode', 'left');
		$this->db2->where(array('pldeleted' => 0));
		$query = $this->db2->get();
		return $query->result_array();
		
		
	}
	
	public function pluploaddetails($plid)
	{
		$this->db2 = $this->load->database('cav_main', true);
		
		$this->db2->select('*');
		$this->db2->from('promotional_list');
		$this->db2->join('a_institution_profile', 'a_institution_profile.instcode = promotional_list.instcode', 'left');
		$this->db2->where(array('plid' => $plid));
		$query = $this->db2->get();
		$result =  $query->result_array();
		
		return $result[0];
		
		
	}
	
	public function importplfile($csvcontent,$plid)
	{
		//save to dbmain
		$this->db = $this->load->database('cav_main', true);
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
                'pladdress' => $content['Address'],
                'gender' => $content['Gender'],
                'subject1' => $content['Subject1'],
                'units1' => $content['Units1'],
                'grade1' => $content['Grade1'],
				'subject2' => $content['Subject2'],
                'units2' => $content['Units2'],
                'grade2' => $content['Grade2'],
				'subject3' => $content['Subject3'],
                'units3' => $content['Units3'],
                'grade3' => $content['Grade3'],
				'subject4' => $content['Subject4'],
                'units4' => $content['Units4'],
                'grade4' => $content['Grade4'],
				'subject5' => $content['Subject5'],
                'units5' => $content['Units5'],
                'grade5' => $content['Grade5'],
				'subject6' => $content['Subject6'],
                'units6' => $content['Units6'],
                'grade6' => $content['Grade6'],
				'subject7' => $content['Subject7'],
                'units7' => $content['Units7'],
                'grade7' => $content['Grade7'],
				'subject8' => $content['Subject8'],
                'units8' => $content['Units8'],
                'grade8' => $content['Grade8'],
				'subject9' => $content['Subject9'],
                'units9' => $content['Units9'],
                'grade9' => $content['Grade9'],
				'subject10' => $content['Subject10'],
                'units10' => $content['Units10'],
                'grade10' => $content['Grade10'],
				'subject11' => $content['Subject11'],
                'units11' => $content['Units11'],
                'grade11' => $content['Grade11'],
                'remarks' => $content['remarks'],
                'pdata_year_level' => $content['year_level'],
                'pdata_semester' => $content['semester'],
                'pdata_school_year' => $content['school_year'],
                'plid' => $plid
                
                );
        }
		
		
		$this->db->insert_batch('promotionallist_data', $data); 
		
		//update el list
		$data2 = array(
               'plstatus' => 'DONE',
               'pimport_date' => $now_timestamp
            );
		$this->db->where('plid', $plid);
		$this->db->update('promotional_list', $data2); 
		
		
	
		
					
		
	}
	
	
	public function keywordsearch($keyword)
	{
		//save to dbmain
		$this->db2 = $this->load->database('cav_main', true);
		
		$this->db2->select('*');
		$this->db2->from('cav_application');
		//$this->db2->join('promotional_list', 'promotional_list.plid = promotionallist_data.plid', 'left');
		$this->db2->join('a_institution_profile', 'a_institution_profile.instcode = cav_application.instcode', 'left');
		//$this->db2->join('cav_application_status', 'cav_application_status.cavappid = cav_application.cavappid', 'left');
		$this->db2->like(array('lname' => $keyword));
		$this->db2->or_like(array('fname' => $keyword));
		
		//$this->db2->where(array('nameofstudent' => 0));
		$query = $this->db2->get();
		return $query->result_array();
		
		
	}
	
	
	
	
	public function deletefile($elid)
	{
		
		$this->db2 = $this->load->database('cav_main', true);
		$this->db2->delete('enrollment_list', array('elid' => $elid));
	}
	
	
	
	public function eldetails($elid)
	{
		$this->db2 = $this->load->database('cav_main', true);
		
		$this->db2->select('*');
		$this->db2->from('enrollment_list');
		$this->db2->where(array('elid' => $elid));
		$query = $this->db2->get();
		//print_r($query);
		$result =  $query->result_array();
		
		return $result[0];
		
		
	}
	
	public function generatenumber($student_type)
	{
		//save to dbmain
		$this->db2 = $this->load->database('cav_main', true);
		
		$this->load->helper('date');
		$now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Manila'));
		$current_year = $now->format('Y');
		
		
		$this->db2->select('*');
		$this->db2->from('cav_application');
		//$this->db2->join('a_institution_profile', 'a_institution_profile.instcode = promotional_list.instcode', 'left');
		$this->db2->where(array('cav_cert_year' => $current_year,'student_type' => $student_type));
		$query = $this->db2->get();
		$result = $query->result_array();
		
		if($result==null){
			$currentdbnum = 1;
		}else{
			$currentdbnum = (int)$result[0];
			$currentdbnum++;
		}
		$code = str_pad($currentdbnum, 4, '0', STR_PAD_LEFT);
		
		return $code;
		
		
		
	}
	
	
	public function cavapplicationdetails($cavappid)
	{
		$this->db2 = $this->load->database('cav_main', true);
		
		$this->db2->select('*');
		$this->db2->from('cav_application');
		$this->db2->where(array('cavappid' => $cavappid));
		$query = $this->db2->get();
		$result = $query->result_array();
		return $result[0];

	}
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	public function deleteaccount($accountid)
	{
		$this->db->delete('accounts', array('accountid' => $accountid));
	}

}

?>