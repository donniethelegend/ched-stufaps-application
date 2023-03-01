<?php

class Faculty extends CI_Controller
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
		
		$this->load->model('faculty_model');
		 $this->data = array(
            'title' => 'Faculty List',
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
			'breadcrumb' =>array('bc'=>"Faculty List")
			);
			$this->js = array(
            'jsfile' => 'faculty.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Faculty List") ;
		//$data['current_year'] = date('Y');
		
		//$search_facultyname = $this->input->post('search_facultyname');
		$search_instcode = $this->input->post('search_instcode');
		$facultysearch = $this->input->post('facultynamesearch');
		//echo $search_facultyname;
		//echo $search_instcode;
		
		if($search_instcode!=""){
			
			$data['faculty_list'] = $this->faculty_model->getfaculty($search_instcode);
			$data['search_instcode_post'] = $search_instcode;
		}
		/*if($facultysearch!=""){
			
			$data['faculty_list'] = $this->faculty_model->searchfaculty($facultysearch);
			$data['facultysearch'] = $facultysearch;
		}*/else{
			
			$data['faculty_list'] = array();
			$data['search_instcode_post'] = null;
			$data['facultysearch'] = null;
		}
		
		
		//modal
		$data['fullpart'] = $this->faculty_model->getfullpart();
		$data['highdegree'] = $this->faculty_model->gethighdegree();
		$data['licensecode'] = $this->faculty_model->getlicensecode();
		$data['ranklist'] = $this->faculty_model->getrank();
		$data['annualsalary'] = $this->faculty_model->getsalary();
		$data['teachingload'] = $this->faculty_model->getteachingload();
		
		$data['hei_list'] = $this->faculty_model->gethei();

		
		$this->load->view('inc/header_view');
		//if($this->session->userdata('usertype')=="Staff"){
			//$this->load->view('heidirectory/faculty_view',$data);
		//}else{
			$this->load->view('heidirectory/faculty_view',$data);
		//}
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	
	
	public function savefaculty(){
		
		$instcode = $this->input->post('instcode');
		$faculty_name = $this->input->post('faculty_name');
		$faculty_full_part_code = $this->input->post('faculty_full_part_code');
		$faculty_gender = $this->input->post('faculty_gender');
		$teaching_discipline = $this->input->post('teaching_discipline');
		$highest_degree_code = $this->input->post('highest_degree_code');
		$faculty_programcode = $this->input->post('faculty_programcode');
		$faculty_programname = $this->input->post('faculty_programname');
		$faculty_masterscode = $this->input->post('faculty_masterscode');
		$faculty_masters = $this->input->post('faculty_masters');
		$faculty_doctoratecode = $this->input->post('faculty_doctoratecode');
		$faculty_doctorate = $this->input->post('faculty_doctorate');
		$professional_license_code = $this->input->post('professional_license_code');
		$tenure = $this->input->post('tenure');
		$rank_code = $this->input->post('rank_code');
		$teaching_load_code = $this->input->post('teaching_load_code');
		$subjects = $this->input->post('subjects');
		$annual_salary_code = $this->input->post('annual_salary_code');
				
		$this->faculty_model->savefaculty($instcode,$faculty_name,$faculty_full_part_code,$faculty_gender,$teaching_discipline,$highest_degree_code,$faculty_programcode,$faculty_programname,$faculty_masterscode,$faculty_masters,$faculty_doctoratecode,$faculty_doctorate,$professional_license_code,$tenure,$rank_code,$teaching_load_code,$subjects,$annual_salary_code);
		
		
		//echo $this->db->affected_rows();
		
	}
	public function deletefaculty(){
		$facultyid = $this->input->post('facultyid');
		$this->faculty_model->deletefaculty($facultyid);
		
	}
	
	public function editfaculty(){
		$facultyid = $this->input->post('facultyid');
		if($facultyid==null){
			show_404();
		}else{
			
			$details = $this->faculty_model->getfacultydetails($facultyid);
			echo json_encode($details);
		}
		
	}
	

	public function updatefaculty(){
		
		
		$edit_facultyid = $this->input->post('edit_facultyid');
		$instcode = $this->input->post('instcode');
		$faculty_name = $this->input->post('faculty_name');
		$faculty_full_part_code = $this->input->post('faculty_full_part_code');
		$faculty_gender = $this->input->post('faculty_gender');
		$teaching_discipline = $this->input->post('teaching_discipline');
		$highest_degree_code = $this->input->post('highest_degree_code');
		$faculty_programcode = $this->input->post('faculty_programcode');
		$faculty_programname = $this->input->post('faculty_programname');
		$faculty_masterscode = $this->input->post('faculty_masterscode');
		$faculty_masters = $this->input->post('faculty_masters');
		$faculty_doctoratecode = $this->input->post('faculty_doctoratecode');
		$faculty_doctorate = $this->input->post('faculty_doctorate');
		$professional_license_code = $this->input->post('professional_license_code');
		$tenure = $this->input->post('tenure');
		$rank_code = $this->input->post('rank_code');
		$teaching_load_code = $this->input->post('teaching_load_code');
		$subjects = $this->input->post('subjects');
		$annual_salary_code = $this->input->post('annual_salary_code');
		$faculty_status = $this->input->post('faculty_status');
		
		$this->faculty_model->updatefaculty($instcode,$faculty_name,$faculty_full_part_code,$faculty_gender,$teaching_discipline,$highest_degree_code,$faculty_programcode,$faculty_programname,$faculty_masterscode,$faculty_masters,$faculty_doctoratecode,$faculty_doctorate,$professional_license_code,$tenure,$rank_code,$teaching_load_code,$subjects,$annual_salary_code,$edit_facultyid,$faculty_status);
		
		
		
		
	}
	
	
	
	
	public function heifaculty($search_instcode_post){
		
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Faculty List');
		
		$this->excel->getActiveSheet()->setCellValue('A1','id');	
		$this->excel->getActiveSheet()->setCellValue('B1','instcode');	
		$this->excel->getActiveSheet()->setCellValue('C1','instname');	
		$this->excel->getActiveSheet()->setCellValue('D1','dean name');	
		$this->excel->getActiveSheet()->setCellValue('E1','designation');	
		$this->excel->getActiveSheet()->setCellValue('F1','assignment');	
		$this->excel->getActiveSheet()->setCellValue('G1','baccalaureate');	
		$this->excel->getActiveSheet()->setCellValue('H1','masters');	
		$this->excel->getActiveSheet()->setCellValue('I1','doctoral');	
		$this->excel->getActiveSheet()->setCellValue('J1','dean status');	
		$this->excel->getActiveSheet()->setCellValue('K1','dean remarks');	
		$this->excel->getActiveSheet()->setCellValue('L1','dean deleted');	

		
		$this->load->model('faculty_model');
		$faculty_list = $this->faculty_model->getheifaculty($search_instcode_post);
		
		$this->excel->getActiveSheet()->fromArray($faculty_list,NULL,'A2');
		$filename='hei_faculty_'.$search_instcode_post.'.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 $objWriter->save('php://output');
		
	

	}
	
	public function allfaculty(){
		
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('All Faculty List');
		
		$this->excel->getActiveSheet()->setCellValue('A1','instcode');	
		$this->excel->getActiveSheet()->setCellValue('B1','instname');	
		$this->excel->getActiveSheet()->setCellValue('C1','Street');	
		$this->excel->getActiveSheet()->setCellValue('D1','Municipality');	
		$this->excel->getActiveSheet()->setCellValue('E1','Province 1');	
		$this->excel->getActiveSheet()->setCellValue('F1','Province 2');	
		$this->excel->getActiveSheet()->setCellValue('G1','HEI Type');	
		$this->excel->getActiveSheet()->setCellValue('H1','Faculty ID');	
		$this->excel->getActiveSheet()->setCellValue('I1','Faculty Name');	
		$this->excel->getActiveSheet()->setCellValue('J1','Faculty Code');	
		$this->excel->getActiveSheet()->setCellValue('K1','Description');	
		$this->excel->getActiveSheet()->setCellValue('L1','Gender');	
		$this->excel->getActiveSheet()->setCellValue('M1','Highest Degree');	
		$this->excel->getActiveSheet()->setCellValue('N1','Program name');	
		$this->excel->getActiveSheet()->setCellValue('O1','Masters');	
		$this->excel->getActiveSheet()->setCellValue('P1','Doctorate');	
		$this->excel->getActiveSheet()->setCellValue('Q1','License');	
		$this->excel->getActiveSheet()->setCellValue('R1','Tenure');	
		$this->excel->getActiveSheet()->setCellValue('S1','Rank');	
		$this->excel->getActiveSheet()->setCellValue('T1','Teaching Description');	
		$this->excel->getActiveSheet()->setCellValue('U1','Subjects');	
		$this->excel->getActiveSheet()->setCellValue('V1','Salary');	
		$this->excel->getActiveSheet()->setCellValue('W1','Status');	

		
		$this->load->model('faculty_model');
		$faculty_list = $this->faculty_model->downloadfaculty();
		
		$this->excel->getActiveSheet()->fromArray($faculty_list,NULL,'A2');
		$filename='hei_faculty.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 $objWriter->save('php://output');
		
	

	}


	
	
}