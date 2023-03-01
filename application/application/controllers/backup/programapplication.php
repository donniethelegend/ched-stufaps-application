<?php

class Programapplication extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('programapplication_model');
		 $this->data = array(
            'title' => 'Program Application',
			'heiclass' => 'active',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => '',
			'programapplication' => 'active',
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
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Program Application") ;
		$data['current_year'] = date('Y');
		$data['permits_list'] = $this->programapplication_model->get();
		$data['hei_list'] = $this->programapplication_model->gethei();
		//$data['hei_list'] = $this->contacts_model->gethei();
		//$data['contact_list'] = $this->contacts_model->getaccount();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('heidirectory/permitsrecognition_view',$data);
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
	

	
	
}