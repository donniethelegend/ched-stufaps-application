<?php

class Heiprogramlist extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('heiprogramlist_model');
		$this->load->model('programapplication_model');
		 $this->data = array(
            'title' => 'Program List',
			'heiclass' => 'active',
			'heilist' => '',
			'programlist' => 'active',
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
			'heifacultyclass' => '',
			'breadcrumb' =>array('bc'=>"Program List")
			);
			$this->js = array(
            'jsfile' => 'heiprogramlist.js'
			);
	}
	
	public function index()
	{

		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Program List") ;
		
		
		$search_instcode = $this->session->userdata('user_instcode');
		
			
		
		
		if($search_instcode!=""){
			
			$data['allprograms'] = $this->heiprogramlist_model->get($search_instcode);
			$data['search_instcode_post'] = $search_instcode;
		}else{
			
			$data['allprograms'] = array();
		}
		$data['hei_list'] = $this->heiprogramlist_model->gethei();
		$data['employee_list'] = $this->programapplication_model->getemployee();
		
		$this->load->view('inc/header_view');
		$this->load->view('programlist/heiprogramlist_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function details($programid){
		$data = $this->data;
		$js = $this->js;
		
		//check invalid id
		$search_instcode = $this->session->userdata('user_instcode');
		$valid = $this->heiprogramlist_model->checkvalidprogramid($programid,$search_instcode);
		
		if($valid['validid']==0){
			redirect('heiprogramlist');
		}
		
		$data['page'] = "institution";
		$data['details'] = $this->heiprogramlist_model->getprogramdetails($programid);
		$data['enrolment_list'] = $this->heiprogramlist_model->enrolmentlist($programid);
		$data['graduate_list'] = $this->heiprogramlist_model->graduatelist($programid);
		$data['employee_list'] = $this->programapplication_model->getemployee();
		
		$data['current_ay'] = $this->heiprogramlist_model->currentay();
			
			$this->load->view('inc/header_view');
			$this->load->view('programlist/heiprogramlist_details_view',$data);
			//$this->load->view('heidirectory/mapheader_view');
			$this->load->view('inc/footer_view',$js);
			//print_r($data);
		//}
		
	}
	
	public function updateprogram(){
		
		
		$programid =$this->input->post('programid');
		$pstatuscode =$this->input->post('pstatuscode');
		$thesisdisert =$this->input->post('thesisdisert');
		$pstatyear =$this->input->post('pstatyear');
		$pmcode =$this->input->post('pmcode');
		$remarks =$this->input->post('remarks');
		$nlyears =$this->input->post('nlyears');
		$pcredit =$this->input->post('pcredit');
		$tuitionperunit =$this->input->post('tuitionperunit');
		$programfee =$this->input->post('programfee');
		$programlevel =$this->input->post('programlevel');
		$instcode =$this->input->post('instcode');
		
		$this->heiprogramlist_model->updateprogram($programid,$pstatuscode,$thesisdisert,$pstatyear,$pmcode,$remarks,$nlyears,$pcredit,$tuitionperunit,$programfee,$programlevel,$instcode);
		
		
		//echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	public function checkduplicateprogram(){
		
		$instcode = $this->input->post('instcode');
		$newprogramname = $this->input->post('newprogramname');
		$duplicate = $this->heiprogramlist_model->checkduplicateprogram($instcode,$newprogramname);
		echo $duplicate;
		
	}
	
	
	
	public function updateenr(){
		
		
		$programenrolmentid =$this->input->post('programenrolmentid');
		$pcredit =$this->input->post('pcredit');
		$tuitionperunit =$this->input->post('tuitionperunit');
		$programfee =$this->input->post('programfee');
		$newstudm =$this->input->post('newstudm');
		$newstudf =$this->input->post('newstudf');
		$oldstudm =$this->input->post('oldstudm');
		$oldstudf =$this->input->post('oldstudf');
		$secondm =$this->input->post('secondm');
		$secondf =$this->input->post('secondf');
		$thirdm =$this->input->post('thirdm');
		$thirdf =$this->input->post('thirdf');
		$fourthm =$this->input->post('fourthm');
		$fourthf =$this->input->post('fourthf');
		$fifthm =$this->input->post('fifthm');
		$fifthf =$this->input->post('fifthf');
		$sixthm =$this->input->post('sixthm');
		$sixthf =$this->input->post('sixthf');
		$seventhm =$this->input->post('seventhm');
		$seventhf =$this->input->post('seventhf');
		
		$this->heiprogramlist_model->updateenr($programenrolmentid,$pcredit,$tuitionperunit,$programfee,$newstudm,$newstudf,$oldstudm,$oldstudf,$secondm,$secondf,$thirdm,$thirdf,$fourthm,$fourthf,$fifthm,$fifthf,$sixthm,$sixthf,$seventhm,$seventhf);
		
		
		//echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	public function updategnr(){
		
		
		$programgraduateid =$this->input->post('programgraduateid');
		$gradm =$this->input->post('gradm');
		$gradf =$this->input->post('gradf');

		$this->heiprogramlist_model->updategnr($programgraduateid,$gradm,$gradf);

		
	}
	
	
}