<?php

class Programlist extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('programlist_model');
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
			'voucherlist' => ''
			);
			$this->js = array(
            'jsfile' => null
			);
	}
	
	public function index()
	{

		$data = $this->data;
		$js = $this->js;
		$data['allprograms'] = $this->programlist_model->get();
		
		$this->load->view('inc/header_view');
		$this->load->view('programlist/programlist_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	/*
	public function name($productID,$two){
		//$this->load->view('inc/header_view');
		//$productID =  $this->uri->segment(3);
		echo $two;
	}
	*/
	
}