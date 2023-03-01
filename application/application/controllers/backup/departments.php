<?php

class Departments extends CI_Controller
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
		
		$this->load->model('departments_model');
		 $this->data = array(
            'title' => 'HEI Departments Details',
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
			'breadcrumb' =>array('bc'=>"Department List")
			);
			$this->js = array(
            'jsfile' => 'departments.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"HEI Departments Details") ;
		$data['current_year'] = date('Y');
		$data['departments_list'] = $this->departments_model->getdepartments();
		$data['hei_list'] = $this->departments_model->gethei();
		//$data['hei_list'] = $this->contacts_model->gethei();
		//$data['contact_list'] = $this->contacts_model->getaccount();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		if($this->session->userdata('usertype')=="Staff"){
			$this->load->view('heidirectory/departments_staff_view',$data);
		}else{
			$this->load->view('heidirectory/departments_view',$data);
		}
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	
	
	public function savedepartment(){
		
		$instcode = $this->input->post('instcode');
		$department_name = $this->input->post('department_name');
		$college_name = $this->input->post('college_name');
		$dean_name = $this->input->post('dean_name');
				
		$this->departments_model->savedepartment($instcode,$department_name,$college_name,$dean_name);
		
		
		//echo $this->db->affected_rows();
		
	}
	public function deletedepartment($departmentid){
		
		$this->departments_model->deletedepartment($departmentid);
		
		
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
	
	public function departmentxls(){
		 
		 		
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Department List');
		$this->load->database();
		
		$sql = $this->db->query("SELECT a_departments.instcode, a_institution_profile.instname,department_name, college_name,dean_name FROM a_departments LEFT JOIN a_institution_profile ON a_departments.instcode = a_institution_profile.instcode");
		$feedbacks = $sql->result_array();

		$arrHeader = array('InstCode', 'HEI Name','Department','College','Dean');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		$filename='Department_list.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		
	

	}

	
	
}