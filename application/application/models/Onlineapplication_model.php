<?php


class Onlineapplication_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		//$this->load->library('session');
		//$this->session;
		//$dbname = $this->session->userdata('regioncode');
		//$this->db = $this->load->database($dbname, true);
		$this->db = $this->load->database("default", true);
                $this->session;
	}
	
	
	public function getApplication_otherfiles($id)
	{
		//$result = $this->db->get('contacts');
		$sqlquery = $this->db->query("SELECT * FROM `scholarship_otherfiles` WHERE applicationid = '$id' ");
		$sql_result = $sqlquery->result_array();
		return $sql_result[0];
		
		
	}
	public function getApplication_details($id)
	{
		//$result = $this->db->get('contacts');
		$sqlquery = $this->db->query("SELECT *  FROM scholarship_applicant LEFT JOIN `scholarship_attached_requirement`ON `scholarship_attached_requirement`.`id` = `scholarship_applicant`.`applicantid` 
 WHERE applicantid='$id' ");
		$sql_result = $sqlquery->result_array();
		return $sql_result[0];
		
		
	}
	public function onlineapplicationstatus()
	{
		//$result = $this->db->get('contacts');
		$sqlquery = $this->db->query("SELECT * FROM settings where settings_name='online_application'");
		$sql_result = $sqlquery->result_array();
		return $sql_result[0];
		
		
	}
        public function verfyMyporttal($username,$loginpassword){

		
		//$result = $this->db->get('contacts');
		//echo "SELECT count(*) as noofuser FROM users WHERE username='$username' AND password =md5('$loginpassword')";
		
		$noofuser = $this->db->query("SELECT COUNT(*) AS `count`
 FROM scholarship_applicant 
 
 WHERE applicantid='$username' AND contactno='$loginpassword'");
		$usercount = $noofuser->result_array();
		$count = $usercount[0]['count'];
		
		
		if($count ==0){
			header('Location:'. base_url());
		}else{
			
			$userinfo = $this->db->query("SELECT *
 FROM scholarship_applicant 
 
 WHERE applicantid='$username' AND contactno='$loginpassword'");
			$info = $userinfo->result_array();
			//$_SESSION['username'] = $info[0]['username'];
			//$_SESSION['userid'] = $info[0]['uid'];
			//$_SESSION['name'] = $info[0]['name'];
			
			$this->session->set_userdata('applicantid', $info[0]['applicantid']);
			$this->session->set_userdata('name', ($info[0]['firstname']." ".$info[0]['lastname']));
			$this->session->set_userdata('contact', $info[0]['contactno']);
			
			
			
			
			//echo $this->session->userdata('name');
			header('Location:'. base_url().'myportal');
		}
		//echo intval($permitarray[0]['permitno']);
	
	

	}

	
	
	public function uploadpath_otherfiles($data)
        {
            
             $this->db->insert_batch('scholarship_otherfiles', $data); 
            
            if($this->db->affected_rows() > 0)
		{
            return true;
        }
        else{
            
            return false;
        }
          
            
        }
	public function insertSignature($data)
        {
            
            
            $data = array('signature' => $data);
            $id = $_SESSION['applicantid'];
            echo $id;
            $this->db->where('id', $id);
            $this->db->update('scholarship_attached_requirement', $data);
            
            
          
            
            if($this->db->affected_rows() > 0)
		{
            return true;
        }
        else{
            
            return false;
        }
          
            
        }
	public function upload_attachment($id)
	{
		
            $now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Manila'));
		$now_timestamp = $now->format('Y-m-d H:i:s');
		$current_year = $now->format('Y');
		$current_month = $now->format('m');
                
                
                   $path_year   = './uploads/requirements/'.$current_year.'/'.$current_month."/";
            
		
		if(!is_dir($path_year)){                                      
                    mkdir($path_year, 0777, true);
                }
                 
                
                $config['upload_path'] = $path_year;
                $config['allowed_types']  = 'jpg|png|pdf';
                
             $this->load->library('upload', $config);
             
       
            $config['file_name'] = '2x2picture'. md5($now->format('Y-m-d H:i:s')). $id ;
            $this->upload->initialize($config);
            $elementname='photograph';
              if ( ! $this->upload->do_upload($elementname)){
                  $error[]= array(
                      'name'=> $elementname,
                      'error'=> $this->upload->display_errors(),
                      'path'=>null);
              }else{
                  $result[]= array(
                      'name'=> $elementname,
                      'error'=> false, 
                      'path'=>$path_year.$config['file_name']);
             
                  


                   $data["picture22"] = $path_year.$this->upload->data('file_name');
                     
              
              
              }
              
              
            $config['file_name'] = 'BirthCertificate'. md5($now->format('Y-m-d H:i:s')).'-'. $id ;
            $this->upload->initialize($config);
            $elementname='birthcertificate';
              if ( ! $this->upload->do_upload($elementname)){
                  $error[]= array(
                      'name'=> $elementname,
                      'error'=> $this->upload->display_errors(),
                      'path'=>null);
              }else{
                  $result[]= array(
                      'name'=> $elementname,
                      'error'=> false, 
                      'path'=>$path_year.$config['file_name']);
                  

                     $data["birth_certificate"] = $path_year.$this->upload->data('file_name');
              }
              
              
            $config['file_name'] = 'PWD_ID'. md5($now->format('Y-m-d H:i:s')).'-'. $id  ;
            $this->upload->initialize($config);
            $elementname='PWD_id';
              if ( ! $this->upload->do_upload($elementname)){
                  $error[]= array(
                      'name'=> $elementname,
                      'error'=> $this->upload->display_errors(),
                      'path'=>null);
              }else{
                  $result[]= array(
                      'name'=> $elementname,
                      'error'=> false, 
                      'path'=>$path_year.$config['file_name']);
                

                   $data["pwd_id"] = $path_year.$this->upload->data('file_name');
              }
              
              
            $config['file_name'] = 'AcademicRequirement'. md5($now->format('Y-m-d H:i:s')).'-'.$id ;
            $this->upload->initialize($config);
            $elementname='acad_requirement';
              if ( ! $this->upload->do_upload($elementname)){
                  $error[]= array(
                      'name'=> $elementname,
                      'error'=> $this->upload->display_errors(),
                      'path'=>null);
              }else{
                  $result[]= array(
                      'name'=> $elementname,
                      'error'=> false, 
                      'path'=>$path_year.$config['file_name']);
                

                     $data["academic_requirement"] = $path_year.$this->upload->data('file_name');
              }
            $config['file_name'] = 'IncomeRequirement'. md5($now->format('Y-m-d H:i:s')).'-'.$id ;
            $this->upload->initialize($config);
            $elementname='income_req';
              if ( ! $this->upload->do_upload($elementname)){
                  $error[]= array(
                      'name'=> $elementname,
                      'error'=> $this->upload->display_errors(),
                      'path'=>null);
              }else{
                  $result[]= array(
                      'name'=> $elementname,
                      'error'=> false, 
                      'path'=>$path_year.$config['file_name']);
                 

       $data["income_requirement"] = $path_year.$this->upload->data('file_name');
              }
              
              
              $data["id"] = $id;
           
              if(!$error){
              $this->db->insert('scholarship_attached_requirement', $data); 
		
	if($this->db->affected_rows() > 0)
		{
            return true;
        }
        else{
            return $this->db->_error_message();
        }
        
        }
        else{
            
            
            return $error;
        }
        
        
          
           
          
              
	}
	
	public function saveapplication($formsubmitted)
	{
		
		
		
		
		
		
		//print_r($formsubmitted);
		
		$this->db->query("SET SESSION time_zone = '+8:00';");
		$this->load->helper('date');
		$now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Manila'));
		$now_timestamp = $now->format('Y-m-d H:i:s');
		$current_year = $now->format('Y');
		
		$dob = $formsubmitted['birth-year']."-".$formsubmitted['birth-month']."-".$formsubmitted['birth-day'];
		
		$data = array(
		   'time_encoded' => $now_timestamp ,
		   'lastname' => $formsubmitted['lname'] ,
		   'firstname' => $formsubmitted['fname'] ,
		   'middlename' => $formsubmitted['mname'] ,
		   'extension' => $formsubmitted['extension'] ,
		   'gender' => $formsubmitted['gender'] ,
		   'barangay' => $formsubmitted['barangay'] ,
		   'towncity' => $formsubmitted['towncityname'] ,
		   'province' => $formsubmitted['province'] ,
		   'zipcode' => $formsubmitted['zipcode'] ,
		   'dateofbirth' => $dob ,
		   'placeofbirth' => $formsubmitted['placeofbirth'] ,
		   'civilstatus' => $formsubmitted['civil_status'] ,
		   'citizenship' => $formsubmitted['citizenship'] ,
		   'contactno' => $formsubmitted['mobile_number'] ,
		   'email' => $formsubmitted['email'] ,
		   'pr_barangay' => $formsubmitted['pr_barangay'] ,
		   'pr_towncity' => $formsubmitted['pr_towncity'] ,
		   'pr_province' => $formsubmitted['pr_province'] ,
		   'pr_zipcode' => $formsubmitted['pr_zip_code'] ,
		   'hsgraduated' => $formsubmitted['hsgraduated'] ,
		   'hsgraduated_address' => $formsubmitted['hsgraduated_address'] ,
		   'hsgraduated_sector' => $formsubmitted['hsgraduated_sector'] ,
		   'year_level' => $formsubmitted['year_level'] ,
		   'disability' => $formsubmitted['disability'] ,
		   'ip_affiliation' => $formsubmitted['ip_affiliation'] ,
		   'fstatus' => $formsubmitted['fstatus'] ,
		   'father' => $formsubmitted['father'] ,
		   'father_m' => $formsubmitted['father_m'] ,
		   'father_l' => $formsubmitted['father_l'] ,
		   'f_address' => $formsubmitted['f_address'] ,
		   'f_contactno' => $formsubmitted['f_contactno'] ,
		   'foccupation' => $formsubmitted['foccupation'] ,
		   'f_employer' => $formsubmitted['f_employer'] ,
		   'f_employer_address' => $formsubmitted['f_employer_address'] ,
		   'f_highesteduc' => $formsubmitted['f_highesteduc'] ,
		   'mstatus' => $formsubmitted['mstatus'] ,
		   'mother' => $formsubmitted['mother'] ,
		   'mother_m' => $formsubmitted['mother_m'] ,
		   'mother_l' => $formsubmitted['mother_l'] ,
		   'm_address' => $formsubmitted['m_address'] ,
		   'm_contactno' => $formsubmitted['m_contactno'] ,
		   'moccupation' => $formsubmitted['moccupation'] ,
		   'm_employer' => $formsubmitted['m_employer'] ,
		   'm_employer_address' => $formsubmitted['m_employer_address'] ,
		   'm_highesteduc' => $formsubmitted['m_highesteduc'] ,
		   'income' => $formsubmitted['income'] ,
		   'siblingno' => $formsubmitted['siblingno'] ,
		   'dswd4p' => $formsubmitted['dswd4p'] ,
		   'hei' => $formsubmitted['hei'] ,
		   'hei_address' => $formsubmitted['hei_address'] ,
		   'hei_type' => $formsubmitted['hei_type'] ,
		   'yearapplied' => $formsubmitted['yearapplied'] ,
		   'addedbyuid' => 0,
		   'course' => $formsubmitted['course'],
		   'preferred_mailing' => $formsubmitted['preferred_mailing'],
		   'other_assistance' => $formsubmitted['other_assistance'],
		   'othertype1' => $formsubmitted['othertype1'],
		   'othertype1name' => $formsubmitted['othertype1_name'],
		   'othertype2' => $formsubmitted['othertype2'],
		   'othertype2name' => $formsubmitted['othertype2_name'],
		   'guard_fname' => $formsubmitted['guard_fname'],
		   'guard_mname' => $formsubmitted['guard_mname'],
		   'guard_lname' => $formsubmitted['guard_lname'],
		   'guard_address' => $formsubmitted['guard_address'],
		   'guard_contact' => $formsubmitted['guard_contact'],
		   'guard_occupation' => $formsubmitted['guard_occupation'],
		   'guard_employer' => $formsubmitted['guard_employer'],
		   'guard_empaddress' => $formsubmitted['guard_empaddress'],
		   'guard_highesteduc' => $formsubmitted['guard_highesteduc'],
		   'maiden_name' => $formsubmitted['maiden_name'],
		   'congressionaldistrict' => $formsubmitted['congressionaldistrict'],
		   'solo_parent' => $formsubmitted['solo_parent'],
		   'lrn_no' => $formsubmitted['lrn_no'],
		   'app_pwd' => $formsubmitted['app_pwd'],
		   'app_ipgroup' => $formsubmitted['app_ipgroup'],
		   'yearapplied' => $current_year
		   
		   
		   
		);
		//return $data;
		
		$this->db->insert('scholarship_applicant', $data); 
		
		if($this->db->affected_rows() > 0)
		{
			// Code here after successful insert
			//return true; // to the controller
			return $this->db->insert_id();
			
		}
		
		/*
		
		
		$data = array(
		   'settings_name' => "test" ,
		   'settings_value' => "test" ,
		   
		   
		);
		$this->db->insert('settings', $data); 
		
		/*
		
		//for online time on saving
		
		
		
		$this->db->select('*');
		$this->db->from('settings');
		//$this->db->where('hei_status','ACTIVE');
		$result = $this->db->get();
		return $result->result_array();
			
		$data = array(
	   'time_encoded' => $now_timestamp ,
	   'lname' => $formsubmitted['lastname'] ,
	   'fname' => $formsubmitted['firstname'] ,
	   'mname' => $formsubmitted['mname']
		   
		);
		$this->db->insert('scholarship_applicant', $data); 
		
		
		
		//$dbcav_cert_num = $this->generatenumber($formsubmitted['studtype']);
		
		//insert application form
		$dob = $formsubmitted['birth-year']."-".$formsubmitted['birth-month']."-".$formsubmitted['birth-day'];
		
		
		
		//print_r($data);

		/*
		$this->db->insert('scholarship_applicant', $data); 
		/*
		if($this->db->affected_rows() > 0)
		{
			// Code here after successful insert
			//return true; // to the controller
			return $this->db->insert_id();
			
		}*/
		
		/*
		
		
		$data = array(
		   'time_encoded' => $now_timestamp ,
		   'lname' => $formsubmitted['lastname'] ,
		   'fname' => $formsubmitted['firstname'] ,
		   'mname' => $formsubmitted['mname'] ,
		   'extension' => $formsubmitted['extension'] ,
		   'gender' => $formsubmitted['gender'] ,
		   'barangay' => $formsubmitted['barangay'] ,
		   'towncity' => $formsubmitted['towncity'] ,
		   'province' => $formsubmitted['province'] ,
		   'zipcode' => $formsubmitted['zipcode'] ,
		   'dateofbirth' => $dob ,
		   'placeofbirth' => $formsubmitted['placeofbirth'] ,
		   'civilstatus' => $formsubmitted['civil_status'] ,
		   'citizenship' => $formsubmitted['citizenship'] ,
		   'contactno' => $formsubmitted['mobile_number'] ,
		   'email' => $formsubmitted['email'] ,
		   'pr_barangay' => $formsubmitted['pr_barangay'] ,
		   'pr_towncity' => $formsubmitted['pr_towncity'] ,
		   'pr_province' => $formsubmitted['pr_province'] ,
		   'pr_zip_code' => $formsubmitted['pr_zip_code'] ,
		   'hsgraduated' => $formsubmitted['hsgraduated'] ,
		   'hsgraduated_address' => $formsubmitted['hsgraduated_address'] ,
		   'hsgraduated_sector' => $formsubmitted['hsgraduated_sector'] ,
		   'year_level' => $formsubmitted['year_level'] ,
		   'disability' => $formsubmitted['disability'] ,
		   'ip_affiliation' => $formsubmitted['ip_affiliation'] ,
		   'fstatus' => $formsubmitted['fstatus'] ,
		   'father' => $formsubmitted['father'] ,
		   'father_m' => $formsubmitted['father_m'] ,
		   'father_l' => $formsubmitted['father_l'] ,
		   'f_address' => $formsubmitted['f_address'] ,
		   'f_contactno' => $formsubmitted['f_contactno'] ,
		   'foccupation' => $formsubmitted['foccupation'] ,
		   'f_employer' => $formsubmitted['f_employer'] ,
		   'f_employer_address' => $formsubmitted['f_employer_address'] ,
		   'f_highesteduc' => $formsubmitted['f_highesteduc'] ,
		   'mstatus' => $formsubmitted['mstatus'] ,
		   'mother' => $formsubmitted['mother'] ,
		   'mother_m' => $formsubmitted['mother_m'] ,
		   'mother_l' => $formsubmitted['mother_l'] ,
		   'm_address' => $formsubmitted['m_address'] ,
		   'm_contactno' => $formsubmitted['m_contactno'] ,
		   'moccupation' => $formsubmitted['moccupation'] ,
		   'm_employer' => $formsubmitted['m_employer'] ,
		   'm_employer_address' => $formsubmitted['m_employer_address'] ,
		   'm_highesteduc' => $formsubmitted['m_highesteduc'] ,
		   'income' => $formsubmitted['income'] ,
		   'siblingno' => $formsubmitted['siblingno'] ,
		   'dswd4p' => $formsubmitted['dswd4p'] ,
		   'hei' => $formsubmitted['hei'] ,
		   'hei_address' => $formsubmitted['hei_address'] ,
		   'hei_type' => $formsubmitted['hei_type'] ,
		   'yearapplied' => $formsubmitted['yearapplied'] ,
		   'addedbyuid' => "0"  
		   
		); */
		
		
		
	}
	
	
	public function city_municipality()
	{
		//$result = $this->db->get('contacts');
		$sqlquery = $this->db->query("SELECT * FROM scholarship_cong_district");
		return $sqlquery->result_array();
		
		
	}
	public function city_municipality_present()
	{
		//$result = $this->db->get('contacts');
		$sqlquery = $this->db->query("SELECT * FROM scholarship_national_zipcode");
		return $sqlquery->result_array();
		
		
	}
	
	public function getcourse()
	{
		//$result = $this->db->get('contacts');
		$sqlquery = $this->db->query("SELECT * FROM scholarship_course");
		return $sqlquery->result_array();
		
		
	}
	
	public function congid($congid)
	{
		//$result = $this->db->get('contacts');
		$sqlquery = $this->db->query("SELECT * FROM scholarship_cong_district where congid=$congid");
		$sql_result = $sqlquery->result_array();
		return $sql_result[0];
		
		
	}
	
	public function zid($zid)
	{
		//$result = $this->db->get('contacts');
		$sqlquery = $this->db->query("SELECT * FROM scholarship_national_zipcode where zid=$zid");
		$sql_result = $sqlquery->result_array();
		return $sql_result[0];
		
		
	}

	public function onlinedetails($applicationid,$mobileno)
	{
		//$result = $this->db->get('contacts');
		$applicationid_clean = trim($applicationid);
		//echo "SELECT * FROM scholarship_applicant LEFT JOIN scholarship_hei ON scholarship_applicant.hei = scholarship_hei.heicode WHERE applicantid=".$this->db->escape($applicationid_clean)." and contactno=".$this->db->escape($mobileno)."";
		$sqlquery = $this->db->query("SELECT *,"
                        . "(SELECT scholarship_attached_requirement.`picture22` FROM scholarship_attached_requirement WHERE scholarship_attached_requirement.`id` = scholarship_applicant.`applicantid`) AS `picby2`,"
                        . "(SELECT scholarship_attached_requirement.`signature` FROM scholarship_attached_requirement WHERE scholarship_attached_requirement.`id` = scholarship_applicant.`applicantid`) AS `signature`"
                        . " FROM scholarship_applicant LEFT JOIN scholarship_hei ON scholarship_applicant.hei = scholarship_hei.heicode WHERE applicantid=".$this->db->escape($applicationid_clean)." and contactno=".$this->db->escape($mobileno)."");
		

		
		$sql_result = $sqlquery->result_array();
		return $sql_result[0];
		
		
	}

	
	
	
	public function gethei2($heicode)
	{
		//$heicode = "03085c";
		//$result = $this->db->get('contacts');
		$heilist = $this->db->query("SELECT * FROM scholarship_hei where heicode=".$this->db->escape($heicode)."");
		$sqlresult =  $heilist->result_array();
		return $sqlresult[0];
		
		
	}
	
	
	public function get()
	{
		//$result = $this->db->get('contacts');
		$applicants = $this->db->query("select * from scholarship_applicant limit 10");
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
		$heilist = $this->db->query("SELECT * FROM scholarship_hei order by heiname asc");
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
	
	public function applicant_checkduplicate($formsubmitted)
	{
		//$result = $this->db->get('contacts');
		$dob = $formsubmitted['birth-year']."-".$formsubmitted['birth-month']."-".$formsubmitted['birth-day'];
		$current_year = "2021";
		$sql = $this->db->query("select count(*) as duplicatecount from scholarship_applicant WHERE lastname=upper(".$this->db->escape($formsubmitted['lname']).") AND firstname=upper(".$this->db->escape($formsubmitted['fname']).") AND middlename=upper(".$this->db->escape($formsubmitted['mname']).") AND dateofbirth=".$this->db->escape($dob)." AND yearapplied=".$this->db->escape($current_year)."");
		$sqlresult = $sql->result_array();
		return $sqlresult[0]['duplicatecount'];
		
	}
	
}

?>