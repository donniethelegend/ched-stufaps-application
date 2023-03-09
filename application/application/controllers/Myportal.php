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
class Myportal  extends CI_Controller{
    //put your code here
    public function __construct()
	{
		parent::__construct();
		$this->load->model('onlineapplication_model');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('date');
                $this->load->helper('cookie');
		$this->load->library('email');	
		$this->session;
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

		
	
                
                if($_SESSION['applicantid']){
                    $app_id  = $_SESSION['applicantid'];
                  
                    $data['application_details'] = $this->onlineapplication_model->getApplication_details($app_id);
                    $data['otherfiles'] = $this->onlineapplication_model->getApplication_otherfiles($app_id);
                    
                    
		$this->load->view('scholarshipapplication/applicationportal',$data);
                }
                else{
                    $this->load->view('scholarshipapplication/application404',$data);
                    
                }
                
                
		$this->load->view('inc_boxed/footer_view',$js);
		
	}
        public function login(){
            
       
            
            $username = $this->input->post('applicationno');	
		$loginpassword = $this->input->post('mno');	
            
           if($this->onlineapplication_model->verfyMyporttal($username,$loginpassword)){
             
              redirect(base_url().'myportal');
               //header('Location:'. $urlredirect);
           }
           else{
             
               redirect(base_url());
           }
            
            
            
            
            
            
            
            
            
            
        }
        public function addsignature(){
            
    
            
            $sigcode = $this->input->post('signaturecode');	
	$id  = $_SESSION['applicantid'];

           // $this->onlineapplication_model->verfyMyporttal($username,$loginpassword);
            
            
             //if($this->onlineapplication_model->insertSignature($sigcode)){
               if($this->onlineapplication_model->update_on_key_duplicate("scholarship_attached_requirement",'signature',$sigcode,$id,'id')){
                // header('location:'.base_url().'myportal');
                 redirect(base_url().'myportal');
             }
             else{
            
                redirect(base_url());
                 
             }
            
        }
        public function updateprofilepic(){
            
        $now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Manila'));
		$now_timestamp = $now->format('Y-m-d H:i:s');
		$current_year = $now->format('Y');
		$current_month = $now->format('m');
                 $id  = $_SESSION['applicantid'];
                
                   $path_year   = './uploads/requirements/'.$current_year.'/'.$current_month."/";
            
                   if(!is_dir($path_year)){                                      
                    mkdir($path_year, 0777, true);
                }
                 $data = array();
               
                 $config['allowed_types'] = 'gif|jpg|png|pdf';
                 $config['upload_path'] = $path_year;
                 $this->load->library('upload',$config);
                   
                 if($this->upload->do_upload('profilepic')){
                       
                 $data =$path_year.$this->upload->data('file_name');
                     $id = $_SESSION['applicantid'];
                     if($this->onlineapplication_model->update_on_key_duplicate("scholarship_attached_requirement",'picture22',$data,$id,'id')){
               
                 
               
                          // header('location:'.base_url().'myportal');
                          redirect(base_url().'myportal');
                          }
                          else{
                 redirect(base_url());
                                       

                          }
                 }
                 else{
                     
                     echo var_dump($this->upload->display_errors());
                 }
                 
                 
            
        }
        public function getprofilerecord(){
             if($_SESSION['applicantid']){
                    $app_id  = $_SESSION['applicantid'];
                  
                    echo "<pre>".var_dump($this->onlineapplication_model->getApplication_details($app_id))."</pre>";
             }
        }
        public function uploadfiles(){
 
            $now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Manila'));
		$now_timestamp = $now->format('Y-m-d H:i:s');
		$current_year = $now->format('Y');
		$current_month = $now->format('m');
                 $id  = $_SESSION['applicantid'];
                
                   $path_year   = './uploads/requirements/'.$current_year.'/'.$current_month."/";
            
                   if(!is_dir($path_year)){                                      
                    mkdir($path_year, 0777, true);
                }
                 $data = array();
                 $countfiles = count($_FILES['upload']['name']);
                 $config['allowed_types'] = 'gif|jpg|png|pdf';
                 $config['upload_path'] = $path_year;
                 $this->load->library('upload',$config);
                 
                 $typedoc = $this->input->post('doctype');
                // echo $countfiles." = Number of Files";
             
                 
       for($i=0;$i<$countfiles;$i++){
      
            if(!empty($_FILES['upload']['name'][$i])){
                   // Define new $_FILES array - $_FILES['file']
          $_FILES['file']['name'] = $_FILES['upload']['name'][$i];
          $_FILES['file']['type'] = $_FILES['upload']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['upload']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['upload']['error'][$i];
          $_FILES['file']['size'] = $_FILES['upload']['size'][$i];

             $config['file_name'] =$id.'_'.$typedoc.''.md5($now->format('Y-m-d H:i:s')). $_FILES['upload']['name'][$i];
          
             $this->upload->initialize($config);
             
             if($this->upload->do_upload('file')){
               
                 $data[] = array("filepath"=>$path_year.$this->upload->data('file_name'),
                     "applicationid"=>$id,
                     "filename"=>$typedoc.'_'.$now_timestamp ,
                     "timestamp"=>$now_timestamp,
                     "type_of_document"=>$typedoc
                         ,"id"=>null);
                
             }
             else{
                 
                 echo $this->upload->display_errors();
             }

            
          
            }
       }
    
      //echo var_dump($data);
       if($data){
          
           
          // echo var_dump($data);
          if($this->onlineapplication_model->uploadpath_otherfiles($data)){
              
		redirect(base_url().'myportal');
          }
          else{
           echo "Failed Upload!";
          }
         
           
       }
       
       
       
       
       
       
       
         
            
      
            
            
            
            
            
            
            
            
            
        }
        
	
	public function showtimestamp(){
            
            echo "dsdsd";
	 $now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Manila'));
                echo date_timestamp_get($now);
	}
	
	public function logout(){
		//$this->load->view('inc/header_view');
		//$productID =  $this->uri->segment(3);
		//echo $two;
		$this->session->sess_destroy();
                
		redirect(base_url().'home');
		
	}
    
}
