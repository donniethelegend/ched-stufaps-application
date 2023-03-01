<?php

class Heideans extends CI_Controller
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
			'settingsclass' => '',
			'voucherlist' => '',
			'heifacultyclass' => '',
			'breadcrumb' =>array('bc'=>"Deans Directory")
			);
			$this->js = array(
            'jsfile' => 'heidean.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Deans Directory") ;

		$search_instcode = $this->session->userdata('user_instcode');
		
		if($search_instcode!=""){
			$data['deans_list'] = $this->deans_model->getdean($search_instcode);
			//$data['faculty_list'] = $this->faculty_model->getfaculty($search_instcode);
			$data['search_instcode_post'] = $search_instcode;
		}else{
			$data['deans_list'] = array();
			//$data['faculty_list'] = array();
		}
		
		
		
		
		
		
		//$data['deans_list'] = $this->deans_model->get();
		$data['hei_list'] = $this->deans_model->gethei();
		//$data['deans_list'] = $this->deans_model->getdeans();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('heidirectory/heideans_view',$data);
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
	
	
	public function savedean(){
		$dean_instcode = $this->input->post('dean_instcode');
		$deansname = $this->input->post('deansname');
		$designation = $this->input->post('designation');
		$assignment = $this->input->post('designation');
		$baccalaureate = $this->input->post('baccalaureate');
		$masters = $this->input->post('masters');
		$doctoral = $this->input->post('doctoral');
		$dean_status = $this->input->post('dean_status');
		$dean_remarks = $this->input->post('dean_remarks');
		
		$this->deans_model->savedean($dean_instcode,$deansname,$designation,$assignment,$baccalaureate,$masters,$doctoral,$dean_status,$dean_remarks);
	}

	public function deletedean(){
		$deanid = $this->input->post('deanid');
		$this->deans_model->deletedean($deanid);
		
	}
	
	public function editdean(){
		$deanid = $this->input->post('deanid');
		if($deanid==null){
			show_404();
		}else{
			
			$details = $this->deans_model->getdeandetails($deanid);
			echo json_encode($details);
		}
		
	}
	
	public function updatedean(){
		
		
		$edit_deanid = $this->input->post('edit_deanid');
		$dean_instcode = $this->input->post('dean_instcode');
		$deansname = $this->input->post('deansname');
		$designation = $this->input->post('designation');
		$assignment = $this->input->post('assignment');
		$baccalaureate = $this->input->post('baccalaureate');
		$masters = $this->input->post('masters');
		$doctoral = $this->input->post('doctoral');
		$dean_status = $this->input->post('dean_status');
		$dean_remarks = $this->input->post('dean_remarks');
		
		
		$this->deans_model->updatedean($edit_deanid,$dean_instcode,$deansname,$designation,$assignment,$baccalaureate,$masters,$doctoral,$dean_status,$dean_remarks);
		
		
		
		
	}
	

	
	
}