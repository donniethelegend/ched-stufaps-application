<?php

class Accreditedheilist extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('scholarship_model');
		 $this->data = array(
            'title' => 'Accredited HEI List',
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
			'accreditedhei' => 'active',
			'scholarshipapplicant' => '',
			'paymentlist' => '',
			'voucherlist' => ''
			);
			
			$this->js = array(
            'jsfile' => null
			);
			
		$this->session;	
		$utype = $this->session->userdata('usertype');
		if($utype=='scholarship'){
			$this->data = array(
            'title' => 'Accredited HEI List',
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
			'accreditedhei' => 'active',
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
		$data['details'] =array('instname'=>"HEI List") ;
		//$data['contact_list'] = $this->contacts_model->get();
		//$data['hei_list'] = $this->contacts_model->gethei();
		$data['accreditedhei_list'] = $this->scholarship_model->getaccreditedhei();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('scholarship/accreditedheilist_view',$data);
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