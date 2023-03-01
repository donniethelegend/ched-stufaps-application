<?php

class Loginbyregion extends CI_Controller
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
            'title' => 'Login by Region',
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
		$data['totalloginperregion'] = json_encode($this->centraloffice_model->totalloginperregion());
		$data['totalloginperregion_table'] = $this->centraloffice_model->totalloginperregion_table();
		//print_r($data['totalheiperregion']);
		$this->load->view('central_office/loginbyregion_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	public function name($productID,$two){
		//$this->load->view('inc/header_view');
		//$productID =  $this->uri->segment(3);
		echo $two;
	}
	
	public function userlog($heidb){
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('User Logs');
		
		$this->excel->getActiveSheet()->setCellValue('A1','id');	
		$this->excel->getActiveSheet()->setCellValue('B1','username');	
		$this->excel->getActiveSheet()->setCellValue('C1','user_ip');	
		$this->excel->getActiveSheet()->setCellValue('D1','logintime');	
		

		
		$this->load->model('heidirectory_model');
		$hei_dir_list = $this->centraloffice_model->getxlsuserlog($heidb);
		
		$this->excel->getActiveSheet()->fromArray($hei_dir_list,NULL,'A2');
		$filename='User_log_'.$heidb.'.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 $objWriter->save('php://output');
		
	

	}
	
	
	
}