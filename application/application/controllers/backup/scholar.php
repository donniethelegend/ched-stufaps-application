<?php

class Scholar extends CI_Controller
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
			'scholarslist' => 'active',
			'awardnumberclass' => '',
			'accreditedhei' => '',
			'scholarshipapplicant' => '',
			'paymentlist' => '',
			'voucherlist' => ''
			);
			$this->js = array(
            'jsfile' => 'scholar.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Students List") ;


		
		$data['scholars_list'] = $this->scholarship_model->get();

		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('scholarship/scholarslist_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	public function profile($scholarid){
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "institution";
		$data['scholarid'] = $scholarid;
		$data['scholar_profile'] = $this->scholarship_model->getscholar($scholarid);
		$data['scholar_payment'] = $this->scholarship_model->getscholarpayment($scholarid);
		$data['scholar_voucher'] = $this->scholarship_model->getvoucherspecific($scholarid);
		$data['hei_list'] = $this->scholarship_model->getaccreditedhei();
		$data['scholarship_type'] = $this->scholarship_model->stype();
		//if($data['details']->result=='0'){
			//echo 'none';
		//}else{
			//$data['programs'] = $this->heidirectory_model->getprograms($instcode);
			//$data['deans'] = $this->heidirectory_model->getdeans($instcode);
			//$data['formernames'] = $this->heidirectory_model->getformernames($instcode);
			
			
			//$data['subnavtitle'] = $data['instname'];
			//$data['heidirectory'] = $result->result();
			
			$this->load->view('inc/header_view');
			$this->load->view('scholarship/scholar_view',$data);
			$this->load->view('inc/footer_view',$js);
			//print_r($data);
		//}
		
	}
	
	public function updateprofile(){
		
		
		//$this->load->library('session');
		//$this->session;
		//$uid = $this->session->userdata('uid');
		$scholarid = $this->input->post('scholarid');
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
		$foccupation = $this->input->post('foccupation');
		$mother = $this->input->post('mother');
		$moccupation = $this->input->post('moccupation');
		$siblingno = $this->input->post('siblingno');
		$disability = $this->input->post('disability');
		$yearofapplication = $this->input->post('yearofapplication');
		$year_level = $this->input->post('year_level');
		//$average_grade = $this->input->post('average_grade');
		//$income = $this->input->post('income');
		$grantee_status = $this->input->post('grantee_status');
		$grantee_remarks = $this->input->post('grantee_remarks');
		$hsgraduated = $this->input->post('hsgraduated');
		
		$this->scholarship_model->updateprofile($scholarid,$lastname,$firstname,$middlename,$dateofbirth,$placeofbirth,$gender,$civilstatus,$citizenship,$contactno,$email,$extension,$barangay,$towncity,$province,$zipcode,$congressionaldistrict,$heicode,$course,$father,$foccupation,$mother,$moccupation,$siblingno,$disability,$yearofapplication,$year_level,$grantee_status,$grantee_remarks,$hsgraduated);
		
	}
	
	public function deletepayment($paymentid){

		//$itemno = $this->input->post('itemno');
		$this->db->delete('scholarship_payment', array('spaymentid' => $paymentid));
		
	}
	
	public function getvoucherinfo(){
		
		
		$voucherid = $this->input->post('voucherid');
		
		$result = $this->scholarship_model->getvoucherinfo($voucherid);
		
		echo json_encode($result);
		
		
	}
	
	public function updatevoucher(){
		

		$voucherid = $this->input->post('voucherid');
		$fundcluster = $this->input->post('fundcluster');
		$voucherdate = $this->input->post('voucherdate');
		$dvno = $this->input->post('dvno');
		$modeofpayment = $this->input->post('modeofpayment');
		$orsno = $this->input->post('orsno');
		$vouchersemester = $this->input->post('vouchersemester');
		$voucherschoolyear = $this->input->post('voucherschoolyear');
		$responsibility = $this->input->post('responsibility');
		$mfopap = $this->input->post('mfopap');
		$voucheramount = $this->input->post('voucheramount');
		
		
		$this->scholarship_model->updatevoucher($voucherid,$fundcluster,$voucherdate,$dvno,$modeofpayment,$orsno,$vouchersemester,$voucherschoolyear,$responsibility,$mfopap,$voucheramount);
		
	}
	
	public function deletevoucher($voucherid){

		
		$this->db->delete('scholarship_voucher', array('voucherid' => $voucherid));
		$this->db->delete('scholarship_voucher_b', array('voucherid' => $voucherid));
		
	}
	

	
	
}