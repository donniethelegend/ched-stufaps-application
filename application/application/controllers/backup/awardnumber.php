<?php

class Awardnumber extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('awardnumber_model');
		 $this->data = array(
            'title' => 'Scholars List',
			'heiclass' => '',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => '',
			'programapplication' => '',
			'accounts' => '',
			'contacts' => '',
			'permits' => '',
			'scholarship' => 'active',
			'awardnumberclass' => 'active',
			'scholarslist' => '',
			'accreditedhei' => '',
			'scholarshipapplicant' => '',
			'paymentlist' => '',
			'voucherlist' => ''
			);
		$this->js = array(
              'jsfile' => 'awardnumber.js'
			);
		$this->session;	
		$utype = $this->session->userdata('usertype');
		if($utype=='scholarship'){
			$this->data = array(
            'title' => 'Scholars List',
			'heiclass' => 'hidden',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => '',
			'programapplication' => '',
			'accounts' => 'hidden',
			'contacts' => 'hidden',
			'permits' => '',
			'scholarship' => 'active',
			'scholarslist' => 'active',
			'accreditedhei' => '',
			'scholarshipapplicant' => '',
			'paymentlist' => '',
			'voucherlist' => ''
			);
		}
	}
	
	public function index()
	{
		
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		//$data['details'] =array('instname'=>"Students List") ;
		//$data['contact_list'] = $this->contacts_model->get();
		$data['typecode_list'] = $this->awardnumber_model->gettypecode();
		$data['award_status'] = $this->awardnumber_model->getawardnumber_status();
		
		//print_r($data['details']);
		
		$typecodefilter = $this->input->post('typecodefilter');
		$awardstatus = $this->input->post('awardstatus');
		$keyword = $this->input->post('keyword');
		
		if($keyword !=""){
			
			$data['awardnumber_list'] = $this->awardnumber_model->getfilter_awardnumber($keyword);
			$data['details'] =array('instname'=>"$keyword") ;
			$data['post_awardstatus'] = null;
			$data['post_typecodefilter'] = null;
			
		}else{
			//if filter using dropdown
			if($typecodefilter==null && $awardstatus==null){
				$data['awardnumber_list'] =array();
				$data['details'] =array('instname'=>"Students List : Active; All") ;
				$data['post_awardstatus'] = "NONE";
				$data['post_typecodefilter'] = "NONE";
			}else{
				
				if($typecodefilter==null){
					$typecodefilter="All";
				}
				if($awardstatus==null){
					$typecodefilter="All";
				}
				
				$data['awardnumber_list'] = $this->awardnumber_model->getfilter($typecodefilter,$awardstatus);
				$data['details'] =array('instname'=>"Students List : $awardstatus; $typecodefilter") ;
				$data['post_awardstatus'] = $awardstatus;
				$data['post_typecodefilter'] = $typecodefilter;
			}
			
		}
				
			
			
		$data['grantee_unawarded'] = $this->awardnumber_model->getunawarded();
		
		$this->load->view('inc/header_view');
		$this->load->view('scholarship/awardnumber_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	public function institution($instcode){
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "institution";
		$data['details'] = $this->heidirectory_model->getinstname($instcode)->row();
		
		//if($data['details']->result=='0'){
			//echo 'none';
		//}else{
			$data['programs'] = $this->heidirectory_model->getprograms($instcode);
			$data['deans'] = $this->heidirectory_model->getdeans($instcode);
			$data['formernames'] = $this->heidirectory_model->getformernames($instcode);
			
			
			//$data['subnavtitle'] = $data['instname'];
			//$data['heidirectory'] = $result->result();
			
			$this->load->view('inc/header_view');
			$this->load->view('heidirectory/heidirectorydetails_view',$data);
			$this->load->view('heidirectory/mapheader_view');
			$this->load->view('inc/footer_view',$js);
			//print_r($data);
		//}
		
	}
	
	
	
	public function savesinglegrantee(){
		
		
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('uid');
		$lastname = strtoupper($this->input->post('lastname'));
		$firstname = strtoupper($this->input->post('firstname'));
		$middlename = strtoupper($this->input->post('middlename'));
		$dateofbirth = $this->input->post('dateofbirth');
		$placeofbirth = $this->input->post('placeofbirth');
		$gender = $this->input->post('gender');
		$civilstatus = $this->input->post('civilstatus');
		$citizenship = $this->input->post('citizenship');
		$contactno = $this->input->post('contactno');
		$email = $this->input->post('email');
		$extension = strtoupper($this->input->post('extension'));
		$barangay = $this->input->post('barangay');
		$towncity = $this->input->post('towncity');
		$province = $this->input->post('province');
		$zipcode = $this->input->post('zipcode');
		$congressionaldistrict = $this->input->post('congressionaldistrict');
		$heicode = $this->input->post('heicode');
		$course = $this->input->post('course');
		$father = strtoupper($this->input->post('father'));
		$foccupation = $this->input->post('foccupation');
		$mother = strtoupper($this->input->post('mother'));
		$moccupation = $this->input->post('moccupation');
		$siblingno = $this->input->post('siblingno');
		$disability = $this->input->post('disability');
		$yearofapplication = $this->input->post('yearofapplication');
		$year_level = $this->input->post('year_level');
		$average_grade = $this->input->post('average_grade');
		$income = $this->input->post('income');
		$type = $this->input->post('type');
		$hsgraduated = $this->input->post('hsgraduated');
		
		$sql = "INSERT INTO scholarship_studentprofile(lastname,firstname,middlename,extension,gender,barangay,towncity,province,zipcode,dateofbirth,placeofbirth,civilstatus,citizenship,congressionaldistrict,hei,course,contactno,email,father,foccupation,mother,moccupation,siblingno,disability,yearapplied,addedbyuid,year_level,average_grade,income,type,hsgraduated) VALUES (".$this->db->escape($lastname).", ".$this->db->escape($firstname).", ".$this->db->escape($middlename).", ".$this->db->escape($extension).", ".$this->db->escape($gender).", ".$this->db->escape($barangay).", ".$this->db->escape($towncity).", ".$this->db->escape($province).", ".$this->db->escape($zipcode).", ".$this->db->escape($dateofbirth).", ".$this->db->escape($placeofbirth).", ".$this->db->escape($civilstatus).", ".$this->db->escape($citizenship).", ".$this->db->escape($congressionaldistrict).", ".$this->db->escape($heicode).", ".$this->db->escape($course).", ".$this->db->escape($contactno).", ".$this->db->escape($email).", ".$this->db->escape($father).", ".$this->db->escape($foccupation).", ".$this->db->escape($mother).", ".$this->db->escape($moccupation).", ".$this->db->escape($siblingno).", ".$this->db->escape($disability).", ".$this->db->escape($yearofapplication).", ".$this->db->escape($uid).", ".$this->db->escape($year_level).", ".$this->db->escape($average_grade).", ".$this->db->escape($income).", ".$this->db->escape($type).", ".$this->db->escape($hsgraduated).")";
		$this->db->query($sql);
		//echo $sql;
		$sqlselect = $this->db->query("SELECT MAX(scholarid) AS lastid FROM scholarship_studentprofile");
		$lastidinserted = $sqlselect->result_array();
		//echo json_encode($lastidinserted[0]);
		$currentid = $lastidinserted[0]['lastid'];
		echo $currentid;
		
		//echo $this->db->affected_rows();
		
	}

	
	
	public function getdetails(){
		
		
		$awardid = $this->input->post('awardid');
		$result = $this->awardnumber_model->getdetails($awardid);
		
		echo json_encode($result);
		
		
	}
	
	public function updateawardnumber(){
		
		$awardid = $this->input->post('awardid');
		$awardnumber = $this->input->post('awardnumber');
		$award_status = $this->input->post('award_status');
		$scholarid = $this->input->post('scholarid');
		$grantee_status = $this->input->post('grantee_status');
		$award_remarks = $this->input->post('award_remarks');

		
		$result = $this->awardnumber_model->updateawardnumber($awardid,$awardnumber,$award_status,$scholarid,$grantee_status,$award_remarks);
		
		echo $result;
		
	}
	
	public function saveawardnumber(){
		
		$particular = $this->input->post('particular');
		$stypecode = $this->input->post('stypecode');
		$prefix = $this->input->post('prefix');
		$middle = $this->input->post('middle');
		$suffix = $this->input->post('suffix');
		$award_count = $this->input->post('award_count');
		$awardslot_year = $this->input->post('awardslot_year');
		
		echo $award_count;
		$result = $this->awardnumber_model->saveawardnumber($particular,$stypecode,$prefix,$middle,$suffix,$award_count,$awardslot_year);
		
		//echo $result;
		
	}
	
	
	public function assignawardnumber(){
		
		$assign_awardid = $this->input->post('assign_awardid');
		$assign_scholarid = $this->input->post('assign_scholarid');
		$assign_remarks = $this->input->post('assign_remarks');
		
		
		$result = $this->awardnumber_model->assignawardnumber($assign_awardid,$assign_scholarid,$assign_remarks);
		
		echo $result;
		
	}
	
	
}