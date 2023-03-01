<?php

class Heimap extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		//check hei or ro
		/*$this->session;	
		$utype = $this->session->userdata('usertype');
		if($utype=='Encoder'){
			redirect('login');
		}
		*/
		
		$this->load->model('dashboard_model');
		//$this->load->model('centraloffice_model');
		  $this->data = array(
            'title' => 'Welcome',
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
		//$this->load->view('central_office/central_header_view');
		$this->load->view('dataviz/inc/header_view');
		
		
		//$data['regionlist'] = $this->centraloffice_model->regionlist_all();
		//$data['totalheiperregion'] = json_encode($this->centraloffice_model->totalheiperregion());
		//print_r($data['totalheiperregion']);
		//$map_region = $this->input->post('map_region');
		$map_region = "ched_r01";
		//echo $map_region;
		//$data['searchmapregion'] = $map_region;
		$data['searchmapregion'] = $map_region;
		if($map_region==""){
			$data['allheimap2'] = "[14.6537146,121.05845,'Commission on Higher Education']";
		}else{
			$data['allheimap2'] = $this->dashboard_model->allheimap2($map_region);
		}
		
		
		//$this->load->view('central_office/dashboard_view',$data);
		$this->load->view('map/mapheader_view',$data);
		//$this->load->view('inc/footer_view',$js);
		
		$this->load->view('dataviz/heimap_view',$data);
		$this->load->view('dataviz/inc/footer_view',$js);
		
	}
	
	
	public function name($productID,$two){
		//$this->load->view('inc/header_view');
		//$productID =  $this->uri->segment(3);
		echo $two;
	}
	
	
}