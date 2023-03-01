<?php

class Supervisor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		redirect('/');
		//check hei or ro
		$this->session;	
		$utype = $this->session->userdata('usertype');
		if($utype=='Encoder'){
			redirect('login');
		}
		
		$this->load->model('supervisor_model');
		
		 $this->data = array(
            'title' => 'Supervisor Management',
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
			'settingsclass' => 'active',
			'subnavtitle' => 'Supervisors',
			'breadcrumb' =>array('bc'=>"Supervisor List")
			);
			
		//javascript module
		$this->js = array(
            'jsfile' => 'supervisor.js'
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
		$this->load->view('settings/supervisor_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function updatelinkeid(){
		
		$linkeid = $this->input->post('linkeid');
		$linkuid = $this->input->post('linkuid');

		$this->users_model->updatelinkeid($linkeid,$linkuid);
		
		
	}
	
	public function checkname(){
		$username = $this->input->post('supervisor_name');
		
		$checkuseroarray= $this->supervisor_model->checkname($username);
		
		
		echo json_encode($checkuseroarray[0]);
	}
	
	
	public function savesupervisor(){
		$supervisor_name = $this->input->post('supervisor_name');
		$checkuseroarray= $this->supervisor_model->savesupervisor($supervisor_name);

		
	}
	
	public function deletesupervisor(){
		$supervisorid = $this->input->post('supervisorid');
		$this->supervisor_model->deletesupervisor($supervisorid);
	}
	
	public function getuser($userid){
		$sqlselect = $this->db->query("SELECT * FROM users where uid=$userid");
		$userdetail = $sqlselect->result_array();
		echo json_encode($userdetail[0]);
	}
	
	public function changepassword(){
		$uid = $this->input->post('userid');
		$newpassword = $this->input->post('newpassword');
			
		$sql = "update users set password=MD5(".$this->db->escape($newpassword).") where uid=".$this->db->escape($uid)."";
		
		echo $sql;
		$this->db->query($sql);
		echo $this->db->affected_rows();
		
		
	}
	
	public function updateuser(){
		$uid = $this->input->post('userid');
		$username = $this->input->post('username');
		$user_name = $this->input->post('user_name');
		$usertype = $this->input->post('usertype');
		$usergroup = $this->input->post('usergroup');
			
		$sql = "update users set username=".$this->db->escape($username).",name=".$this->db->escape($user_name).",usertype=".$this->db->escape($usertype).", usergroup=".$this->db->escape($usergroup)." where uid=".$this->db->escape($uid)."";
		
		echo $sql;
		$this->db->query($sql);
		echo $this->db->affected_rows();
		
		
	}
	
	
	
	

	
	
}