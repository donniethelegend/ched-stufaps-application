<?php

class Tools extends CI_Controller
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
		
		$this->load->model('supervisor_model');
		$this->load->helper(array('form', 'url'));
		
		 $this->data = array(
            'title' => '',
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
			'voucherlist' => '',
			'subnavtitle' => 'Tools'
			);
			
		//javascript module
		$this->js = array(
            'jsfile' => 'tools.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Users Directory") ;
		$data['supervisor_list'] = $this->supervisor_model->get();
		
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('settings/tools_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function uploadhei(){
		//$fileid = 456;
		$fileid = $this->input->post('fileid');
		//$form_value = 
		 //$newfilename = $fileid."jpg";
         $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'csv'; 
         $config['max_size']      = 2500; 
         //$config['max_width']     = 2048; 
         //$config['max_height']    = 2048;  
         $config['overwrite']    = true;  
         $config['file_name']    = "uploadhei.csv";  
         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('profileimage')) {
            $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('upload_form', $error); 
			//show_404();
         }
			
         else { 
            $data = array('upload_data' => $this->upload->data()); 
            //$this->load->view('upload_success', $data); 
			//header('Location:profile/'.$eid);
         } 
		
	}
	
	function readexcel()
{$baseu = base_url();
		$csv = array_map('str_getcsv', file($baseu.'uploads/uploadhei.csv'));
        //$this->load->library('csvreader');
		
       // $result =   $this->csvreader->parse_file($baseu.'uploads/uploadhei.csv');//path to csv file
		print_r($csv);
        //$data['csvData'] =  $result;
       // $this->load->view('view_csv', $data);  
}
	
	
	

	
	
}