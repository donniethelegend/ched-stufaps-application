<?php

class Contacts extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('contacts_model');
		$this->data = array(
            'title' => 'Contacts Directory',
			'heiclass' => '',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => '',
			'programapplication' => '',
			'accounts' => '',
			'contacts' => 'active',
			'permits' => '',
			'scholarship' => '',
			'scholarslist' => '',
			'accreditedhei' => '',
			'scholarshipapplicant' => '',
			'paymentlist' => '',
			'voucherlist' => ''
			);
			
			$this->js = array(
            'jsfile' => 'contacts.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Contact Directory") ;
		$data['contact_list'] = $this->contacts_model->get();
		$data['hei_list'] = $this->contacts_model->gethei();
		$data['account_list'] = $this->contacts_model->getaccount();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('heidirectory/contacts_view',$data);
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
	
	public function editcontact(){

		$contactid = $this->input->post('contactid');	
		
		$contact = $this->db->query("SELECT contacts.contactid,contacts.contactname,contacts.telno,contacts.position,contacts.fax,contacts.website,contacts.address,contacts.email,contacts.instcode,contacts.accountid,a_institution_profile.instname,accounts.accountid,accounts.accountname FROM contacts LEFT JOIN a_institution_profile ON contacts.instcode = a_institution_profile.instcode LEFT JOIN accounts ON contacts.accountid = accounts.accountid WHERE contactid=".$this->db->escape($contactid)."");
		
		$contact_details = $contact->result_array();
		
		echo json_encode($contact_details[0]);
		
	
	}
	
	public function updatesinglecontact(){
		
		$contactid = $this->input->post('contactid');
		$instcode = $this->input->post('instcode');
		$accountid = $this->input->post('accountid');
		$contactname = $this->input->post('contactname');
		$email = $this->input->post('email');
		$telno = $this->input->post('telno');
		$address = $this->input->post('address');
		$position = $this->input->post('position');
		$fax = $this->input->post('fax');
		$website = $this->input->post('website');
		
		
		
		$sql = "update contacts set contactname=".$this->db->escape($contactname)." ,telno=".$this->db->escape($telno).",position=".$this->db->escape($position).",fax=".$this->db->escape($fax).",website=".$this->db->escape($website).",address=".$this->db->escape($address).",email=".$this->db->escape($email).",instcode=".$this->db->escape($instcode).",accountid=".$this->db->escape($accountid)." where contactid=".$this->db->escape($contactid)."";

		$this->db->query($sql);
		
		echo $sql;
		//echo $this->db->affected_rows();
		
	}
	

	
	
}