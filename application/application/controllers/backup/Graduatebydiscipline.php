<?php

class Graduatebydiscipline extends CI_Controller
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
            'title' => 'Graduate by Discipline per Region',
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
			'programclass' => '',
			'enrolmentclass' => '',
			'graduateclass' => 'active',
			'breadcrumb' =>array('bc'=>"Home")
			);
			$this->js = array(
            'jsfile' => 'graduate.js'
			);
			
		
		
		
		
		
	}
	
	public function index()
	{

		$data = $this->data;
		$js = $this->js;
		$this->load->view('central_office/central_header_view');
		
		//print_r($this->centraloffice_model->totalenrolmentbyprogramlevel('2016-2017','ched_r01'));
		
		
		$academicyear = $this->input->post('academicyear');
		$region = $this->input->post('region');
		$programlevel = $this->input->post('programlevel');
		
		if($academicyear!=''){
			$data['aylist'] = $this->centraloffice_model->getaylist();
			$data['currentay'] = $academicyear;
			$currentay = $academicyear;
			$currentregion = $region;
			$programlevel = $programlevel;
			
			
			$data['currentregion'] = $region;
			$data['currentprogramlevel'] = $programlevel;
			
		}else{
			$data['aylist'] = $this->centraloffice_model->getaylist();
			$current_ay = $this->centraloffice_model->getcurrentay();
			$data['currentay'] = $current_ay[0]['school_year'];
			$currentay = $current_ay[0]['school_year'];
			$currentregion = "ched_r01";
			$programlevel = "50";
			
			$data['currentregion'] = $currentregion ;
			$data['currentprogramlevel'] = $programlevel;
		}	
		
		
		
		
		//chart query
		$data['regionlist_select'] = $this->centraloffice_model->regionlist_all();
		$data['regionlist'] = json_encode($this->centraloffice_model->regionlist());
		
		//data on chart
		
		$data['totalenrolmentbyprogramlevel'] = json_encode($this->centraloffice_model->totalgraduatebydiscipline($currentay,$currentregion,$programlevel));
		
		$data['totalenrolmentbyprogramlevel_table'] = $this->centraloffice_model->totalgraduatebydiscipline($currentay,$currentregion,$programlevel);
		
		//$data['totalfemale'] = json_encode($this->centraloffice_model->totalfemaleenrolment($currentay));
		
		
		//table query
		$data['totalenrolmentbygender'] = $this->centraloffice_model->totalenrolmentbygender_table();
		
		
		$this->load->view('central_office/graduatebydiscipline_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	

	
	public function instprofile($heidb,$status){
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Institutional Profile');
		
		$this->excel->getActiveSheet()->setCellValue('A1','id');	
		$this->excel->getActiveSheet()->setCellValue('B1','instcode');	
		$this->excel->getActiveSheet()->setCellValue('C1','instname');	
		$this->excel->getActiveSheet()->setCellValue('D1','formownership');	
		$this->excel->getActiveSheet()->setCellValue('E1','insttype');	
		$this->excel->getActiveSheet()->setCellValue('F1','insttype2');	
		$this->excel->getActiveSheet()->setCellValue('G1','street');	
		$this->excel->getActiveSheet()->setCellValue('H1','municipality');	
		$this->excel->getActiveSheet()->setCellValue('I1','province1');	
		$this->excel->getActiveSheet()->setCellValue('J1','province2');	
		$this->excel->getActiveSheet()->setCellValue('K1','region');	
		$this->excel->getActiveSheet()->setCellValue('L1','postal code');	
		$this->excel->getActiveSheet()->setCellValue('M1','institution tel');	
		$this->excel->getActiveSheet()->setCellValue('N1','institution fax');	
		$this->excel->getActiveSheet()->setCellValue('O1','institution head');	
		$this->excel->getActiveSheet()->setCellValue('P1','email');	
		$this->excel->getActiveSheet()->setCellValue('Q1','website');	
		$this->excel->getActiveSheet()->setCellValue('R1','establised');
		$this->excel->getActiveSheet()->setCellValue('S1','sec');
		$this->excel->getActiveSheet()->setCellValue('T1','year approved');
		$this->excel->getActiveSheet()->setCellValue('U1','tocollege');
		$this->excel->getActiveSheet()->setCellValue('V1','touniversity');
		$this->excel->getActiveSheet()->setCellValue('W1','institutionhead');
		$this->excel->getActiveSheet()->setCellValue('X1','head title');
		$this->excel->getActiveSheet()->setCellValue('Y1','highest education');
		$this->excel->getActiveSheet()->setCellValue('Z1','latitude');
		$this->excel->getActiveSheet()->setCellValue('AA1','longtitude');
		$this->excel->getActiveSheet()->setCellValue('AB1','heitype');
		$this->excel->getActiveSheet()->setCellValue('AC1','hei_status');
		$this->excel->getActiveSheet()->setCellValue('AD1','hei_remarks');
		

		
		$this->load->model('heidirectory_model');
		$hei_dir_list = $this->centraloffice_model->getxlsinstprofile($heidb,$status);
		
		$this->excel->getActiveSheet()->fromArray($hei_dir_list,NULL,'A2');
		$filename='institutional_profile_'.$heidb.'.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 $objWriter->save('php://output');
		
	

	}
	
	
	
}