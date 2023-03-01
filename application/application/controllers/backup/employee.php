<?php

class Employee extends CI_Controller
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
			'scholarship' => '',
			'scholarslist' => '',
			'accreditedhei' => '',
			'scholarshipapplicant' => '',
			'paymentlist' => '',
			'voucherlist' => ''
			);
			$this->js = array(
            'jsfile' => null
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Employee List") ;
		$data['scholars_list'] = $this->scholarship_model->get();

		$this->load->view('inc/header_view');
		$this->load->view('personel/personellist_view',$data);
		$this->load->view('inc/footer_view');
		
	}
	
	
	
	public function profile($scholarid){
		$data = $this->data;
		$data['page'] = "institution";
		$data['scholar_profile'] = $this->scholarship_model->getscholar($scholarid)->row();
		$data['scholar_payment'] = $this->scholarship_model->getscholarpayment($scholarid);
		$data['scholar_voucher'] = $this->scholarship_model->getvoucherspecific($scholarid);
		
		
			
			$this->load->view('inc/header_view');
			$this->load->view('personel/employee_view',$data);
			$this->load->view('inc/footer_view');

		
	}
	

	
	
}