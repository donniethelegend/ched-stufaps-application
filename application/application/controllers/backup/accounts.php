<?php

class Accounts extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('accounts_model');
		 $this->data = array(
            'title' => 'Accounts',
			'heiclass' => '',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => '',
			'programapplication' => '',
			'accounts' => 'active',
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
            'jsfile' => 'accounts.js'
			);


	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Accounts List") ;
		$data['accountslist'] = $this->accounts_model->get();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('heidirectory/accounts_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	/*
	public function institution($instcode){
		$data = $this->data;
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
			$this->load->view('inc/footer_view');
			//print_r($data);
		//}
		
	}*/
	
		public function editaccount(){

		$accountid = $this->input->post('accountid');	
		
		$account = $this->db->query("SELECT * from accounts WHERE accountid=".$this->db->escape($accountid)."");
		
		$account_details = $account->result_array();
		
		echo json_encode($account_details[0]);
		
	
	}
	
	public function updateaccount(){
		
		$accountid = $this->input->post('accountid');
		$accountname = $this->input->post('accountname');
		$address = $this->input->post('address');
		$telno = $this->input->post('telno');
		$email = $this->input->post('email');
		
		
		$sql = "update accounts set accountname=".$this->db->escape($accountname)." ,address=".$this->db->escape($address).",telno=".$this->db->escape($telno).",email=".$this->db->escape($email)." where accountid=".$this->db->escape($accountid)."";

		$this->db->query($sql);
		
	}
	
	
	

	
	
}