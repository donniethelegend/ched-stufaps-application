<?php

class Buildings extends CI_Controller
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
		
		$this->load->model('buildings_model');
		 $this->data = array(
            'title' => 'HEI Building Details',
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
			'breadcrumb' =>array('bc'=>"Building List")
			);
			$this->js = array(
            'jsfile' => 'buildings.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"HEI Building Details") ;
		$data['current_year'] = date('Y');
		$data['buildings_list'] = $this->buildings_model->getbuildings();
		$data['hei_list'] = $this->buildings_model->gethei();
		//$data['hei_list'] = $this->contacts_model->gethei();
		//$data['contact_list'] = $this->contacts_model->getaccount();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		if($this->session->userdata('usertype')=="Staff"){
			$this->load->view('heidirectory/buildings_staff_view',$data);
		}else{
			$this->load->view('heidirectory/buildings_view',$data);
		}
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	
	
	public function savebuildings(){
		
		$instcode = $this->input->post('instcode');
		$building_name = $this->input->post('building_name');
		$floor_count = $this->input->post('floor_count');
		$classroom_count = $this->input->post('classroom_count');
				
		$this->buildings_model->savebuildings($instcode,$building_name,$floor_count,$classroom_count);
		
		
		//echo $this->db->affected_rows();
		
	}
	public function deletebuilding($buildingid){
		
		$this->buildings_model->deletebuilding($buildingid);
		
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
	
	public function buildingsxls(){
		 
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Program Application');

		 
		$this->load->model('buildings_model');
		$building_list = $this->buildings_model->buildingsxls();
		
		
		$arrHeader = array('Institution Name', 'Instcode','Building Name','Floor Count','Classroom Count');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		$this->excel->getActiveSheet()->fromArray($building_list,'','A2');
		$filename='all_buildings.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 $objWriter->save('php://output');



		
		
		
	

	}

	
	
}