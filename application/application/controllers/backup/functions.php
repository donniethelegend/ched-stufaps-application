<?php

class Functions extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('functions_model');
		$this->load->model('scholarshipapplicants_model');
		 
	}
	//save contact from hei details
	public function savecontact(){
		
		$instcode = $this->input->post('instcode');
		$contactname = $this->input->post('contactname');
		$position = $this->input->post('position');
		$email = $this->input->post('email');
		$telno = $this->input->post('telno');
		$address = $this->input->post('address');
		
		$sql = "INSERT INTO contacts (contactname,telno,position,address,email,instcode) VALUES (".$this->db->escape($contactname).", ".$this->db->escape($telno).", ".$this->db->escape($position).", ".$this->db->escape($address).", ".$this->db->escape($email).", ".$this->db->escape($instcode).")";
		$this->db->query($sql);
		echo $this->db->affected_rows();
		
	}
	
	public function saveaccount(){
		
		//$instcode = $this->input->post('instcode');
		$accountname = $this->input->post('accountname');
		$email = $this->input->post('email');
		$telno = $this->input->post('telno');
		$address = $this->input->post('address');
		
		$sql = "INSERT INTO accounts (accountname,address,telno,email) VALUES (".$this->db->escape($accountname).", ".$this->db->escape($address).", ".$this->db->escape($telno).", ".$this->db->escape($email).")";
		$this->db->query($sql);
		echo $this->db->affected_rows();
		
	}
	
	public function deleteaccount($accountid){

		$sql = "DELETE from accounts where accountid='".$accountid."'";
		$this->db->query($sql);
		
	}
	
	//save contact from Contacts Menu
	public function savesinglecontact(){
		
		$instcode = $this->input->post('instcode');
		$accountid = $this->input->post('accountid');
		$contactname = $this->input->post('contactname');
		$email = $this->input->post('email');
		$telno = $this->input->post('telno');
		$address = $this->input->post('address');
		$position = $this->input->post('position');
		$fax = $this->input->post('fax');
		$website = $this->input->post('website');
		
		$sql = "INSERT INTO contacts (contactname,telno,address,email,instcode,accountid,position,fax,website) VALUES (".$this->db->escape($contactname).", ".$this->db->escape($telno).", ".$this->db->escape($address).", ".$this->db->escape($email).", ".$this->db->escape($instcode).", ".$this->db->escape($accountid).", ".$this->db->escape($position).", ".$this->db->escape($fax).", ".$this->db->escape($website).")";
		$this->db->query($sql);
		echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	public function deletecontact($contactid){

		$sql = "DELETE from contacts where contactid='".$contactid."'";
		$this->db->query($sql);
		echo $this->db->affected_rows();
	}
	
	public function generatepermitno(){

		$spcode = $this->input->post('specialpermit');	
		$seriesyear = $this->input->post('seriesyear');	
		//$result = $this->db->get('contacts');
		$lastpermitno = $this->db->query("SELECT * FROM permits_recognition where specialpermit='$spcode' AND seriesyear='$seriesyear' order by permitno desc");
		//echo "SELECT * FROM permits_recognition where specialpermit='$spcode' AND seriesyear='$seriesyear' order by permitno desc";
		$permitarray = $lastpermitno->result_array();
		if($permitarray==null){
			echo "0";
		}else{
			echo intval($permitarray[0]['permitno']);
		}
		//print_r($permitarray);
		//echo intval($permitarray[0]['permitno']);
		
		
	
	}
	
	public function savepermits(){
		
		$instcode = $this->input->post('instcode');
		$permitdate = $this->input->post('permitdate');
		$programname = $this->input->post('programname');
		$specialpermit = $this->input->post('specialpermit');
		$permitno = $this->input->post('permitno');
		$seriesyear = $this->input->post('seriesyear');
		$effectivitydate = $this->input->post('effectivitydate');
		$programlevel = $this->input->post('programlevel');
		
		
		$sql = "INSERT INTO permits_recognition (instcode,permitdate,programname,specialpermit,permitno,seriesyear,effectivitydate,programlevel) VALUES (".$this->db->escape($instcode).", ".$this->db->escape($permitdate).", ".$this->db->escape($programname).", ".$this->db->escape($specialpermit).", ".$this->db->escape($permitno).", ".$this->db->escape($seriesyear).", ".$this->db->escape($effectivitydate).", ".$this->db->escape($programlevel).")";
		$this->db->query($sql);
		echo $this->db->affected_rows();
		
	}
	
	public function savecoordinates($instcode){
		
		//$instcode = $this->input->post('instcode');
		$latitude = $this->input->post('latitude');
		$longtitude = $this->input->post('longtitude');
		//$instcode =$this->input->post('instcode');
		
		$sql = "update a_institution_profile set latitude=".$this->db->escape($latitude)." ,longtitude=".$this->db->escape($longtitude)." where instcode=".$this->db->escape($instcode)."";

		$this->db->query($sql);
		
		echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	public function saveheiinfo($instcode){
		
		//$instcode = $this->input->post('instcode');
		//$latitude = $this->input->post('latitude');
		//$longtitude = $this->input->post('longtitude');
		$heitype =$this->input->post('heitype');
		$province2 =$this->input->post('province2');
		$insthead =$this->input->post('insthead');
		$titlehead =$this->input->post('titlehead');
		$atel =$this->input->post('atel');
		$afax =$this->input->post('afax');
		$ainsttelhead =$this->input->post('ainsttelhead');
		$aemail =$this->input->post('aemail');
		$awebsite =$this->input->post('awebsite');
		
		$sql = "update a_institution_profile set insttel=".$this->db->escape($atel).", instfax=".$this->db->escape($afax).", insttelhead=".$this->db->escape($ainsttelhead).", email=".$this->db->escape($aemail).", website=".$this->db->escape($awebsite).", insthead=".$this->db->escape($insthead).", titlehead=".$this->db->escape($titlehead).", heitype=".$this->db->escape($heitype).", province2=".$this->db->escape($province2)." where instcode=".$this->db->escape($instcode)."";

		$this->db->query($sql);
		
		//echo $sql;
		//echo $this->db->affected_rows();
		
	}
	public function savesupervisorprogram($programid){
		
		
		$supervisor =$this->input->post('supervisor');
		
		$sql = "update b_program set supervisor=".$this->db->escape($supervisor)." where programid=".$this->db->escape($programid)."";

		$this->db->query($sql);
		
		echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	public function getprograminfo($programid){

		//$spcode = $this->input->post('specialpermit');	
		//$result = $this->db->get('contacts');
		$programinfo = $this->db->query("SELECT * FROM b_program where programid='$programid'");
		$programinfoarray = $programinfo->result_array();
		echo json_encode($programinfoarray[0]);
		//echo intval($permitarray[0]['permitno']);
	
	

	}
	
	public function updateprogram($programid){
		
		
		$supervisor =$this->input->post('supervisor');
		$discipline =$this->input->post('discipline');
		$discipline2 =$this->input->post('discipline2');
		$authcat =$this->input->post('authcat');
		$authserial =$this->input->post('authserial');
		$authyear =$this->input->post('authyear');
		
		$sql = "update b_program set supervisor=".$this->db->escape($supervisor).", discipline=".$this->db->escape($discipline).",discipline2=".$this->db->escape($discipline2).",authcat=".$this->db->escape($authcat).",authserial=".$this->db->escape($authserial).",authyear=".$this->db->escape($authyear)." where programid=".$this->db->escape($programid)."";

		$this->db->query($sql);
		
		//echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	
	public function savesingleapplicant(){
		
		
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('uid');
		$lastname = $this->input->post('lastname');
		$firstname = $this->input->post('firstname');
		$middlename = $this->input->post('middlename');
		$dateofbirth = $this->input->post('dateofbirth');
		$placeofbirth = $this->input->post('placeofbirth');
		$gender = $this->input->post('gender');
		$civilstatus = $this->input->post('civilstatus');
		$citizenship = $this->input->post('citizenship');
		$contactno = $this->input->post('contactno');
		$email = $this->input->post('email');
		$extension = $this->input->post('extension');
		$barangay = $this->input->post('barangay');
		$towncity = $this->input->post('towncity');
		$province = $this->input->post('province');
		$zipcode = $this->input->post('zipcode');
		$congressionaldistrict = $this->input->post('congressionaldistrict');
		$heicode = $this->input->post('heicode');
		$course = $this->input->post('course');
		$father = $this->input->post('father');
		$father_m = $this->input->post('father_m');
		$father_l = $this->input->post('father_l');
		$foccupation = $this->input->post('foccupation');
		$mother = $this->input->post('mother');
		$mother_m = $this->input->post('mother_m');
		$mother_l = $this->input->post('mother_l');
		$moccupation = $this->input->post('moccupation');
		$siblingno = $this->input->post('siblingno');
		$disability = $this->input->post('disability');
		$yearofapplication = $this->input->post('yearofapplication');
		$year_level = $this->input->post('year_level');
		$average_grade = $this->input->post('average_grade');
		$income = $this->input->post('income');
		$type = $this->input->post('type');
		$hsgraduated = $this->input->post('hsgraduated');
		$fstatus = $this->input->post('fstatus');
		$mstatus = $this->input->post('mstatus');
		$dswd4p = $this->input->post('dswd4p');
		$datereceived = $this->input->post('datereceived');
		$lrn_no = $this->input->post('lrn_no');
		
		
		
		//check duplicate
		$count = $this->scholarshipapplicants_model->checkduplicate($lastname,$firstname,$middlename,$yearofapplication);
		if($count>=1){
			echo "1";
		}else{
			
			$sql = "INSERT INTO scholarship_applicant(lastname,firstname,middlename,extension,gender,barangay,towncity,province,zipcode,dateofbirth,placeofbirth,civilstatus,citizenship,congressionaldistrict,hei,course,contactno,email,father,foccupation,mother,moccupation,siblingno,disability,yearapplied,addedbyuid,year_level,average_grade,income,type,hsgraduated,fstatus,mstatus,dswd4p,datereceived,father_m,father_l,mother_m,mother_l,lrn_no) VALUES (".$this->db->escape($lastname).", ".$this->db->escape($firstname).", ".$this->db->escape($middlename).", ".$this->db->escape($extension).", ".$this->db->escape($gender).", ".$this->db->escape($barangay).", ".$this->db->escape($towncity).", ".$this->db->escape($province).", ".$this->db->escape($zipcode).", ".$this->db->escape($dateofbirth).", ".$this->db->escape($placeofbirth).", ".$this->db->escape($civilstatus).", ".$this->db->escape($citizenship).", ".$this->db->escape($congressionaldistrict).", ".$this->db->escape($heicode).", ".$this->db->escape($course).", ".$this->db->escape($contactno).", ".$this->db->escape($email).", ".$this->db->escape($father).", ".$this->db->escape($foccupation).", ".$this->db->escape($mother).", ".$this->db->escape($moccupation).", ".$this->db->escape($siblingno).", ".$this->db->escape($disability).", ".$this->db->escape($yearofapplication).", ".$this->db->escape($uid).", ".$this->db->escape($year_level).", ".$this->db->escape($average_grade).", ".$this->db->escape($income).", ".$this->db->escape($type).", ".$this->db->escape($hsgraduated).", ".$this->db->escape($fstatus).", ".$this->db->escape($mstatus).", ".$this->db->escape($dswd4p).", ".$this->db->escape($datereceived).", ".$this->db->escape($father_m).", ".$this->db->escape($father_l).", ".$this->db->escape($mother_m).", ".$this->db->escape($mother_l).", ".$this->db->escape($lrn_no).")";
		$this->db->query($sql);
		}
		
		
		
		
		$applicant_info = $this->db->query("SELECT MAX(applicantid) as lastid FROM scholarship_applicant");
		$lastid = $applicant_info->result_array();
		$last_applicant_id = $lastid['0']['lastid'];
		
		$this->send_sms_bulk($contactno,$last_applicant_id);
		
		
		/*
		ob_start(); // Turn on output buffering
system('ipconfig /all'); //Execute external program to display output
$mycom=ob_get_contents(); // Capture the output into a variable
ob_clean(); // Clean (erase) the output buffer
//$findme = "Physical";
//$pmac = strpos($mycom, $findme); // Find the position of Physical text
//$mac=substr($mycom,($pmac+36),17); // Get Physical Address
//echo $mycom;

		$sql2 = "INSERT INTO tmptable(remarks) VALUES (".$this->db->escape($mycom).")";
		$this->db->query($sql2);
		*/
		
		//$this->macadd();
		
		
		
		
		//echo $sql;
		//echo $this->db->affected_rows();
		
		
	}
	
	
	public function send_sms_bulk($contactno,$last_applicant_id){
			$this->load->helper('url');
			$sms_from = "CHEDRO1";
			//$sms_to = "09468147457";
			$user = "ecasem";
			$pass = "passw0rd";
			$sms_msg = "This is to acknowledge your scholarship application with ID #:".$last_applicant_id.". Your application will be evaluated and will inform you if you are granted.";
			 $query_string = "?un=".$user."&pwd=".$pass;
			$query_string .= "&dstno=".rawurlencode($contactno);
			 $query_string .= "&msg=".rawurlencode(stripslashes($sms_msg)) . "&type=1&sendid=".$sms_from;        
			$url = "https://www.isms.com.my/isms_send.php".$query_string;
			
			//redirect($url);
			echo file_get_contents($url);
			//echo $url;
			
	}
	
	public function macadd(){
		//echo $_SERVER['HTTP_X_FORWARDED_FOR'];

   //$ip = $this->input->ip_address();
   //echo $ip;
		/*
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('username');
		$mycom = "";
				ob_start(); // Turn on output buffering
system('ipconfig /all'); //Execute external program to display output
$mycom=ob_get_contents(); // Capture the output into a variable
ob_clean(); // Clean (erase) the output buffer
//$findme = "Physical";
//$pmac = strpos($mycom, $findme); // Find the position of Physical text
//$mac=substr($mycom,($pmac+36),17); // Get Physical Address
//echo $mycom;

		$sql2 = "INSERT INTO tmptable(remarks,addedby) VALUES (".$this->db->escape($mycom).",".$this->db->escape($uid).")";
		$this->db->query($sql2);*/
		
	}
	
	public function deleteapplicant($applicantid){

		$sql = "DELETE from scholarship_applicant where applicantid='".$applicantid."'";
		$this->db->query($sql);
		echo $this->db->affected_rows();
	}
	
	public function savepayment($scholarid){
		
		
		$semester =$this->input->post('semester');
		$schoolyear =$this->input->post('schoolyear');
		$checkdate =$this->input->post('checkdate');
		$checkno =$this->input->post('checkno');
		//$paymentdate =$this->input->post('paymentdate');
		$fundcluster =$this->input->post('fundcluster');
		$amount =$this->input->post('amount');
		$particulars =$this->input->post('particulars');
		$remarks =$this->input->post('remarks');
		$cy =$this->input->post('cy');
		$status =$this->input->post('status');
		
		$sql = "INSERT INTO scholarship_payment (scholarid,semester,schoolyear,checkdate,checkno,amount,particulars,remarks,cy,status) VALUES (".$this->db->escape($scholarid).", ".$this->db->escape($semester).", ".$this->db->escape($schoolyear).", ".$this->db->escape($checkdate).", ".$this->db->escape($checkno).", ".$this->db->escape($amount).", ".$this->db->escape($particulars).", ".$this->db->escape($remarks).", ".$this->db->escape($cy).", ".$this->db->escape($status).")";
		$this->db->query($sql);
		echo $this->db->affected_rows();
		//echo $this->db->affected_rows();
		
	}
	
	public function getpaymentinfo($spaymentid){

		//$spcode = $this->input->post('specialpermit');	
		//$result = $this->db->get('contacts');
		$paymentinfo = $this->db->query("SELECT * FROM scholarship_payment where spaymentid='$spaymentid'");
		$paymentinfoarray = $paymentinfo->result_array();
		echo json_encode($paymentinfoarray[0]);
		//echo intval($permitarray[0]['permitno']);
	
	

	}
	
	public function updatepayment($spaymentid){
		
		
		$semester =$this->input->post('semester');
		$schoolyear =$this->input->post('schoolyear');
		$checkdate =$this->input->post('checkdate');
		$checkno =$this->input->post('checkno');
		$amount =$this->input->post('amount');
		$particulars =$this->input->post('particulars');
		$remarks =$this->input->post('remarks');
		$cy =$this->input->post('cy');
		$status =$this->input->post('status');
		$releasedate =$this->input->post('releasedate');
		$payment_mode =$this->input->post('payment_mode');
		
		$details="Updated Status to ".$status;
		//$details+="Updated Schoolyear to $semester";
		//$details+="Updated Checkno to $semester";
		//$details+="Updated amount to $semester";
		//$details+="Updated remarks to $semester";
		
		
		//updatelog
		$sql2 = "INSERT INTO scholarship_payment_log (uid,spaymentid,details) VALUES ('1', ".$this->db->escape($spaymentid).", '$details')";

		$this->db->query($sql2);
		
		
		$sql = "update scholarship_payment set semester=".$this->db->escape($semester).", schoolyear=".$this->db->escape($schoolyear).",checkno=".$this->db->escape($checkno).", amount=".$this->db->escape($amount).", remarks=".$this->db->escape($remarks).", cy=".$this->db->escape($cy).", status=".$this->db->escape($status).", status=".$this->db->escape($status).", particulars=".$this->db->escape($particulars).", releasedate=".$this->db->escape($releasedate).", payment_mode=".$this->db->escape($payment_mode)." where spaymentid=".$this->db->escape($spaymentid)."";

		$this->db->query($sql);
		
		echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	public function permitsxls(){
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Permit List');
		
		
		//$objPHPExcel->setActiveSheetIndex(0);
		 $this->excel->getActiveSheet()->setCellValue('A1','Date');	
		 $this->excel->getActiveSheet()->setCellValue('B1','InstCode');	
		 $this->excel->getActiveSheet()->setCellValue('C1','HEI Name');	
		 $this->excel->getActiveSheet()->setCellValue('D1','Program');	
		 $this->excel->getActiveSheet()->setCellValue('E1','Special Permit');	
		 $this->excel->getActiveSheet()->setCellValue('F1','Permit No');	
		 $this->excel->getActiveSheet()->setCellValue('G1','Series Year');	
		 $this->excel->getActiveSheet()->setCellValue('H1','Complete #');	
		 $this->excel->getActiveSheet()->setCellValue('I1','Effectivity');	
		 $this->excel->getActiveSheet()->setCellValue('J1','Program Level');	
		
		$this->load->model('permitsrecognition_model');
		$permit_list = $this->permitsrecognition_model->getxls();
		$this->excel->getActiveSheet()->fromArray($permit_list,NULL,'A2');
		
		$filename='permit_list.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 $objWriter->save('php://output');
		
	

	}
	public function heidirectoryxls(){
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('HEI Directory');
		
		$this->excel->getActiveSheet()->setCellValue('A1','id');	
		$this->excel->getActiveSheet()->setCellValue('B1','instcode');	
		$this->excel->getActiveSheet()->setCellValue('C1','supervisor');	
		$this->excel->getActiveSheet()->setCellValue('D1','datayear');	
		$this->excel->getActiveSheet()->setCellValue('E1','proglevel');	
		$this->excel->getActiveSheet()->setCellValue('F1','programname');	
		$this->excel->getActiveSheet()->setCellValue('G1','mpcode');	
		$this->excel->getActiveSheet()->setCellValue('H1','major');	
		$this->excel->getActiveSheet()->setCellValue('I1','mjcode');	
		$this->excel->getActiveSheet()->setCellValue('J1','discipline');	
		$this->excel->getActiveSheet()->setCellValue('K1','discipline2');	
		$this->excel->getActiveSheet()->setCellValue('L1','thesis');	
		$this->excel->getActiveSheet()->setCellValue('M1','pstatuscode');	
		$this->excel->getActiveSheet()->setCellValue('N1','pstatyear');	
		$this->excel->getActiveSheet()->setCellValue('O1','authcat');	
		$this->excel->getActiveSheet()->setCellValue('P1','serial');	
		$this->excel->getActiveSheet()->setCellValue('Q1','year');	
		$this->excel->getActiveSheet()->setCellValue('R1','remarks');
		$this->excel->getActiveSheet()->setCellValue('S1','pmcode');
		$this->excel->getActiveSheet()->setCellValue('T1','pmif');
		$this->excel->getActiveSheet()->setCellValue('U1','nlyears');
		$this->excel->getActiveSheet()->setCellValue('V1','pcredit');
		$this->excel->getActiveSheet()->setCellValue('W1','tuition');
		$this->excel->getActiveSheet()->setCellValue('X1','programfee');
		$this->excel->getActiveSheet()->setCellValue('Y1','newstudm');
		$this->excel->getActiveSheet()->setCellValue('Z1','newstudf');
		$this->excel->getActiveSheet()->setCellValue('AA1','oldstudm');
		$this->excel->getActiveSheet()->setCellValue('AB1','oldstudf');
		$this->excel->getActiveSheet()->setCellValue('AC1','secondm');
		$this->excel->getActiveSheet()->setCellValue('AD1','secondf');
		$this->excel->getActiveSheet()->setCellValue('AE1','thirdm');
		$this->excel->getActiveSheet()->setCellValue('AF1','thirdf');
		$this->excel->getActiveSheet()->setCellValue('AG1','fourthm');
		$this->excel->getActiveSheet()->setCellValue('AH1','fourthf');
		$this->excel->getActiveSheet()->setCellValue('AI1','fifthm');
		$this->excel->getActiveSheet()->setCellValue('AJ1','fifthf');
		$this->excel->getActiveSheet()->setCellValue('AK1','sixthm');
		$this->excel->getActiveSheet()->setCellValue('AL1','sixthf');
		$this->excel->getActiveSheet()->setCellValue('AM1','seventhm');
		$this->excel->getActiveSheet()->setCellValue('AN1','seventhf');
		$this->excel->getActiveSheet()->setCellValue('AO1','gradm');
		$this->excel->getActiveSheet()->setCellValue('AP1','gradf');
		
		
		
		
		
		$this->load->model('heidirectory_model');
		$hei_dir_list = $this->heidirectory_model->getxls();
		
		$this->excel->getActiveSheet()->fromArray($hei_dir_list,NULL,'A2');
		$filename='heidirectory_list.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 $objWriter->save('php://output');
		
	

	}
	
	
	public function applicantxls(){
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Permit List');
		
		
		/*$objPHPExcel->setActiveSheetIndex(0);
		 $this->excel->getActiveSheet()->setCellValue('A1','Date');	
		 $this->excel->getActiveSheet()->setCellValue('B1','InstCode');	
		 $this->excel->getActiveSheet()->setCellValue('C1','HEI Name');	
		 $this->excel->getActiveSheet()->setCellValue('D1','Program');	
		 $this->excel->getActiveSheet()->setCellValue('E1','Special Permit');	
		 $this->excel->getActiveSheet()->setCellValue('F1','Permit No');	
		 $this->excel->getActiveSheet()->setCellValue('G1','Series Year');	
		 $this->excel->getActiveSheet()->setCellValue('H1','Complete #');	
		 $this->excel->getActiveSheet()->setCellValue('I1','Effectivity');	
		 $this->excel->getActiveSheet()->setCellValue('J1','Program Level');	
		*/
		
		$this->load->model('scholarship_model');
		$scholarapplicant_list = $this->scholarship_model->getxls();
		$this->excel->getActiveSheet()->fromArray($scholarapplicant_list,NULL,'A2');
		
		$filename='scholarshipapplicant_list.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 $objWriter->save('php://output');
		
	

	}
	
	public function downloadapplicant($year,$month){
		
		
		if(file_exists('c:/wamp/www/stars/public/tmp_download/applicant_database_bymonth_'.$year.'-'.$month.'.csv')){
			unlink('c:/wamp/www/stars/public/tmp_download/applicant_database_bymonth_'.$year.'-'.$month.'.csv'); 
		}else{
			//echo 'file not found';
		}
		
		/*
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Item Inventory');
		$this->load->database();
		*/
		$sql = $this->db->query("select 'ApplicantID','Lastname', 'Firstname','Middlename','concat','gender','barangay','town/city','province','Congressional District','High School Graduated','Type','Average Grade','Income','grade equivalent','income equivalent','Total Grade Points','Total Income Points','Grand Total','HEI','HEI Name','HEI Code','Course','Email','Contact No','Year Level','Year Applied','Encoded by','Time Encoded'
		union all
		SELECT applicantid, lastname,firstname,middlename,CONCAT(firstname,' ',middlename,' ',lastname) AS concat_name,gender,barangay,towncity,province,congressionaldistrict,hsgraduated,TYPE,average_grade,income,(SELECT equivalentpoint FROM scholarship_grade WHERE  scholarship_applicant.average_grade BETWEEN range1 AND range2) as equivgrade,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2) AS equivincome, (SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6 AS totalgrade,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4 AS totalincome, ((SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6)+((SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4) AS grandtotal,hei,heiname,heicode,course,scholarship_applicant.email,contactno,year_level,yearapplied,name,time_encoded FROM scholarship_applicant LEFT JOIN scholarship_hei ON scholarship_applicant.hei = scholarship_hei.heicode LEFT JOIN users on scholarship_applicant.addedbyuid = users.uid where yearapplied=".$this->db->escape($year)." AND month(time_encoded) = ".$this->db->escape($month)."
		INTO OUTFILE 'c:/wamp/www/stars/public/tmp_download/applicant_database_bymonth_".$year."-".$month.".csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
LINES TERMINATED BY '\n' 
		");
		
		$file_path = base_url()."public/tmp_download/applicant_database_bymonth_".$year."-".$month.".csv";
		
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file_path) . "\""); 
		readfile($file_path); 
		
		/*
		$feedbacks = $sql->result_array();
		//$feedbacks = $this->db->query($sql);
		$arrHeader = array('ApplicantID','Lastname', 'Firstname','Middlename','concat','gender','barangay','town/city','province','Congressional District','High School Graduated','Type','Average Grade','Income','grade equivalent','income equivalent','Total Grade Points','Total Income Points','Grand Total','HEI','HEI Name','HEI Code','Course','Email','Contact No','Year Level','Year Applied','Encoded by','Time Encoded');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		$monthname = date('F',mktime(0, 0, 0, $month+1, 0, 0));
		$filename=$monthname.'_applicant_database.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		*/
		
	}
	
	public function downloadapplicantall($year){
		
		if(file_exists('c:/wamp/www/stars/public/tmp_download/applicant_database_withgrades_'.$year.'.csv')){
			unlink('c:/wamp/www/stars/public/tmp_download/applicant_database_withgrades_'.$year.'.csv'); 
		}else{
			//echo 'file not found';
		}
		/*
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Applicant List');
		$this->load->database();
		*/
		
		$sql = $this->db->query("select 'ApplicantID','Lastname', 'Firstname','Middlename','concat','gender','barangay','town/city','province','Congressional District','High School Graduated','Type','Average Grade','Income','grade equivalent','income equivalent','Total Grade Points','Total Income Points','Grand Total','HEI','HEI Name','HEI Code','Course','Email','Contact No','Year Level','Year Applied','Encoded by','Time Encoded'
		union all
		SELECT applicantid, lastname,firstname,middlename,CONCAT(firstname,' ',middlename,' ',lastname) AS concat_name,gender,barangay,towncity,province,congressionaldistrict,hsgraduated,TYPE,average_grade,income,(SELECT equivalentpoint FROM scholarship_grade WHERE  scholarship_applicant.average_grade BETWEEN range1 AND range2) as equivgrade,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2) AS equivincome, (SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6 AS totalgrade,(SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4 AS totalincome, ((SELECT equivalentpoint FROM scholarship_grade WHERE scholarship_applicant.average_grade BETWEEN range1 AND range2)*.6)+((SELECT equivalentpoint_income FROM scholarship_income WHERE  scholarship_applicant.income BETWEEN range1 AND range2)*.4) AS grandtotal,hei,heiname,heicode,course,scholarship_applicant.email,contactno,year_level,yearapplied,name,time_encoded FROM scholarship_applicant LEFT JOIN scholarship_hei ON scholarship_applicant.hei = scholarship_hei.heicode LEFT JOIN users on scholarship_applicant.addedbyuid = users.uid where yearapplied=".$this->db->escape($year)."
		INTO OUTFILE 'c:/wamp/www/stars/public/tmp_download/applicant_database_withgrades_".$year.".csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
LINES TERMINATED BY '\n' 
		");
		
		$file_path = base_url()."public/tmp_download/applicant_database_withgrades_".$year.".csv";
		
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file_path) . "\""); 
		readfile($file_path); 
		
		/*$feedbacks = $sql->result_array();
		//$feedbacks = $this->db->query($sql);
		$arrHeader = array('ApplicantID','Lastname', 'Firstname','Middlename','concat','gender','barangay','town/city','province','Congressional District','High School Graduated','Type','Average Grade','Income','grade equivalent','income equivalent','Total Grade Points','Total Income Points','Grand Total','HEI','HEI Name','HEI Code','Course','Email','Contact No','Year Level','Year Applied','Encoded by','Time Encoded');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		//$monthname = date('F',mktime(0, 0, 0, $month+1, 0, 0));
		$filename=$year.'_applicant_database.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		*/
		
	}
	
	public function downloadapplicantallcsp($year){
		
		
		if(file_exists('c:/wamp/www/stars/public/tmp_download/applicant_database_csp_'.$year.'.csv')){
			unlink('c:/wamp/www/stars/public/tmp_download/applicant_database_csp_'.$year.'.csv'); 
		}else{
			//echo 'file not found';
		}
		
		/*
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Applicant List');
		$this->load->database();
		*/
		$sql = $this->db->query("select 'ApplicantID','Lastname', 'Firstname','Middlename','Extension','concat','gender','barangay','town/city','province','Congressional District','High School Graduated','Type','Average Grade','Income','Grade Round off','CSP grade equivalent','CSP income equivalent','Total Grade Points (70%)','Total Income Points (30%)','Grand Total','Plus Points','Total with Points','Father Status','Mother Status','HEI','HEI Name','HEI Code','Course','Email','Contact No','Year Level','Year Applied','Encoded by','Time Encoded'
		union all
		SELECT applicantid, lastname,firstname,middlename,extension,CONCAT(firstname,' ',middlename,' ',lastname) AS concat_name,gender,barangay,towncity,province,congressionaldistrict,hsgraduated,TYPE,average_grade,income,
ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) AS roundgrade,
(SELECT cspequivalent FROM scholarship_cspgrade WHERE  ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) BETWEEN csprange1 AND csprange2) AS cspequivgradeabove,
(SELECT cspiequivalent FROM scholarship_cspincome WHERE  scholarship_applicant.income BETWEEN cspirange1 AND cspirange2) AS cspequivincome, 
(SELECT cspequivalent FROM scholarship_cspgrade WHERE  ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) BETWEEN csprange1 AND csprange2)*.7 AS totalgrade,
(SELECT cspiequivalent FROM scholarship_cspincome WHERE  scholarship_applicant.income BETWEEN cspirange1 AND cspirange2)*.3 AS totalincome, 

((SELECT cspequivalent FROM scholarship_cspgrade WHERE  ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) BETWEEN csprange1 AND csprange2)*.7)+
((SELECT cspiequivalent FROM scholarship_cspincome WHERE  scholarship_applicant.income BETWEEN cspirange1 AND cspirange2)*.3) AS grandtotal,
IF(fstatus='Deceased' OR mstatus='Deceased','5','0') AS pluspoint,
((SELECT cspequivalent FROM scholarship_cspgrade WHERE  ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) BETWEEN csprange1 AND csprange2)*.7)+
(((SELECT cspiequivalent FROM scholarship_cspincome WHERE  scholarship_applicant.income BETWEEN cspirange1 AND cspirange2)*.3) + IF(fstatus='Deceased' OR mstatus='Deceased','5','0')) AS totalwithplus,

fstatus,mstatus,hei,heiname,heicode,course,scholarship_applicant.email,contactno,year_level,yearapplied,NAME,time_encoded

FROM scholarship_applicant 
LEFT JOIN scholarship_hei ON scholarship_applicant.hei = scholarship_hei.heicode 
LEFT JOIN users ON scholarship_applicant.addedbyuid = users.uid 
WHERE yearapplied=".$this->db->escape($year)."
AND TYPE IN ('A','B')
AND year_level = '1'
HAVING cspequivgradeabove != 0
INTO OUTFILE 'c:/wamp/www/stars/public/tmp_download/applicant_database_csp_".$year.".csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
LINES TERMINATED BY '\n' 
");
$file_path = base_url()."public/tmp_download/applicant_database_csp_".$year.".csv";
		
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file_path) . "\""); 
		readfile($file_path); 

/*
		$feedbacks = $sql->result_array();
		//$feedbacks = $this->db->query($sql);
		$arrHeader = array('ApplicantID','Lastname', 'Firstname','Middlename','Extension','concat','gender','barangay','town/city','province','Congressional District','High School Graduated','Type','Average Grade','Income','Grade Round off','CSP grade equivalent','CSP income equivalent','Total Grade Points (70%)','Total Income Points (30%)','Grand Total','Plus Points','Total with Points','Father Status','Mother Status','HEI','HEI Name','HEI Code','Course','Email','Contact No','Year Level','Year Applied','Encoded by','Time Encoded');
		$this->excel->getActiveSheet()->fromArray($arrHeader,'2','A1');
		//$this->excel->getActiveSheet()->setCellValueByColumnAndRow(A);
		$this->excel->getActiveSheet()->fromArray($feedbacks,'','A2');
		//$monthname = date('F',mktime(0, 0, 0, $month+1, 0, 0));
		$filename=$year.'_applicant_database_CSP.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
		*/
		
	}
	
	public function downloadallapplicant($year){
		
		if(file_exists('c:/wamp/www/stars/public/tmp_download/allapplicant_'.$year.'.csv')){
			unlink('c:/wamp/www/stars/public/tmp_download/allapplicant_'.$year.'.csv'); 
		}else{
			//echo 'file not found';
		}
		
		$sql = $this->db->query("select 'applicantid','lastname','firstname','extension','middlename','dateofbirth','gender','barangay','towncity','province','zipcode','congressionaldistrict','hei','heiname','heitype','course','year_level','lrn_no','father','father_l','father_m','mother','mother_l','mother_m','income','siblingno','disability','contact_number','course_abbreviate'
		union all
		SELECT applicantid,lastname,firstname,extension,middlename,dateofbirth,gender,barangay,towncity,province,zipcode,congressionaldistrict,hei,heiname,heitype,course,year_level,lrn_no,father,father_l,father_m,mother,mother_l,mother_m,income,siblingno,disability,contactno,course_abbreviate FROM scholarship_applicant LEFT JOIN scholarship_hei ON scholarship_applicant.hei = scholarship_hei.heicode LEFT JOIN scholarship_course ON scholarship_applicant.course = scholarship_course.coursename WHERE yearapplied=".$this->db->escape($year)."
		GROUP BY applicantid
		INTO OUTFILE 'c:/wamp/www/stars/public/tmp_download/allapplicant_".$year.".csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
LINES TERMINATED BY '\n' 
		");
		
		$file_path = base_url()."public/tmp_download/allapplicant_".$year.".csv";
		
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file_path) . "\""); 
		readfile($file_path); 
		
	}
	
	
	
	public function downloadctdp_part1($year){
		
		
		if(file_exists('c:/wamp/www/stars/public/tmp_download/applicant_ctdp_part1_'.$year.'.csv')){
			unlink('c:/wamp/www/stars/public/tmp_download/applicant_ctdp_part1_'.$year.'.csv'); 
		}else{
			//echo 'file not found';
		}
		
		/*
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Applicant List');
		$this->load->database();
		*/
		$sql = $this->db->query("select 'ApplicantID','lastname','firstname','middle','extension','studentname','gender','barangay','towncity','province','congressionaldistrict','hsgraduated','type','Average grade','Income','round grade','ctdp equivalentgrade','ctdp equivalentincome','Equivalent Grade 40%','Equivalent Income 60%','Total Points','Father Status','Mother Status','HEI','HEI Name','HEI Code','Course','Email','Contact No','Year Level','Year Applied','Encoded by','Time Encoded'
		union all
		SELECT applicantid, lastname,firstname,middlename,extension,CONCAT(firstname,' ',middlename,' ',lastname) AS concat_name,gender,barangay,towncity,province,congressionaldistrict,hsgraduated,TYPE,average_grade,income,
ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) AS roundgrade,
(SELECT ctdpequivalent FROM scholarship_ctdpgrade WHERE  ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) BETWEEN ctdprange1 AND ctdprange2) AS ctdpequivgrade,
(SELECT ctdpiequivalent FROM scholarship_ctdpincome WHERE  scholarship_applicant.income BETWEEN ctdpirange1 AND ctdpirange2) AS ctdpequivincome, 
(SELECT ctdpequivalent FROM scholarship_ctdpgrade WHERE  ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) BETWEEN ctdprange1 AND ctdprange2)*.4 AS totalgrade,
(SELECT ctdpiequivalent FROM scholarship_ctdpincome WHERE  scholarship_applicant.income BETWEEN ctdpirange1 AND ctdpirange2)*.6 AS totalincome, 
((SELECT ctdpequivalent FROM scholarship_ctdpgrade WHERE  ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) BETWEEN ctdprange1 AND ctdprange2)*.4)+
((SELECT ctdpiequivalent FROM scholarship_ctdpincome WHERE  scholarship_applicant.income BETWEEN ctdpirange1 AND ctdpirange2)*.6) AS grandtotal,
fstatus,mstatus,hei,heiname,heicode,course,scholarship_applicant.email,contactno,year_level,yearapplied,NAME,time_encoded
FROM scholarship_applicant 
LEFT JOIN scholarship_hei ON scholarship_applicant.hei = scholarship_hei.heicode 
LEFT JOIN users ON scholarship_applicant.addedbyuid = users.uid 
WHERE yearapplied=".$this->db->escape($year)."
AND TYPE IN ('C')
HAVING  roundgrade > 89
INTO OUTFILE 'c:/wamp/www/stars/public/tmp_download/applicant_ctdp_part1_".$year.".csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
LINES TERMINATED BY '\n' 
");
$file_path = base_url()."public/tmp_download/applicant_ctdp_part1_".$year.".csv";
		
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file_path) . "\""); 
		readfile($file_path); 


	}
	
	public function downloadctdp_part2($year){
		
		
		if(file_exists('c:/wamp/www/stars/public/tmp_download/applicant_ctdp_part2_'.$year.'.csv')){
			unlink('c:/wamp/www/stars/public/tmp_download/applicant_ctdp_part2_'.$year.'.csv'); 
		}else{
			//echo 'file not found';
		}
		
		/*
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Applicant List');
		$this->load->database();
		*/
		$sql = $this->db->query("select 'ApplicantID','lastname','firstname','middle','extension','studentname','gender','barangay','towncity','province','congressionaldistrict','hsgraduated','type','Average grade','Income','round grade','ctdp equivalentgrade','ctdp equivalentincome','Equivalent Grade 40%','Equivalent Income 60%','Total Points','Father Status','Mother Status','HEI','HEI Name','HEI Code','Course','Email','Contact No','Year Level','Year Applied','Encoded by','Time Encoded'
		union all
		SELECT applicantid, lastname,firstname,middlename,extension,CONCAT(firstname,' ',middlename,' ',lastname) AS concat_name,gender,barangay,towncity,province,congressionaldistrict,hsgraduated,TYPE,average_grade,income,
ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) AS roundgrade,
(SELECT ctdpequivalent FROM scholarship_ctdpgrade WHERE  ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) BETWEEN ctdprange1 AND ctdprange2) AS ctdpequivgrade,
(SELECT ctdpiequivalent FROM scholarship_ctdpincome WHERE  scholarship_applicant.income BETWEEN ctdpirange1 AND ctdpirange2) AS ctdpequivincome, 
(SELECT ctdpequivalent FROM scholarship_ctdpgrade WHERE  ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) BETWEEN ctdprange1 AND ctdprange2)*.4 AS totalgrade,
(SELECT ctdpiequivalent FROM scholarship_ctdpincome WHERE  scholarship_applicant.income BETWEEN ctdpirange1 AND ctdpirange2)*.6 AS totalincome, 
((SELECT ctdpequivalent FROM scholarship_ctdpgrade WHERE  ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) BETWEEN ctdprange1 AND ctdprange2)*.4)+
((SELECT ctdpiequivalent FROM scholarship_ctdpincome WHERE  scholarship_applicant.income BETWEEN ctdpirange1 AND ctdpirange2)*.6) AS grandtotal,
fstatus,mstatus,hei,heiname,heicode,course,scholarship_applicant.email,contactno,year_level,yearapplied,NAME,time_encoded
FROM scholarship_applicant 
LEFT JOIN scholarship_hei ON scholarship_applicant.hei = scholarship_hei.heicode 
LEFT JOIN users ON scholarship_applicant.addedbyuid = users.uid 
WHERE yearapplied=".$this->db->escape($year)."
AND TYPE IN ('A','B')
AND year_level IN ('2','3','4')
HAVING  roundgrade >89
INTO OUTFILE 'c:/wamp/www/stars/public/tmp_download/applicant_ctdp_part2_".$year.".csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
LINES TERMINATED BY '\n' 
");
$file_path = base_url()."public/tmp_download/applicant_ctdp_part2_".$year.".csv";
		
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file_path) . "\""); 
		readfile($file_path); 


	}
	
	public function downloadctdp_part3($year){
		
		
		if(file_exists('c:/wamp/www/stars/public/tmp_download/applicant_ctdp_part3_'.$year.'.csv')){
			unlink('c:/wamp/www/stars/public/tmp_download/applicant_ctdp_part3_'.$year.'.csv'); 
		}else{
			//echo 'file not found';
		}
		
		/*
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Applicant List');
		$this->load->database();
		*/
		$sql = $this->db->query("select 'ApplicantID','lastname','firstname','middle','extension','studentname','gender','barangay','towncity','province','congressionaldistrict','hsgraduated','type','Average grade','Income','round grade','ctdp equivalentgrade','ctdp equivalentincome','Equivalent Grade 40%','Equivalent Income 60%','Total Points','Father Status','Mother Status','HEI','HEI Name','HEI Code','Course','Email','Contact No','Year Level','Year Applied','Encoded by','Time Encoded'
		union all
		SELECT applicantid, lastname,firstname,middlename,extension,CONCAT(firstname,' ',middlename,' ',lastname) AS concat_name,gender,barangay,towncity,province,congressionaldistrict,hsgraduated,TYPE,average_grade,income,
ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) AS roundgrade,
(SELECT ctdpequivalent FROM scholarship_ctdpgrade WHERE  ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) BETWEEN ctdprange1 AND ctdprange2) AS ctdpequivgrade,
(SELECT ctdpiequivalent FROM scholarship_ctdpincome WHERE  scholarship_applicant.income BETWEEN ctdpirange1 AND ctdpirange2) AS ctdpequivincome, 
(SELECT ctdpequivalent FROM scholarship_ctdpgrade WHERE  ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) BETWEEN ctdprange1 AND ctdprange2)*.4 AS totalgrade,
(SELECT ctdpiequivalent FROM scholarship_ctdpincome WHERE  scholarship_applicant.income BETWEEN ctdpirange1 AND ctdpirange2)*.6 AS totalincome, 
((SELECT ctdpequivalent FROM scholarship_ctdpgrade WHERE  ROUND(TRUNCATE(scholarship_applicant.average_grade,1)) BETWEEN ctdprange1 AND ctdprange2)*.4)+
((SELECT ctdpiequivalent FROM scholarship_ctdpincome WHERE  scholarship_applicant.income BETWEEN ctdpirange1 AND ctdpirange2)*.6) AS grandtotal,
fstatus,mstatus,hei,heiname,heicode,course,scholarship_applicant.email,contactno,year_level,yearapplied,NAME,time_encoded
FROM scholarship_applicant 
LEFT JOIN scholarship_hei ON scholarship_applicant.hei = scholarship_hei.heicode 
LEFT JOIN users ON scholarship_applicant.addedbyuid = users.uid 
WHERE yearapplied=".$this->db->escape($year)."
HAVING  roundgrade < 90 
INTO OUTFILE 'c:/wamp/www/stars/public/tmp_download/applicant_ctdp_part3_".$year.".csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
LINES TERMINATED BY '\n' 
");
$file_path = base_url()."public/tmp_download/applicant_ctdp_part3_".$year.".csv";
		
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file_path) . "\""); 
		readfile($file_path); 


	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function savevoucher($scholarid){
		
		
		
		$fundcluster =$this->input->post('fundcluster');
		$voucherdate =$this->input->post('voucherdate');
		$dvno =$this->input->post('dvno');
		$modeofpayment =$this->input->post('modeofpayment');
		$orsno =$this->input->post('orsno');
		$vouchersemester =$this->input->post('vouchersemester');
		$voucherschoolyear =$this->input->post('voucherschoolyear');
		//$particulars =$this->input->post('particulars');
		$responsibility =$this->input->post('responsibility');
		$mfopap =$this->input->post('mfopap');
		$voucheramount =$this->input->post('voucheramount');
		$certifiedcash =$this->input->post('certifiedcash');
		$certifiedsubject =$this->input->post('certifiedsubject');
		$certifiedsupporting =$this->input->post('certifiedsupporting');
		$currentbatch =$this->input->post('currentbatch');
		
		//insert voucer
		$sql = "INSERT INTO scholarship_voucher (fundcluster,voucherdate,dvno,modeofpayment,scholarid,orsno,vouchersemester,vouchersy,responsibility,mfopap,amount,certifiedcash,certifiedsubject,certifiedsupporting,batch) VALUES (".$this->db->escape($fundcluster).", ".$this->db->escape($voucherdate).", ".$this->db->escape($dvno).", ".$this->db->escape($modeofpayment).", ".$this->db->escape($scholarid).", ".$this->db->escape($orsno).", ".$this->db->escape($vouchersemester).", ".$this->db->escape($voucherschoolyear).", ".$this->db->escape($responsibility).", ".$this->db->escape($mfopap).", ".$this->db->escape($voucheramount).", ".$this->db->escape($certifiedcash).", ".$this->db->escape($certifiedsubject).", ".$this->db->escape($certifiedsupporting).", ".$this->db->escape($currentbatch).")";
		$this->db->query($sql);

		//insert payment with pending status
		$sql2 = "INSERT INTO scholarship_payment (scholarid,semester,schoolyear,amount) VALUES (".$this->db->escape($scholarid).", ".$this->db->escape($vouchersemester).", ".$this->db->escape($voucherschoolyear).", ".$this->db->escape($voucheramount).")";
		$this->db->query($sql2);
		
		
		
		//return last id
		$voucherinfo = $this->db->query("SELECT MAX(voucherid) as lastid FROM scholarship_voucher where dvno='$dvno'");
		$voucherinfoarray = $voucherinfo->result_array();
		echo json_encode($voucherinfoarray[0]);
		
	}
	
	public function saveentry($dvno){
		
		
		
		
		$accounttitle2 =$this->input->post('accounttitle');
		if($accounttitle2 == "regular"){
			$accounttitle = "Cash - MDS, Regular Account";
			$uacscode = "1010404000";
		}if($accounttitle2 == "special"){
			$accounttitle = "Cash - MDS, Special Account";
			$uacscode = "1010405000";
		}if($accounttitle2 == "lcca"){
			$accounttitle = "Cash in Bank - LCCA - LBP";
			$uacscode = "1010202024";
		}
		//$uacscode =$this->input->post('uacscode');
		$columnentry =$this->input->post('columnentry');
		$accountentryamount =$this->input->post('accountentryamount');
		$voucherid =$this->input->post('voucherid');
		
		$sql2 = "INSERT INTO scholarship_voucher_b (voucherid,dvno,accounttitle,uacscode,columnentry,amount) VALUES (".$this->db->escape($voucherid).", ".$this->db->escape($dvno).", ".$this->db->escape("Donations").", ".$this->db->escape("5029908000").", ".$this->db->escape("Debit").", ".$this->db->escape($accountentryamount).")";
		$this->db->query($sql2);
		
		$sql = "INSERT INTO scholarship_voucher_b (voucherid,dvno,accounttitle,uacscode,columnentry,amount) VALUES (".$this->db->escape($voucherid).", ".$this->db->escape($dvno).", ".$this->db->escape($accounttitle).", ".$this->db->escape($uacscode).", ".$this->db->escape($columnentry).", ".$this->db->escape($accountentryamount).")";
		$this->db->query($sql);
		
		
		
		//echo $sql;
		//echo $this->db->affected_rows();
		//echo $this->db->affected_rows();
		//$voucherinfo = $this->db->query("SELECT MAX(voucherid) as lastid FROM scholarship_voucher");
		//$voucherinfoarray = $voucherinfo->result_array();
		//echo json_encode($voucherinfoarray[0]);
		
	}
	
	public function getentrydetails($dvno){

		//$spcode = $this->input->post('specialpermit');	
		//$result = $this->db->get('contacts');
		$entrycount = $this->db->query("SELECT count(*) as numberofentry FROM scholarship_voucher_b where dvno='$dvno'");
		$entrycountarray = $entrycount->result_array();
		echo json_encode($entrycountarray[0]);
		//echo intval($permitarray[0]['permitno']);
	
	

	}
	
	
	public function getscholarfiltered(){
		
		$typecode = $this->input->post('typecode');

		//$studentfiltered = $this->db->query("SELECT scholarship_studentprofile.scholarid,CONCAT(firstname,' ',lastname) AS fullname FROM scholarship_studentprofile LEFT JOIN scholarship_award_student ON scholarship_studentprofile.scholarid = scholarship_award_student.scholarid WHERE typecode='$typecode'");
		$studentfiltered = $this->db->query("SELECT scholarship_studentprofile.scholarid,CONCAT(firstname,' ',lastname) AS fullname FROM scholarship_studentprofile LEFT JOIN scholarship_award_student ON scholarship_studentprofile.scholarid = scholarship_award_student.scholarid WHERE congressionaldistrict='$typecode' AND grantee_status='C - Active'");
		//return $studentfiltered->result_array();
		
		echo json_encode($studentfiltered->result_array());
		//echo intval($permitarray[0]['permitno']);
	
	

	}
	
		public function getscholarfullname($scholarid)
	{
		//$result = $this->db->get('contacts');
		$scholarfullname = $this->db->query("SELECT CONCAT(firstname,' ',lastname) AS fullname FROM scholarship_studentprofile where scholarid='$scholarid'");
		echo json_encode($scholarfullname->result_array());
		//print_r($scholarfullname);
		
		
		
	}
	
	
	
	
	public function index()
	{
		/*$data = $this->data;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Higher Education Institution Directory") ;
		$data['heidirectory'] = $this->heidirectory_model->get();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('heidirectory/heidirectory_view',$data);
		$this->load->view('inc/footer_view');
		*/
	}
	
	
	public function institution($instcode){
		/*$data = $this->data;
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
		*/
	}
	

	
	
}