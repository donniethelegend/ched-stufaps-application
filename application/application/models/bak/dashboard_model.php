<?php


class Dashboard_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		//$this->load->library('session');
		//$this->session;
		//$dbname = $this->session->userdata('regioncode');
		/*$dbname = "dataviz_r1";
		if($dbname==null){
			//echo $dbname;
			 redirect('login');
			//header('Location:http://google.com');
		}
		$this->db = $this->load->database($dbname, true);
		*/
		
	}
	//dataviz
	public function getinsttotalactive()
	{
		//$result = $this->db->get('contacts');
		$totalactive = $this->db->query("SELECT COUNT(*) AS totalinst FROM a_institution_profile WHERE hei_status='ACTIVE'");
		return $totalactive;
		
		
	}
	
	public function getinsttotalprograms()
	{
		
		$totalactive = $this->db->query("SELECT COUNT(*) AS totalprogram FROM b_program WHERE pstatuscode='CO'");
		return $totalactive;
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	public function toptengraduate()
	{
		$toptengraduate = $this->db->query("SELECT COUNT(*) AS noofschool,SUM(gradm+gradf) AS totalgraduate, mainprogram FROM b_program LEFT JOIN b_program_graduate ON b_program.programid = b_program_graduate.g_programid WHERE programlevel IN ('40','50','70','80','90') GROUP BY mainprogram ORDER BY totalgraduate DESC LIMIT 10");
		return $toptengraduate->result_array();
	}
	public function toptenenroll()
	{
		$topten = $this->db->query("SELECT COUNT(*) AS noofschool,SUM(newstudm+newstudf+oldstudm+oldstudf+secondm+secondf+thirdm+thirdf+fourthm+fourthf+fifthm+fifthf+sixthm+sixthf+seventhm+seventhf) AS totalenrollment, mainprogram FROM b_program LEFT JOIN b_program_enrolment ON b_program.programid = b_program_enrolment.e_programid WHERE programlevel IN ('40','50','70','80','90') GROUP BY mainprogram ORDER BY totalenrollment DESC LIMIT 10");
		return $topten->result_array();
	}
	
	public function getcontacttotal()
	{
		$this->db->select('COUNT(*) as totalcontact');
		$this->db->from('contacts');
		return $this->db->get();
	}
	
	public function getinsttotal()
	{
		$this->db->select('COUNT(*) as totalinst');
		$this->db->from('a_institution_profile');
		return $this->db->get();
	}
	
	public function getactiveprograms()
	{
		$this->db->select('COUNT(*) AS programtotal');
		$this->db->from('b_program');
		return $this->db->get();
	}
	
	
	
	public function totalstrongly()
	{
		//$result = $this->db->get('contacts');
		$strongly = $this->db->query("SELECT COUNT(*) AS totalstrong FROM aces_form WHERE satisfied='Strongly Agree'");
		return $strongly;
		
		
	}
	public function totalsatisfied()
	{
		//$result = $this->db->get('contacts');
		$totalsatisfied = $this->db->query("SELECT COUNT(*) AS totalsatisfied FROM aces_form");
		return $totalsatisfied;
		
		
	}
	public function totalagree()
	{
		//$result = $this->db->get('contacts');
		$totalagree = $this->db->query("SELECT COUNT(*) AS totalagree FROM aces_form WHERE satisfied='Agree'");
		return $totalagree;
		
		
	}
	
	public function courteoussa()
	{
		//$result = $this->db->get('contacts');
		$totalstrong = $this->db->query("SELECT COUNT(*) AS totalstrong FROM aces_form WHERE courteous='Strongly Agree'");
		return $totalstrong;
		
		
	}
	
	public function courteousa()
	{
		//$result = $this->db->get('contacts');
		$totalagree = $this->db->query("SELECT COUNT(*) AS totalagree FROM aces_form WHERE courteous='Agree'");
		return $totalagree;
		
		
	}
	
	public function totalpermits()
	{
		//$result = $this->db->get('contacts');
		$totalpermits = $this->db->query("SELECT COUNT(*) AS permitstotal FROM permits_recognition");
		return $totalpermits;
		
		
	}
	
	
	public function discipline()
	{
		$discipline = $this->db->query("SELECT COUNT(*) as total, discipline FROM b_program WHERE discipline!='NONE' and programlevel IN ('40','50','60','70','80','90') GROUP BY discipline ORDER BY  discipline");
		return $discipline->result_array();
	}
	
	public function enrollmentperprovince()
	{
		$enrollmentperprovince = $this->db->query("SELECT SUM(newstudm+oldstudm+secondm+thirdm+fourthm+fifthm+sixthm+seventhm) AS totalmale,SUM(newstudf+oldstudf+secondf+thirdf+fourthf+fifthf+sixthf+seventhf) AS totalfemale,province1 FROM b_program LEFT JOIN a_institution_profile ON b_program.instcode = a_institution_profile.instcode LEFT JOIN b_program_enrolment ON b_program.programid = b_program_enrolment.e_programid WHERE programlevel IN ('40','50','60','70','80','90') GROUP BY a_institution_profile.province1");
		return $enrollmentperprovince->result_array();
	}
	
	public function get()
	{
		$result = $this->db->get('b_program');
		
		return $result->result_array();
	}
	
	
	public function allheimap()
	{
		$ref_fullpart = $this->db->query("SELECT instname,latitude,longtitude FROM a_institution_profile limit 1");
		$hei_map = $ref_fullpart->result_array();
		
		$map_details="";
		$map_details.="['Lat', 'Long', 'Name'],";
		foreach($hei_map as $heilocation):
			$map_details.="[";
			$map_details.=$heilocation['longtitude'];
			$map_details.=",";
			$map_details.=$heilocation['latitude'];
			$map_details.=",'";
			$map_details.=$heilocation['instname']."DMMMSU MLUC";
			$map_details.="'],";
			
		endforeach;
		
		return $map_details;
	}
	public function allheimap2($map_region)
	{
		
		//get all region list
		//$regions = $this->db->query("SELECT * from regions");
		//$region_result = $regions->result_array();
		//print_r($region_result);
		$locations = array();
		//foreach($region_result as $region_list):
		
			$dbname = $map_region;
			$this->db2 = $this->load->database($dbname, true);
			
			
			
			$ref_fullpart = $this->db2->query("SELECT instname,latitude,longtitude FROM a_institution_profile where hei_status='ACTIVE'");
			$result_sql = $ref_fullpart->result_array();
			
			
			foreach ($result_sql as $row) 
			{
			  
			  
			  $instname = preg_replace('/[^\w]/', ' ',  $row['instname']);
			  //str_replace(array( "\'","\r", "\n"), '', $instname);
			  $lat = (string)$row['latitude'];
			  $long = (string)$row['longtitude'];

			  $locations[] = "[" . $long .", " .$lat . ", '".$instname."']";
			}
			
			
		
		//endforeach;
		
		return implode(", ", $locations);
		
		
		
	}
	
}

?>