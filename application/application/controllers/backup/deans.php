<?php

class Deans extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('deans_model');
		 $this->data = array(
            'title' => 'Deans Directory',
			'heiclass' => 'active',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => 'active',
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
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Deans Directory") ;
		$data['deans_list'] = $this->deans_model->get();
		$data['hei_list'] = $this->deans_model->gethei();
		//$data['deans_list'] = $this->deans_model->getdeans();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('heidirectory/deans_view',$data);
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