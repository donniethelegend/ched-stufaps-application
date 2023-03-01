<?php

class Programsearch extends CI_Controller
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
		
		
		$this->load->model('centraloffice_model');
		  $this->data = array(
            'title' => 'Program Search (National)',
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
			'settingsclass' => '',
			'voucherlist' => '',
			'facultyclass' => '',
			'programclass' => 'active',
			'enrolmentclass' => '',
			'graduateclass' => '',
			'breadcrumb' =>array('bc'=>"Home")
			);
			$this->js = array(
            'jsfile' => 'central.js'
			);
			

	}
	
	public function index()
	{

		$data = $this->data;
		$js = $this->js;
		$programnamesearch = $this->input->post('programnamesearch');
		
		if($programnamesearch!=''){
			$data['programresult'] = $this->centraloffice_model->programsearch($programnamesearch);
		}else{
			$data['programresult'] = array();
		}	
		
		$data['programnamesearch'] = $programnamesearch;
		$this->load->view('central_office/central_header_view');
		$this->load->view('central_office/programsearch_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	public function programsearchxls(){
		$programnamesearch = $this->input->post('programnamesearchxls');
		
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('User Logs');
		
		$this->excel->getActiveSheet()->setCellValue('A1','HEI Name');	
		$this->excel->getActiveSheet()->setCellValue('B1','Instcode');	
		$this->excel->getActiveSheet()->setCellValue('C1','Program Name');	
		$this->excel->getActiveSheet()->setCellValue('D1','Major');	
		$this->excel->getActiveSheet()->setCellValue('E1','Supervisor');	
		$this->excel->getActiveSheet()->setCellValue('F1','Program Status');	
		$this->excel->getActiveSheet()->setCellValue('G1','Authority');	
		$this->excel->getActiveSheet()->setCellValue('H1','Remarks');	
		$this->excel->getActiveSheet()->setCellValue('I1','Region');	
		$this->excel->getActiveSheet()->setCellValue('J1','Program Code');	
		$this->excel->getActiveSheet()->setCellValue('K1','Program Level');	
		$this->excel->getActiveSheet()->setCellValue('L1','Major');	
		$this->excel->getActiveSheet()->setCellValue('M1','Discipline');	
		

		
		$this->load->model('centraloffice_model');
		$hei_dir_list =  $this->centraloffice_model->programsearch($programnamesearch);
		
		$this->excel->getActiveSheet()->fromArray($hei_dir_list,NULL,'A2');
		$filename='Program_search_'.$programnamesearch.'.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 $objWriter->save('php://output');
		
	

	}
	
	
}