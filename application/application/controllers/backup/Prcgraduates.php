<?php

class Prcgraduates extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//check hei or ro
		
		$this->load->helper('date');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('file');
		
		$this->session;	
		$utype = $this->session->userdata('usertype');
		if($utype=='Encoder'){
			redirect('login');
		}
		
		$this->load->model('prcgraduates_model');
		 $this->data = array(
            'title' => 'PRC Graduate List',
			'heiclass' => 'active',
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
			'breadcrumb' =>array('bc'=>"PRC Graduate List")
			);
			
			$this->js = array(
            'jsfile' => 'prcgraduates.js'
			);


	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"PRC Graduate List") ;
		$data['activehei'] = $this->prcgraduates_model->getactivehei();
		//$data['enrollment_list'] = $this->prcgraduates_model->getenrollmentlist();
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('prc/prcgraduatesimport_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	
	public function showprograms(){

		$instcode = $this->input->post('instcode');	
		$program_list = $this->enrollmentlist_model->showprograms($instcode);
		echo json_encode($program_list);
		
	
	}
	
	
	
	
	
	
	
	
	
	
	public function elupload() { 
		 $instcode = $this->input->post('instcode');
		 $course = $this->input->post('course');
		 $semester = $this->input->post('semester');
		// $yearlevel = $this->input->post('yearlevel');
		 $schoolyear = $this->input->post('schoolyear');
		 
		 
		 $time_stamp = now();
		 //$newfilename = $fileid."jpg";
         $config['upload_path']   = './uploads/enrollment_list'; 
         $config['allowed_types'] = 'csv'; 
         $config['max_size']      = 100000; 
         $config['max_width']     = 5000; 
         $config['max_height']    = 5000;  
         $config['overwrite']    = true;  
         $config['file_name']    = $instcode."_".$time_stamp;  
         //$filename    = $config['file_name'];  
         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('fileupload')) {
            $error = array('error' => $this->upload->display_errors()); 
            //$this->load->view('upload_form', $error); 
			echo "No File Uploaded";
         }
			
         else { 
            $data = array('upload_data' => $this->upload->data()); 
            //$this->load->view('upload_success', $data); 
			$uid = $this->session->userdata('uid');
			$filename = $this->upload->data('file_name'); 
			$file_type = $this->upload->data('file_type'); 
			$this->enrollmentlist_model->save_el($instcode,$course,$schoolyear,$filename,$uid,$file_type,$semester);
			//header('Location:details/'.$ticketfileid);
         } 
      }

	public function csv_to_array($filename='', $delimiter=',')
	{
		if(!file_exists($filename) || !is_readable($filename))
			return FALSE;
		
		$header = NULL;
		$data = array();
		if (($handle = fopen($filename, 'r')) !== FALSE)
		{
			while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
			{
				if(!$header)
					$header = $row;
				else
					$data[] = array_combine($header, $row);
			}
			fclose($handle);
		}
		return $data;
	}
	
	
	public function review($elid)
	{
		
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Enrollment List") ;
		//$data['activehei'] = $this->enrollmentlist_model->getactivehei();
		//$data['enrollment_list'] = $this->enrollmentlist_model->getenrollmentlist();
		$eldetails = $this->enrollmentlist_model->eluploaddetails($elid);
		$data['enrollmentlist_details'] = $eldetails;
		$filename = $eldetails['filename'];
		
		$data['csvcontent'] = $this->csv_to_array('uploads/enrollment_list/'.$filename);
		
		
		$this->load->view('inc/header_view');
		$this->load->view('cav/enrollmentlistreview_view',$data);
		$this->load->view('inc/footer_view',$js);
		
		
		
		
		/*
		foreach($result as $rarray):
		
			echo $rarray['Name of Students']."<br>";
		
		endforeach;*/
	}
	
	public function importelfile(){
		$elid = $this->input->post('elid');
		
		$eldetails = $this->enrollmentlist_model->eluploaddetails($elid);
		$filename = $eldetails['filename'];
		$csvcontent = $this->csv_to_array('uploads/enrollment_list/'.$filename);
		$this->enrollmentlist_model->importelfile($csvcontent,$elid);
		
		
	}
	
	public function search(){
		
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"PRC Graduate List") ;
		
		$keyword = $this->input->post('keyword');
		
		if($keyword!=""){
			$data['result_list'] = $this->prcgraduates_model->keywordsearch($keyword);
			$data['keyword'] = $keyword;
		}else{
			$data['result_list'] = array();
			$data['keyword'] = "";

		}

		//print_r($data['result_list']);
		$this->load->view('inc/header_view');
		$this->load->view('prc/prcgraduatessearch_view',$data);
		$this->load->view('inc/footer_view',$js);
		
		
	}
	
	public function deletefile(){
		
		$elid = $this->input->post('elid');
		//delete file
		$eldetails = $this->enrollmentlist_model->eldetails($elid);
		$filename = $eldetails['filename'];

		$file = "uploads/enrollment_list/".$filename;
 
		if (is_readable($file) && unlink($file)) {
			echo "The file has been deleted";
		} else {
			echo $file;
			echo "The file was not found or not readable and could not be deleted";
		}
		
		//delete from database
		$this->enrollmentlist_model->deletefile($elid);
		
		
	}
	/*
	public function purchaserequestdownload($from,$to)
	{
		
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('APR Request');
		$this->load->database();
		//$users = $this->userModel->get_users();
		
		
		
		//$sql = "SELECT * FROM aces_form";
		$sql = $this->db->query("SELECT aprdate,purchase_apr.aprno,description,purchase_receiving_items.qty,purchase_receiving_items.unitcost,(purchase_receiving_items.unitcost*purchase_receiving_items.qty) AS totalamount,receivedate FROM purchase_receiving_items LEFT JOIN purchase_receiving ON purchase_receiving_items.deliveryid = purchase_receiving.deliveryid LEFT JOIN purchase_apr ON purchase_receiving.aprid = purchase_apr.aprid 
LEFT JOIN items ON purchase_receiving_items.itemNo = items.itemNo
WHERE purchase_receiving.aprid >= '1' AND aprdate BETWEEN '$from' AND '$to'");
		$feedbacks = $sql->result_array();
		//$feedbacks = $this->db->query($sql);
		$arrHeader = array('Date of PR', 'Purchase Request Number','Item','QTY','Price per Unit','Amount','Date of Inspection');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		$filename='APR_List.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		
	} */
	

	
	
}