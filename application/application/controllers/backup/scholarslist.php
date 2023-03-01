<?php

class Scholarslist extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('scholarship_model');
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
			'awardnumberclass' => '',
			'scholarslist' => 'active',
			'accreditedhei' => '',
			'scholarshipapplicant' => '',
			'paymentlist' => '',
			'voucherlist' => ''
			);
		$this->js = array(
              'jsfile' => 'grantee.js'
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
		
		$data['hei_list'] = $this->scholarship_model->hei_list();
		$data['grantee_status'] = $this->scholarship_model->getgrantee_status();
		$data['congressional_district'] = $this->scholarship_model->congressional_district();
		
		$statusfilter = $this->input->post('statusfilter');
		$cong_district = $this->input->post('cong_district');
		$keyword = $this->input->post('keyword');
		
				
			if($statusfilter==null && $cong_district==null){
				$data['scholars_list'] = $this->scholarship_model->get("NONE","NONE");
				$data['details'] =array('instname'=>"Students List : NONE; NONE") ;
				$data['post_statusfilter'] = "NONE";
				$data['post_cong_district'] = "NONE";
				$data['keyword'] = "";
			}else{
				$data['scholars_list'] = $this->scholarship_model->get($statusfilter,$cong_district);
				$data['details'] =array('instname'=>"Students List : $statusfilter; $cong_district") ;
				$data['post_statusfilter'] = $statusfilter;
				$data['post_cong_district'] = $cong_district;
				$data['keyword'] = "";
			}
			
			if($keyword!=null){
				$data['scholars_list'] = $this->scholarship_model->getkeyword($keyword);
				$data['details'] =array('instname'=>"Students List") ;
				$data['post_statusfilter'] = "";
				$data['post_cong_district'] = "";
				$data['keyword'] = $keyword;
			}
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('scholarship/scholarslist_view',$data);
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

	public function deletegrantee(){
		$granteeid = $this->input->post('granteeid');
		$this->db->delete('scholarship_studentprofile', array('scholarid' => $granteeid));
		
		
	}
	
	
}