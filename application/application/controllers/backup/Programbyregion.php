<?php

class Programbyregion extends CI_Controller
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
            'title' => 'Program by Region',
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
		$this->load->view('central_office/central_header_view');
		
		
		$data['regionlist'] = json_encode($this->centraloffice_model->regionlist());
		$data['totalprogramperregion'] = json_encode($this->centraloffice_model->totalprogramperregion());
		$data['totalprogramperregion_table'] = $this->centraloffice_model->totalprogramperregion_table();
		//print_r($data['totalheiperregion']);
		$this->load->view('central_office/programbyregion_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	public function name($productID,$two){
		//$this->load->view('inc/header_view');
		//$productID =  $this->uri->segment(3);
		echo $two;
	}
	
	public function programprofile($heidb){
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Institutional Profile');
		
		$this->excel->getActiveSheet()->setCellValue('A1','id');	
		$this->excel->getActiveSheet()->setCellValue('B1','instcode');	
		$this->excel->getActiveSheet()->setCellValue('C1','instname');	
		$this->excel->getActiveSheet()->setCellValue('D1','supervisor');	
		$this->excel->getActiveSheet()->setCellValue('E1','program level');	
		$this->excel->getActiveSheet()->setCellValue('F1','program name');	
		$this->excel->getActiveSheet()->setCellValue('G1','program code');	
		$this->excel->getActiveSheet()->setCellValue('H1','major');	
		$this->excel->getActiveSheet()->setCellValue('I1','major code');	
		$this->excel->getActiveSheet()->setCellValue('J1','discipline');	
		$this->excel->getActiveSheet()->setCellValue('K1','disertation');	
		$this->excel->getActiveSheet()->setCellValue('L1','program status');	
		$this->excel->getActiveSheet()->setCellValue('M1','year');	
		$this->excel->getActiveSheet()->setCellValue('N1','authority');	
		$this->excel->getActiveSheet()->setCellValue('O1','serial');	
		$this->excel->getActiveSheet()->setCellValue('P1','year');	
		$this->excel->getActiveSheet()->setCellValue('Q1','remarks');	
		$this->excel->getActiveSheet()->setCellValue('R1','programmode');
		$this->excel->getActiveSheet()->setCellValue('S1','programmode OT');
		$this->excel->getActiveSheet()->setCellValue('T1','Normal Length');
		$this->excel->getActiveSheet()->setCellValue('U1','Program Credit');
		$this->excel->getActiveSheet()->setCellValue('V1','tuition fee');
		$this->excel->getActiveSheet()->setCellValue('W1','program fee');
		$this->excel->getActiveSheet()->setCellValue('X1','Region');
		$this->excel->getActiveSheet()->setCellValue('Y1','Discipline Group');
		$this->excel->getActiveSheet()->setCellValue('Z1','Major Discipline');
		$this->excel->getActiveSheet()->setCellValue('AA1','Specific Discipline');
		
		

		
		$this->load->model('centraloffice_model');
		$hei_dir_list = $this->centraloffice_model->getxlsprogprofile($heidb);
		
		$this->excel->getActiveSheet()->fromArray($hei_dir_list,NULL,'A2');
		$filename='program_profile_'.$heidb.'.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 $objWriter->save('php://output');
		
	

	}
	
	
	
}