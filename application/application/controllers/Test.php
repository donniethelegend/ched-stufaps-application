<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Test
 *
 * @author User
 */
class Test  extends CI_Controller{
    //put your code here
    public function __construct()
	{
		parent::__construct();
		$this->load->model('onlineapplication_model');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('email');	
		
		$this->data = array(
            'title' => 'Welcome'
			);
		$this->js = array(
            'jsfile' => 'application_v10.js'
			);
			
		$status = $this->onlineapplication_model->onlineapplicationstatus();
		if($status['settings_value']=="INACTIVE"){
			header("Location: https://stufaps.chedro1.com/stufaps-application-closed/");
		}
			

	}
    public function index()
	{

		$data = $this->data;
		$js = $this->js;
		$this->load->view('inc_boxed/header_view');
		$this->load->view('inc_boxed/lefttopsidebar_view');
		$this->load->view('inc_boxed/subheader_view');

		$data['hei_list'] = $this->onlineapplication_model->gethei();
		$data['course_list'] = $this->onlineapplication_model->getcourse();
		//$data['courses_list'] = $this->scholarshipapplicants_model->getcourses();
		//$data['user_count'] = $this->scholarshipapplicants_model->getusercount();
		//$data['yearapplied_list'] = $this->scholarshipapplicants_model->getyearapplied();
		$data['city_municipality_present'] = $this->onlineapplication_model->city_municipality_present();
		$data['city_municipality'] = $this->onlineapplication_model->city_municipality();
		//$data['congressionaldistrict'] = $this->scholarshipapplicants_model->congressionaldistrict();

		$this->load->view('scholarshipapplication/testupload',$data);
		$this->load->view('inc_boxed/footer_view',$js);
		
	}
    
}
