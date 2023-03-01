<?php

class Users extends CI_Controller
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
		
		$this->load->model('users_model');
		
		 $this->data = array(
            'title' => 'User Management',
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
			'subnavtitle' => 'Users',
			'breadcrumb' =>array('bc'=>"User List")
			);
			
		//javascript module
		$this->js = array(
            'jsfile' => 'users.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Users Directory") ;
		$data['users_list'] = $this->users_model->get();
		
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('users/users_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function updatelinkeid(){
		
		$linkeid = $this->input->post('linkeid');
		$linkuid = $this->input->post('linkuid');

		$this->users_model->updatelinkeid($linkeid,$linkuid);
		
		
	}
	
	public function checkusername(){
		$username = $this->input->post('username');
		$duplicateresult = $this->users_model->checkusername($username);
		
		echo json_encode($duplicateresult[0]);
	}
	
	
	public function saveuser(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user_name = $this->input->post('user_name');
		$usertype = $this->input->post('usertype');
		$usergroup = $this->input->post('usergroup');

		$this->users_model->saveuser($username,$password,$user_name,$usertype,$usergroup);
		

		
		
	}
	
	public function deleteuser(){
		$userid = $this->input->post('userid');
		$this->users_model->deleteuser($userid);
		
		//echo $sql;
	}
	
	public function getuser($userid){
		
		$this->users_model->getuser($userid);
		
	}
	
	public function changepassword(){
		$uid = $this->input->post('userid');
		$newpassword = $this->input->post('newpassword');
			
		$this->users_model->changepassword($uid,$newpassword);
		
		
	}
	
	public function updateuser(){
		$uid = $this->input->post('userid');
		$username = $this->input->post('username');
		$user_name = $this->input->post('user_name');
		$usertype = $this->input->post('usertype');
		$usergroup = $this->input->post('usergroup');
			
		
		$this->users_model->updateuser($uid,$username,$user_name,$usertype,$usergroup);
		
	}
	
	public function changepassword_hei(){
		$uid = $this->input->post('uid');
		$cpassword = $this->input->post('current_password');
		$npassword = $this->input->post('new_password');
			
		$this->users_model->changepassword_hei($uid,$cpassword,$npassword);
		
		
	}
	
	
	

	
	
}