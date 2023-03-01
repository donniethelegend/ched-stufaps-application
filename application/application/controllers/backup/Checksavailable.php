<?php

class Checksavailable extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('checksavailable_model');
		$this->load->helper('form');
		$this->load->helper('url');
		 $this->data = array(
            'title' => 'CHECKS Available',
			'heiclass' => '',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => '',
			'programapplication' => '',
			'accounts' => '',
			'contacts' => '',
			'permits' => '',
			'scholarship' => 'active',
			'scholarslist' => '',
			'awardnumberclass' => '',
			'accreditedhei' => '',
			'scholarshipapplicant' => '',
			'paymentlist' => '',
			'voucherlist' => ''
			);
			
			
		$this->session;	
		$utype = $this->session->userdata('usertype');
		if($utype=='scholarship'){
			$this->data = array(
            'title' => 'CHECKS Available',
			'heiclass' => 'hidden',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => '',
			'programapplication' => '',
			'accounts' => 'hidden',
			'contacts' => 'hidden',
			'permits' => '',
			'scholarship' => 'active',
			'scholarslist' => '',
			'accreditedhei' => '',
			'scholarshipapplicant' => 'active',
			'paymentlist' => '',
			'voucherlist' => ''
			);
		}
		
		//javascript module
		$this->js = array(
            'jsfile' => 'checksavailable.js'
			);
		
		
		
	}
	
	public function index()
	{
		//$currentyear_array = $this->scholarshipapplicants_model->getyearapplied();
		//$currenty = $currentyear_array[0]['yearapplied'];
		//$currenttime = time();
		//$currentm = date('m',$currenttime);
		//$congdistrict ="All";
		
		$js = $this->js;
		
		$data = $this->data;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"CHECKS Available List") ;
		
		
		$checksavailable_list = array();
		$data['checksavailable_list'] = $checksavailable_list;
		
		//header('Location: scholarshipapplicants/filter/'.$currenty.'/'.$currentm.'/'.$congdistrict);
		/*
		$js = $this->js;
		
		$data = $this->data;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Applicants List") ;
		//$data['contact_list'] = $this->contacts_model->get();
		//$data['hei_list'] = $this->contacts_model->gethei();
		$data['applicants_list'] = $this->scholarshipapplicants_model->get();
		$data['hei_list'] = $this->scholarshipapplicants_model->gethei();
		$data['user_count'] = $this->scholarshipapplicants_model->getusercount();
		$data['yearapplied_list'] = $this->scholarshipapplicants_model->getyearapplied();
		
		
		//print_r($data['user_count']);
*/
		$this->load->view('inc/header_view');
		$this->load->view('scholarship/checksavailable_view',$data);
		$this->load->view('inc/footer_view');
		
	}
	
	public function search()
	{
		
		$js = $this->js;
		
		$data = $this->data;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"CHECKS Available List") ;
		
		$keyword = $this->input->post('keyword');
		/*$currentyear_array = $this->scholarshipapplicants_model->getyearapplied();
		$currenty = $currentyear_array[0]['yearapplied'];
		$currenttime = time();
		$currentm = date('m',$currenttime);
		
		$data['current_year_filter'] = $currenty;
		$data['current_month_filter'] = $currentm;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Applicants List") ;
		$data['year'] =$currenty ;
		$data['month'] =$currentm ;
		//$data['contact_list'] = $this->contacts_model->get();
		//$data['hei_list'] = $this->contacts_model->gethei();
		*/
		$data['checksavailable_list'] = $this->checksavailable_model->getsearch($keyword);
		//echo $keyword;
		//print_r($data['checksavailable_list']);
		
		/*
		$data['hei_list'] = $this->scholarshipapplicants_model->gethei();
		$data['courses_list'] = $this->scholarshipapplicants_model->getcourses();
		$data['user_count'] = $this->scholarshipapplicants_model->getusercount();
		$data['yearapplied_list'] = $this->scholarshipapplicants_model->getyearapplied();
		$data['city_municipality'] = $this->scholarshipapplicants_model->city_municipality();
		$data['pagelocation'] = "search";
		$data['congressionaldistrict'] = $this->scholarshipapplicants_model->congressionaldistrict();
		$data['current_cong_district'] = "All";
		*/
		//print_r($data['user_count']);

		$this->load->view('inc/header_view');
		$this->load->view('scholarship/checksavailable_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	
	public function editcheck(){
		
		$checkidnum = $this->input->post('checkidnum');
		$check_details = $this->checksavailable_model->getcheck($checkidnum);

		
		echo json_encode($check_details[0]);
		
	}
	
	
	public function filter($year,$month,$congdistrict)
	{
		
		$js = $this->js;
		
		$data = $this->data;
		$data['current_year_filter'] = $year;
		$data['current_month_filter'] = $month;
		$data['current_cong_district'] = urldecode($congdistrict);
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Applicants List") ;
		//$data['contact_list'] = $this->contacts_model->get();
		//$data['hei_list'] = $this->contacts_model->gethei();
		$data['applicants_list'] = $this->scholarshipapplicants_model->getfilteryear($year,$month,urldecode($congdistrict));
		$data['hei_list'] = $this->scholarshipapplicants_model->gethei();
		$data['courses_list'] = $this->scholarshipapplicants_model->getcourses();
		$data['user_count'] = $this->scholarshipapplicants_model->getusercount();
		$data['yearapplied_list'] = $this->scholarshipapplicants_model->getyearapplied();
		$data['city_municipality'] = $this->scholarshipapplicants_model->city_municipality();
		$data['congressionaldistrict'] = $this->scholarshipapplicants_model->congressionaldistrict();
		$data['pagelocation'] = "filter";
		
		
		//print_r($data['user_count']);

		$this->load->view('inc/header_view');
		$this->load->view('scholarship/scholarshipapplicants_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	
	
	
	
	public function profile($applicantid){
		
		$js = $this->js;
		$data = $this->data;
		$data['page'] = "institution";
		$data['hei_list'] = $this->scholarshipapplicants_model->gethei();
		$data['scholarapplicant_profile'] = $this->scholarshipapplicants_model->getprofile($applicantid);
		$data['applicantid'] = $applicantid;
		
		$base = base_url();
		$fileurl = $base."uploads/".$applicantid.".jpg";
		 $ch = curl_init($fileurl);    
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($code == 404){
            $data['status'] = "no";
			$data['fileurl'] = "";
        }else{
            $data['status'] = "yes";
			$data['fileurl'] = $fileurl;
        }
        curl_close($ch);
		
		//print_r($data['scholarapplicant_profile']);
		//$data['programs'] = $this->heidirectory_model->getprograms($instcode);

		$this->load->view('inc/header_view');
		$this->load->view('scholarship/scholarapplicantprofile_view',$data);
		$this->load->view('inc/footer_view',$js);

		
	}
	
	public function updateprofile(){
		
		
		//$this->load->library('session');
		//$this->session;
		//$uid = $this->session->userdata('uid');
		$applicantid = $this->input->post('applicantid');
		$lastname = $this->input->post('lastname');
		$firstname = $this->input->post('firstname');
		$middlename = $this->input->post('middlename');
		$dateofbirth = $this->input->post('dateofbirth');
		$placeofbirth = $this->input->post('placeofbirth');
		$gender = $this->input->post('gender');
		$civilstatus = $this->input->post('civilstatus');
		$citizenship = $this->input->post('citizenship');
		$contactno = $this->input->post('contactno');
		$email = $this->input->post('email');
		$extension = $this->input->post('extension');
		$barangay = $this->input->post('barangay');
		$towncity = $this->input->post('towncity');
		$province = $this->input->post('province');
		$zipcode = $this->input->post('zipcode');
		$congressionaldistrict = $this->input->post('congressionaldistrict');
		$heicode = $this->input->post('heicode');
		$course = $this->input->post('course');
		$father = $this->input->post('father');
		$father_m = $this->input->post('father_m');
		$father_l = $this->input->post('father_l');
		$foccupation = $this->input->post('foccupation');
		$mother = $this->input->post('mother');
		$mother_m = $this->input->post('mother_m');
		$mother_l = $this->input->post('mother_l');
		$moccupation = $this->input->post('moccupation');
		$siblingno = $this->input->post('siblingno');
		$disability = $this->input->post('disability');
		$yearofapplication = $this->input->post('yearofapplication');
		$year_level = $this->input->post('year_level');
		$average_grade = $this->input->post('average_grade');
		$income = $this->input->post('income');
		$type = $this->input->post('type');
		$hsgraduated = $this->input->post('hsgraduated');
		$fstatus = $this->input->post('fstatus');
		$mstatus = $this->input->post('mstatus');
		$dswd4p = $this->input->post('dswd4p');
		$datereceived = $this->input->post('datereceived');
		$lrn_no = $this->input->post('lrn_no');
		
		$this->scholarshipapplicants_model->updateprofile($applicantid,$lastname,$firstname,$middlename,$dateofbirth,$placeofbirth,$gender,$civilstatus,$citizenship,$contactno,$email,$extension,$barangay,$towncity,$province,$zipcode,$congressionaldistrict,$heicode,$course,$father,$foccupation,$mother,$moccupation,$siblingno,$disability,$yearofapplication,$year_level,$average_grade,$income,$type,$hsgraduated,$fstatus,$mstatus,$dswd4p,$datereceived,$father_m,$father_l,$mother_m,$mother_l,$lrn_no);
		
	}
	
	public function image_upload() { 
		 $fileid = $this->input->post('fileid');
		 //$newfilename = $fileid."jpg";
         $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
         $config['max_size']      = 2048; 
         $config['max_width']     = 2048; 
         $config['max_height']    = 2048;  
         $config['overwrite']    = true;  
         $config['file_name']    = $fileid.".jpg";  
         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('assetimage')) {
            $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('upload_form', $error); 
			//show_404();
         }
			
         else { 
            $data = array('upload_data' => $this->upload->data()); 
            //$this->load->view('upload_success', $data); 
			header('Location:profile/'.$fileid);
         } 
      }  
	
	public function checkduplicate()
	{
		

		$lastname = $this->input->post('lastname');
		$firstname = $this->input->post('firstname');
		$middlename = $this->input->post('middlename');
		$yearofapplication = $this->input->post('yearofapplication');
		
		
		$count = $this->scholarshipapplicants_model->checkduplicate($lastname,$firstname,$middlename,$yearofapplication);
		echo $count;
		
	}
	
	public function listyearapplied()
	{
		

		$lastname = $this->input->post('lastname');
		$firstname = $this->input->post('firstname');
		$middlename = $this->input->post('middlename');
		
		
		
		$count = $this->scholarshipapplicants_model->listyearapplied($lastname,$firstname,$middlename);
		echo json_encode($count);
		
	}
	
	public function applicantgrantee()
	{
		

		$applicantid = $this->input->post('applicantid');
		//echo $applicantid;
		
		$count = $this->scholarshipapplicants_model->applicantgrantee($applicantid);
		echo $count;
		
	}
	
	public function getcong()
	{
		

		$congid = $this->input->post('congid');
		
		$congid_result = $this->scholarshipapplicants_model->congid($congid);
		echo json_encode($congid_result);
		
	}
	
	public function grantapplicant(){
		$uid = $this->session->userdata('uid');
		$applicantid = $this->input->post('applicantid');
		
		$copyresult = $this->scholarshipapplicants_model->grantapplicant($applicantid,$uid);
		
		
	}
	
	
	
	

	
	
}