<?php

class Heiprofile extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
		//check hei or ro
		$this->session;	
		$utype = $this->session->userdata('usertype');
		if($utype!='Encoder'){
			redirect('login/logout');
		}

		$this->load->model('heiprofile_model');
		$this->load->model('heidirectory_model');
		$this->load->model('permitsrecognition_model');
		$this->load->model('eteeap_model');
		$this->load->model('programapplication_model');
		$this->load->helper('date');
		 $this->data = array(
            'title' => 'HEI Directory',
			'heiclass' => 'active',
			'heilist' => 'active',
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
			'heifacultyclass' => '',
			'breadcrumb' =>array('bc'=>"HEI Profile")
			);
			$this->js = array(
            'jsfile' => 'heiprofile.js'
			);
		
		
		
	}
	
	public function index()
	{
		$instcode = $this->session->userdata('user_instcode');
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "institution";
		//$data['breadcrumb'] =array('bc'=>"HEI Profile") ;
		$data['details'] = $this->heidirectory_model->getinstname($instcode)->row();
		
		//if($data['details']->result=='0'){
			//echo 'none';
		//}else{
			$data['contacts_list'] = $this->heidirectory_model->getcontacts($instcode);
			$data['programs'] = $this->heidirectory_model->getprograms($instcode);
			$data['deans'] = $this->heidirectory_model->getdeans($instcode);
			$data['formernames'] = $this->heidirectory_model->getformernames($instcode);
			
			$data['permits_list'] = $this->permitsrecognition_model->getspecific($instcode);
			$data['eteeap_list'] = $this->eteeap_model->getperhei($instcode);
			$data['building_list'] = $this->heidirectory_model->getbuilding($instcode);
			$data['department_list'] = $this->heidirectory_model->getdepartment($instcode);
			$data['employee_list'] = $this->programapplication_model->getemployee();
			$data['faculty_list'] = $this->heidirectory_model->getfaculty($instcode);
			$data['ref_f_fullpart'] = $this->heidirectory_model->getfullpart();
			
			
			$data['institutioncode'] = $instcode;
			//$data['subnavtitle'] = $data['instname'];
			//$data['heidirectory'] = $result->result();
			
			$this->load->view('inc/header_view');
			$this->load->view('home/hei_home_view',$data);
			$this->load->view('heidirectory/mapheader_view');
			$this->load->view('inc/footer_view',$js);
			//print_r($data);
		//}
		
	}
	public function saveheiinfo(){
		
		
		
		$instcode =$this->input->post('instcode');
		$province2 =$this->input->post('province2');
		$insthead =$this->input->post('insthead');
		$titlehead =$this->input->post('titlehead');
		$atel =$this->input->post('atel');
		$afax =$this->input->post('afax');
		$ainsttelhead =$this->input->post('ainsttelhead');
		$aemail =$this->input->post('aemail');
		$awebsite =$this->input->post('awebsite');
		
		//$instname =$this->input->post('instname');
		//$form_ownership =$this->input->post('form_ownership');
		$astreet =$this->input->post('astreet');
		$amunicipality =$this->input->post('amunicipality');
		$aprovince =$this->input->post('aprovince');
		$aregion =$this->input->post('aregion');
		$azip =$this->input->post('azip');
		$aestablished =$this->input->post('aestablished');
		$asec =$this->input->post('asec');
		$ayearapproved =$this->input->post('ayearapproved');
		$acollege =$this->input->post('acollege');
		$auniversity =$this->input->post('auniversity');
		$heid =$this->input->post('heid');
		
		//$insttype =$this->input->post('insttype');
		//$insttype2 =$this->input->post('insttype2');
		//$hei_remarks =$this->input->post('hei_remarks');
		//$hei_status =$this->input->post('hei_status');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		
		
		$this->heiprofile_model->saveheiinfo($province2,$insthead,$titlehead,$atel,$afax,$ainsttelhead,$aemail,$awebsite,$astreet,$amunicipality,$aprovince,$aregion,$azip,$aestablished,$asec,$ayearapproved,$acollege,$auniversity,$instcode,$heid,$latitude,$longitude);
		
		
	}
	
	public function name($productID,$two){
		//$this->load->view('inc/header_view');
		//$productID =  $this->uri->segment(3);
		echo $two;
	}
	
	
}