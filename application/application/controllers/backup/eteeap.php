<?php

class Eteeap extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//check hei or ro
		$this->session;	
		$utype = $this->session->userdata('usertype');
		if($utype=='Encoder'){
			redirect('login');
		}
		
		$this->load->model('eteeap_model');
		 $this->data = array(
            'title' => 'ETEEAP',
			'heiclass' => 'active',
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
			'settingsclass' => '',
			'voucherlist' => '',
			'breadcrumb' =>array('bc'=>"ETEEAP List")
			);
			$this->js = array(
            'jsfile' => 'eteeap.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Expanded Tertiary Education Equivalency and Accreditation Program") ;
		$data['current_year'] = date('Y');
		$data['eteeap_list'] = $this->eteeap_model->get();
		$data['hei_list'] = $this->eteeap_model->gethei();
		//$data['hei_list'] = $this->contacts_model->gethei();
		//$data['contact_list'] = $this->contacts_model->getaccount();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		if($this->session->userdata('usertype')=="Staff"){
			$this->load->view('heidirectory/eteeap_staff_view',$data);
		}else{
			$this->load->view('heidirectory/eteeap_view',$data);
		}
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	
	
	public function saveeteeap(){
		
		$instcode = $this->input->post('instcode');
		$programname = $this->input->post('programname');
		$contact = $this->input->post('contact');
		$eteeap_status = $this->input->post('eteeap_status');
		$remarks = $this->input->post('remarks');
		
		$this->eteeap_model->saveeteeap($instcode,$programname,$contact,$eteeap_status,$remarks);
		
		
		
	}
	public function deleteeteeap($eteeapid){

		$this->eteeap_model->deleteeteeap($eteeapid);
		
	}
	public function geteteeapdetails($eteeapid){

		$details = $this->eteeap_model->getprofile($eteeapid);

		echo json_encode($details);
	}
	

	public function updateeteeap(){
		
		$eteeapid = $this->input->post('eteeapid');
		$instcode = $this->input->post('instcode');
		$programname = $this->input->post('programname');
		$contact = $this->input->post('contact');
		$eteeap_status = $this->input->post('eteeap_status');
		$remarks = $this->input->post('remarks');
		
		$this->eteeap_model->updateeteeap($instcode,$programname,$contact,$eteeap_status,$remarks,$eteeapid);
		
		
		
		
	}
	
	public function eteeapxls(){
		 
		 		
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Consolidated ETEEAP List');
		$this->load->database();
		
		$sql = $this->db->query("SELECT hei_eteeap.instcode,hei_eteeap.programname,contact,eteeap_status,remarks,a_institution_profile.instname FROM hei_eteeap LEFT JOIN a_institution_profile ON hei_eteeap.instcode = a_institution_profile.instcode");
		$feedbacks = $sql->result_array();

		$arrHeader = array('InstCode', 'Program Name','Contact','Status','Remarks','Institution Name');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		$filename='ETEEAP_List.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		
	

	}

	
	
}