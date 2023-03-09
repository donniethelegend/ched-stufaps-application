<?php

class Home extends CI_Controller
{
	
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

		$this->load->view('scholarshipapplication/homeboxed_view',$data);
		$this->load->view('inc_boxed/footer_view',$js);
		
	}
	
	public function testmakedir()
	{
            
            
           ///TEST METHOD ONLY
 $result_upload = $this->onlineapplication_model->upload_attachment(3249);//result is the application id
	echo var_dump($result_upload);
	}
        
        
        
        
	
	public function verify()
	{

			$secret_key = "6LfvgcgUAAAAAM5A1CurBjkR-WSGM17veynXB4yd";
			$captcha = $this->input->post('g-recaptcha-response');
			$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$captcha);
			
			echo $response;
		
	}
	
	
	
	public function submitform(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			
			
			$complete_mobile = $this->input->post('mobile_prefix').$this->input->post('mobile_number');
			
			
			
                        
                        
			$formsubmitted =array(
		'lname'=>$this->input->post('lname'),
		'extension'=>$this->input->post('extension'),
		'fname'=>$this->input->post('fname'),
		'mname'=>$this->input->post('mname'),
		'birth-month'=>$this->input->post('birth-month'),
		'birth-day'=>$this->input->post('birth-day'),
		'birth-year'=>$this->input->post('birth-year'),
		'placeofbirth'=>$this->input->post('placeofbirth'),
		'gender'=>$this->input->post('gender'),
		'civil_status'=>$this->input->post('civil_status'),
		'citizenship'=>$this->input->post('citizenship'),
		'mobile_number'=>$complete_mobile,
		'email'=>$this->input->post('email'),
		'pr_barangay'=>$this->input->post('pr_barangay'),
		'pr_towncity'=>$this->input->post('pr_towncityname'),
		'pr_province'=>$this->input->post('pr_province'),
		'pr_zip_code'=>$this->input->post('pr_zip_code'),
		'barangay'=>$this->input->post('barangay'),
		'towncity'=>$this->input->post('towncity'),
		'province'=>$this->input->post('province'),
		'zipcode'=>$this->input->post('zipcode'),
		'hsgraduated'=>$this->input->post('hsgraduated'),
		'hsgraduated_address'=>$this->input->post('hsgraduated_address'),
		'hsgraduated_sector'=>$this->input->post('hsgraduated_sector'),
		'year_level'=>$this->input->post('year_level'),
		'disability'=>$this->input->post('disability'),
		'ip_affiliation'=>$this->input->post('ip_affiliation'),
		'fstatus'=>$this->input->post('fstatus'),
		'father'=>$this->input->post('father'),
		'father_m'=>$this->input->post('father_m'),
		'father_l'=>$this->input->post('father_l'),
		'f_address'=>$this->input->post('f_address'),
		'f_contactno'=>$this->input->post('f_contactno'),
		'foccupation'=>$this->input->post('foccupation'),
		'f_employer'=>$this->input->post('f_employer'),
		'f_employer_address'=>$this->input->post('f_employer_address'),
		'f_highesteduc'=>$this->input->post('f_highesteduc'),
		'mstatus'=>$this->input->post('mstatus'),
		'mother'=>$this->input->post('mother'),
		'mother_m'=>$this->input->post('mother_m'),
		'mother_l'=>$this->input->post('mother_l'),
		'm_address'=>$this->input->post('m_address'),
		'm_contactno'=>$this->input->post('m_contactno'),
		'moccupation'=>$this->input->post('moccupation'),
		'm_employer'=>$this->input->post('m_employer'),
		'm_employer_address'=>$this->input->post('m_employer_address'),
		'm_highesteduc'=>$this->input->post('m_highesteduc'),
		'income'=>$this->input->post('income'),
		'siblingno'=>$this->input->post('siblingno'),
		'dswd4p'=>$this->input->post('dswd4p'),
		'hei'=>$this->input->post('hei'),
		'hei_address'=>$this->input->post('hei_address'),
		'hei_type'=>$this->input->post('hei_type'),
		'course'=>$this->input->post('course'),
		'yearapplied'=>$this->input->post('2021'),
		'preferred_mailing'=>$this->input->post('preferred_mailing'),
		'other_assistance'=>$this->input->post('other_assistance'),
		'othertype1'=>$this->input->post('othertype1'),
		'othertype1_name'=>$this->input->post('othertype1_name'),
		'othertype2'=>$this->input->post('othertype2'),
		'othertype2_name'=>$this->input->post('othertype2_name'),
		'towncityname'=>$this->input->post('towncityname'),
		'guard_fname'=>$this->input->post('guard_fname'),
		'guard_mname'=>$this->input->post('guard_mname'),
		'guard_lname'=>$this->input->post('guard_lname'),
		'guard_address'=>$this->input->post('guard_address'),
		'guard_contact'=>$this->input->post('guard_contact'),
		'guard_occupation'=>$this->input->post('guard_occupation'),
		'guard_employer'=>$this->input->post('guard_employer'),
		'guard_empaddress'=>$this->input->post('guard_empaddress'),
		'guard_highesteduc'=>$this->input->post('guard_highesteduc'),
		'congressionaldistrict'=>$this->input->post('congressionaldistrict'),
		'solo_parent'=>$this->input->post('solo_parent'),
		'lrn_no'=>$this->input->post('lrn_no'),
		'app_pwd'=>$this->input->post('app_pwd'),
		'app_ipgroup'=>$this->input->post('app_ipgroup')
	
		);
		//print_r($formsubmitted);
		
		//$this->onlineapplication_model->saveapplication($formsubmitted);
		
		$result = $this->onlineapplication_model->saveapplication($formsubmitted);
		//$result="123";
		//$clean_result = trim($result);
               
                   $result_upload = $this->onlineapplication_model->upload_attachment($result);//result is the application id
                   
                  if($result_upload){
		echo json_encode($result);
                	$last_applicant_id = $result;
		$contactno = $complete_mobile;
                
             
                
                
		//$this->send_sms_bulk($contactno,$last_applicant_id);
		//$this->emailtosms($contactno,$last_applicant_id);
		$this->yeastarsms($contactno,$last_applicant_id);
		//send to admin
		$this->sendemailnotification($formsubmitted,$last_applicant_id);
		
		
                
                
                
                  }
                  else {
                     
                      echo "Failed in uploading documents please login to your portal with application number $result and contact number $contactno and re-upload documents";
                      
                  }
                  
		
	
		
		}//end if condition
		
	}
	
	public function send_sms_bulk($contactno,$last_applicant_id){
			
			$this->load->helper('url');
			$sms_from = "CHEDRO1";
			//$sms_to = "09468147457";
			//$contactno = "639468147457";
			//$last_applicant_id = "123";
			$now = new DateTime();
			$now->setTimezone(new DateTimezone('Asia/Manila'));
			$now_timestamp = $now->format('Y, M-d h:i:a');
			//echo $now_timestamp;
			//$datestring = 'Year: %Y, %M %d %h:%i %a';
			//$time = time();
			//$nowdate = mdate($datestring, $time);
			$user = "ecasem";
			$pass = "passw0rd";
			//$sms_msg = "This is to acknowledge your scholarship application with ID #:".$last_applicant_id.". Your application will be evaluated and will inform you if you are granted.";
			$sms_msg = "This is to acknowledge your scholarship application # ".$last_applicant_id.". Please submit documentary requirements to CHEDRO1 for validation. No need to reply to this text.";
			 $query_string = "?un=".$user."&pwd=".$pass;
			$query_string .= "&dstno=".rawurlencode($contactno);
			 $query_string .= "&msg=".rawurlencode(stripslashes($sms_msg)) . "&type=1&sendid=".$sms_from;        
			$url = "https://www.isms.com.my/isms_send.php".$query_string;
			
			//redirect($url);
			file_get_contents($url);
			//echo $url;
			
	}
	
	public function emailtosms($mobilenumber,$last_applicant_id){
	    
	    $this->load->library('email');
		
		$smsmessage = "This is to acknowledge your scholarship application # ".$last_applicant_id.". Please submit documentary requirements to CHEDRO1 for validation. No need to reply to this text.";
		
		if($mobilenumber[0]=="0"){
			$clean_number =  "63".substr($mobilenumber, 1);
		}else{
			$clean_number = $mobilenumber;
		}
		
		
		
		
		
		$subject = "StufapsApplication ".$clean_number;
		//$from = 'websms@chedro1.com';
		$adminemailContent= "FROM: ".$clean_number;
		$adminemailContent.= ' MESSAGE: email2smsonline '.$smsmessage;
		


        $this->email->from('websms@softbytes.asia');
        $this->email->to('websms@softbytes.asia');
        
        $this->email->subject($subject);
        $this->email->message($adminemailContent);
        
		
		
		
		
        if($this->email->send()){
			echo json_encode(['res'=>'success']);
		}else{
			echo json_encode(['res'=>$this->email->print_debugger()]);
		}

	}
	
	public function applicant_checkduplicate()
	{
		
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
		$formsubmitted =array(
		'lname'=>$this->input->post('lname'),
		'extension'=>$this->input->post('extension'),
		'fname'=>$this->input->post('fname'),
		'mname'=>$this->input->post('mname'),
		'birth-month'=>$this->input->post('birth-month'),
		'birth-day'=>$this->input->post('birth-day'),
		'birth-year'=>$this->input->post('birth-year')
		);
		
		
		$result = $this->onlineapplication_model->applicant_checkduplicate($formsubmitted);
		//$result="123";
		echo json_encode($result);
		
		
		}//end if condition
		
	}
	
	
	public function checkduplicate()
	{
		
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
		$congid = $this->input->post('congid');
		
		$congid_result = $this->onlineapplication_model->congid($congid);
		echo json_encode($congid_result);
		}else{
			header("Location: https://stufaps.chedro1.com/application2023");
		}
		
	}
	
	public function getcong()
	{
		
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
		$congid = $this->input->post('congid');
		
		$congid_result = $this->onlineapplication_model->congid($congid);
		echo json_encode($congid_result);
		}else{
			header("Location: https://stufaps.chedro1.com/application2023");
		}
		
	}
	
	public function gettowncity()
	{
		
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
		$zid = $this->input->post('zid');
		
		$congid_result = $this->onlineapplication_model->zid($zid);
		echo json_encode($congid_result);
		}else{
			header("Location: https://stufaps.chedro1.com/application2023");
		}
	}
	
	public function getheidetails()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$heicode = $this->input->post('heicode');
			//$heicode = "03085c";
			$congid_result = $this->onlineapplication_model->gethei2($heicode);
			//echo ($congid_result);
			echo json_encode($congid_result);
		}else{
			header("Location: https://stufaps.chedro1.com/application2023");
		}

		
		
	}
	
	public function sendemailnotification($formsubmittedraw,$applicantid){
		
		
		//$applicationid="52190";
		//$mobileno="639304412577";
		$formsubmitted =$this->onlineapplication_model->onlinedetails($applicantid,$formsubmittedraw['mobile_number']);

		//print_r($formsubmitted);
		
		$subject = 'StuFAPs New Application from '.$formsubmitted['firstname'];
		$from = 'support@chedro1.com';
		$emailContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width" name="viewport"/>
<!--[if !mso]><!-->
<meta content="IE=edge" http-equiv="X-UA-Compatible"/>
<!--<![endif]-->
<title></title>
<!--[if !mso]><!-->
<!--<![endif]-->
<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
	</style>
<style id="media-query" type="text/css">
		@media (max-width: 660px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col>div {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num8 {
				width: 66% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #f3f2f3;">
<!--[if IE]><div class="ie-browser"><![endif]-->
<table bgcolor="#f3f2f3" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3f2f3; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top;" valign="top">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#f3f2f3"><![endif]-->
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#ffffff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div class="mobile_hide">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 30px solid #F3F2F3; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;background-image:url("https://stufaps.chedro1.com/email_images/bg-shade.jpg");background-position:center top;background-repeat:repeat">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#ffffff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:60px; padding-bottom:0px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:60px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div align="center" class="img-container center fixedwidth" style="padding-right: 0px;padding-left: 0px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img align="center" alt="Image" border="0" class="center fixedwidth" src="https://stufaps.chedro1.com/email_images/CHED-LOGO.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 128px; display: block;" title="Image" width="128"/>
<!--[if mso]></td></tr></table><![endif]-->
</div>
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 38px; padding-left: 38px; padding-top: 20px; padding-bottom: 15px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:20px;padding-right:38px;padding-bottom:15px;padding-left:38px;">
<div style="line-height: 1.2; font-size: 12px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; color: #555555; mso-line-height-alt: 14px;">
<p style="font-size: 42px; line-height: 1.2; word-break: break-word; text-align: center; font-family: inherit; mso-line-height-alt: 50px; margin: 0;"><span style="font-size: 42px; color: #2a272b;"><strong>Thank you '.$formsubmitted['firstname'].' for applying!</strong></span></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 38px; padding-left: 38px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:10px;padding-right:38px;padding-bottom:10px;padding-left:38px;">
<div style="line-height: 1.5; font-size: 12px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; color: #555555; mso-line-height-alt: 18px;">
<p style="line-height: 1.5; word-break: break-word; text-align: center; font-family: inherit; font-size: 17px; mso-line-height-alt: 26px; mso-ansi-font-size: 18px; margin: 0;"><span style="font-size: 17px; mso-ansi-font-size: 18px;">This is to acknowledge your scholarship application #'.$applicantid.'. Please submit <a href="https://stufaps.chedro1.com/documentary-requirements/" rel="noopener" style="text-decoration: underline;" target="_blank">documentary requirements</a> to CHED Regional Office 1 for validation.</span></p>
<p style="line-height: 1.5; word-break: break-word; font-family: inherit; mso-line-height-alt: NaNpx; margin: 0;"> </p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<div align="center" class="button-container" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:45pt; width:255pt; v-text-anchor:middle;" arcsize="100%" stroke="false" fillcolor="#004afd"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
<div style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#004afd;border-radius:60px;-webkit-border-radius:60px;-moz-border-radius:60px;width:auto; width:auto;;border-top:1px solid #004afd;border-right:1px solid #004afd;border-bottom:1px solid #004afd;border-left:1px solid #004afd;padding-top:12px;padding-bottom:16px;font-family:Helvetica Neue, Helvetica, Arial, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:32px;padding-right:32px;font-size:16px;display:inline-block;"><span style="font-size: 16px; margin: 0; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><strong><a href="https://stufaps.chedro1.com/application2023/stufpdf/reprint/'.$applicantid.'/'.$formsubmitted['contactno'].'" style="color:#ffffff;">Download Application Form</a></strong></span></span></div>
<!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
</div>
<div align="center" class="img-container center autowidth" style="padding-right: 0px;padding-left: 0px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img align="center" alt="Image" border="0" class="center autowidth" src="https://stufaps.chedro1.com/email_images/reminder-hero-graph.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 640px; display: block;" title="Image" width="640"/>
<!--[if mso]></td></tr></table><![endif]-->
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #f3f2f3;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f3f2f3;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#f3f2f3"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#f3f2f3;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="1" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid transparent; height: 1px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="1" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#ffffff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 48px; padding-left: 0px; padding-top: 0px; padding-bottom: 28px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:0px;padding-right:48px;padding-bottom:28px;padding-left:0px;">
<div style="line-height: 1.5; font-size: 12px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; color: #555555; mso-line-height-alt: 18px;">
<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: center; font-family: inherit; mso-line-height-alt: 21px; margin: 0;"><a href="https://stufaps.chedro1.com" rel="noopener" style="text-decoration: underline;" target="_blank">stufaps.chedro1.com</a></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #f3f2f3;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f3f2f3;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#f3f2f3"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#f3f2f3;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div class="mobile_hide">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 15px; padding-right: 15px; padding-bottom: 15px; padding-left: 15px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
</td>
</tr>
</tbody>
</table>
<!--[if (IE)]></div><![endif]-->
</body>
</html>';
		
		$adminemailContent = 'New Application from '.$formsubmitted['firstname'].' '.$formsubmitted['middlename'].' '.$formsubmitted['lastname'];
		$adminemailContent.= '<br><br>Applicant ID: '.$applicantid;
		$adminemailContent .= '<br><br>Mobile: '.$formsubmitted['contactno'];
		$adminemailContent .= '<br><br>Address: '.$formsubmitted['barangay'].' '.$formsubmitted['towncity'].' '.$formsubmitted['province'];
		$adminemailContent .= '<br><br>Previous School: '.$formsubmitted['hsgraduated'].' '.$formsubmitted['hsgraduated_address'];
		$adminemailContent .= '<br><br>Other Information:' .$formsubmitted['course'];

		//$config['protocol'] = 'smtp';
		//$config['smtp_host'] = 'ssl://mail.softbytes.asia';
		//$config['smtp_port'] = '465';
		//$config['smtp_timeout'] = '60';

		//$config['smtp_user'] = 'elvin@softbytes.asia';
		//$config['smtp_pass'] = 'evenlytenwebsolutions';
/*
		$config['charset'] = 'utf-8';
		$config['newline'] = "\r\n";
		$config['mailtype'] = 'html';
		$config['validation'] = 'TRUE';


		//send to admin
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->replyto("chedro1stufaps@ched.gov.ph",'StuFAPs Application');
		$this->email->from($from,'StuFAPs Application');
		$this->email->to('ecasem@ched.gov.ph');
		$this->email->subject($subject);
		$this->email->message($adminemailContent);
		
		if($this->email->send()){
			//echo json_encode(['res'=>'success']);
		}else{
			//echo json_encode(['res'=>$this->email->print_debugger()]);
		}
		*/
		//send to applicant
		
		if($formsubmitted['email']!=""){
			 
			$this->load->library('email');
    		$this->email->set_mailtype("html");
            $this->email->from('support@chedro1.com');
            //$this->email->replyto("chedro1stufaps@ched.gov.ph",'StuFAPs Application');
           	$this->email->to($formsubmitted['email']);
    		$this->email->subject($subject);
    		$this->email->message($emailContent);
    		
    		if($this->email->send()){
    			//echo json_encode(['res'=>'success']);
    		}else{
    			echo json_encode(['res'=>$this->email->print_debugger()]);
    		}
          //  print_r($formsubmitted['email']);
		
			
			
		} 
		
		

	}
	public function emailtest(){
		
		
		$applicantid="68954";
		//echo $applicationid;
		$mobileno="639468147457";
		$formsubmitted =$this->onlineapplication_model->onlinedetails($applicantid,$mobileno);

		//print_r($formsubmitted);
		
		$subject = 'StuFAPs New Application from '.$formsubmitted['firstname'];
		//echo $subject;
		$from = 'support@chedro1.com';
		$emailContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width" name="viewport"/>
<!--[if !mso]><!-->
<meta content="IE=edge" http-equiv="X-UA-Compatible"/>
<!--<![endif]-->
<title></title>
<!--[if !mso]><!-->
<!--<![endif]-->
<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
	</style>
<style id="media-query" type="text/css">
		@media (max-width: 660px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col>div {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num8 {
				width: 66% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #f3f2f3;">
<!--[if IE]><div class="ie-browser"><![endif]-->
<table bgcolor="#f3f2f3" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3f2f3; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top;" valign="top">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#f3f2f3"><![endif]-->
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#ffffff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div class="mobile_hide">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 30px solid #F3F2F3; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;background-image:url("https://stufaps.chedro1.com/email_images/bg-shade.jpg");background-position:center top;background-repeat:repeat">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#ffffff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:60px; padding-bottom:0px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:60px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div align="center" class="img-container center fixedwidth" style="padding-right: 0px;padding-left: 0px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img align="center" alt="Image" border="0" class="center fixedwidth" src="https://stufaps.chedro1.com/email_images/CHED-LOGO.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 128px; display: block;" title="Image" width="128"/>
<!--[if mso]></td></tr></table><![endif]-->
</div>
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 38px; padding-left: 38px; padding-top: 20px; padding-bottom: 15px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.2;padding-top:20px;padding-right:38px;padding-bottom:15px;padding-left:38px;">
<div style="line-height: 1.2; font-size: 12px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; color: #555555; mso-line-height-alt: 14px;">
<p style="font-size: 42px; line-height: 1.2; word-break: break-word; text-align: center; font-family: inherit; mso-line-height-alt: 50px; margin: 0;"><span style="font-size: 42px; color: #2a272b;"><strong>Thank you '.$formsubmitted['firstname'].' for applying!</strong></span></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 38px; padding-left: 38px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:10px;padding-right:38px;padding-bottom:10px;padding-left:38px;">
<div style="line-height: 1.5; font-size: 12px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; color: #555555; mso-line-height-alt: 18px;">
<p style="line-height: 1.5; word-break: break-word; text-align: center; font-family: inherit; font-size: 17px; mso-line-height-alt: 26px; mso-ansi-font-size: 18px; margin: 0;"><span style="font-size: 17px; mso-ansi-font-size: 18px;">This is to acknowledge your scholarship application #'.$applicantid.'. Please submit <a href="https://stufaps.chedro1.com/documentary-requirements/" rel="noopener" style="text-decoration: underline;" target="_blank">documentary requirements</a> to CHED Regional Office 1 for validation.</span></p>
<p style="line-height: 1.5; word-break: break-word; font-family: inherit; mso-line-height-alt: NaNpx; margin: 0;"> </p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<div align="center" class="button-container" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:45pt; width:255pt; v-text-anchor:middle;" arcsize="100%" stroke="false" fillcolor="#004afd"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
<div style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#004afd;border-radius:60px;-webkit-border-radius:60px;-moz-border-radius:60px;width:auto; width:auto;;border-top:1px solid #004afd;border-right:1px solid #004afd;border-bottom:1px solid #004afd;border-left:1px solid #004afd;padding-top:12px;padding-bottom:16px;font-family:Helvetica Neue, Helvetica, Arial, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:32px;padding-right:32px;font-size:16px;display:inline-block;"><span style="font-size: 16px; margin: 0; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><strong><a href="https://stufaps.chedro1.com/application2023/stufpdf/reprint/'.$applicantid.'/'.$formsubmitted['contactno'].'" style="color:#ffffff;">Download Application Form</a></strong></span></span></div>
<!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
</div>
<div align="center" class="img-container center autowidth" style="padding-right: 0px;padding-left: 0px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img align="center" alt="Image" border="0" class="center autowidth" src="https://stufaps.chedro1.com/email_images/reminder-hero-graph.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 640px; display: block;" title="Image" width="640"/>
<!--[if mso]></td></tr></table><![endif]-->
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #f3f2f3;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f3f2f3;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#f3f2f3"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#f3f2f3;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="1" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid transparent; height: 1px; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td height="1" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#ffffff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 48px; padding-left: 0px; padding-top: 0px; padding-bottom: 28px; font-family: Arial, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Helvetica Neue, Helvetica, Arial, sans-serif;line-height:1.5;padding-top:0px;padding-right:48px;padding-bottom:28px;padding-left:0px;">
<div style="line-height: 1.5; font-size: 12px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; color: #555555; mso-line-height-alt: 18px;">
<p style="font-size: 14px; line-height: 1.5; word-break: break-word; text-align: center; font-family: inherit; mso-line-height-alt: 21px; margin: 0;"><a href="https://stufaps.chedro1.com" rel="noopener" style="text-decoration: underline;" target="_blank">stufaps.chedro1.com</a></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #f3f2f3;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#f3f2f3;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#f3f2f3"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#f3f2f3;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div class="mobile_hide">
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 15px; padding-right: 15px; padding-bottom: 15px; padding-left: 15px;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
</td>
</tr>
</tbody>
</table>
<!--[if (IE)]></div><![endif]-->
</body>
</html>';
		
		$adminemailContent = 'New Application from '.$formsubmitted['firstname'].' '.$formsubmitted['middlename'].' '.$formsubmitted['lastname'];
		$adminemailContent.= '<br><br>Applicant ID: '.$applicantid;
		$adminemailContent .= '<br><br>Mobile: '.$formsubmitted['contactno'];
		$adminemailContent .= '<br><br>Address: '.$formsubmitted['barangay'].' '.$formsubmitted['towncity'].' '.$formsubmitted['province'];
		$adminemailContent .= '<br><br>Previous School: '.$formsubmitted['hsgraduated'].' '.$formsubmitted['hsgraduated_address'];
		$adminemailContent .= '<br><br>Other Information:' .$formsubmitted['course'];


        
//echo $adminemailContent;
		//$config['protocol'] = 'smtp';
		//$config['smtp_host'] = 'ssl://mail.softbytes.asia';
		//$config['smtp_port'] = '465';
		//$config['smtp_timeout'] = '60';

		//$config['smtp_user'] = 'elvin@softbytes.asia';
		//$config['smtp_pass'] = 'evenlytenwebsolutions';
/*
		$config['charset'] = 'utf-8';
		$config['newline'] = "\r\n";
		$config['mailtype'] = 'html';
		$config['validation'] = 'TRUE';


		//send to admin
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->replyto("chedro1stufaps@ched.gov.ph",'StuFAPs Application');
		$this->email->from($from,'StuFAPs Application');
		$this->email->to('ecasem@ched.gov.ph');
		$this->email->subject($subject);
		$this->email->message($adminemailContent);
		
		if($this->email->send()){
			echo json_encode(['res'=>'success']);
		}else{
			echo json_encode(['res'=>$this->email->print_debugger()]);
		}
*/		
		//send to applicant
	   
		if($formsubmitted['email']!=""){
			 
			$this->load->library('email');
    		$this->email->set_mailtype("html");
            $this->email->from('support@chedro1.com');
            //$this->email->replyto("chedro1stufaps@ched.gov.ph",'StuFAPs Application');
           	$this->email->to($formsubmitted['email']);
    		$this->email->subject($subject);
    		$this->email->message($emailContent);
    		
    		if($this->email->send()){
    			echo json_encode(['res'=>'success']);
    		}else{
    			echo json_encode(['res'=>$this->email->print_debugger()]);
    		}
          //  print_r($formsubmitted['email']);
			/*
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->from($from,'StuFAPs Application');
			
		
			$this->email->subject($subject);
			$this->email->message($emailContent);
			
			if($this->email->send()){
				//echo json_encode(['res'=>'success']);
			}else{
				//echo json_encode(['res'=>$this->email->print_debugger()]);
			}*/
			
			
		} 
		
		

	}
	
	public function sampleemail(){
		
		$complete_mobile = "639468147457";
		$subject = "port:2-".$complete_mobile.",";
		$smsmessage = "This is to acknowledge your scholarship application # ".$last_applicant_id.". Please submit documentary requirements (stufaps.chedro1.com/documentary-requirements) to CHEDRO1 for validation. No need to reply to this text.";
		
        $this->load->library('email');
		$this->email->set_mailtype("text");
        $this->email->from('sms@evenlyten.com');
        $this->email->to('sms@evenlyten.com');
		$this->email->subject($subject);
		$this->email->message($smsmessage);
		
		if($this->email->send()){
			echo json_encode(['res'=>'success']);
		}else{
			echo json_encode(['res'=>$this->email->print_debugger()]);
		}
		
		
		
	}
	
	public function yeastarsms($contactno,$last_applicant_id){
		
		//$complete_mobile = "639468147457";
		$subject = "port:2-".$contactno.",";
		$smsmessage = "This is to acknowledge your scholarship application # ".$last_applicant_id.". Please submit (stufaps.chedro1.com/submit) documentary requirements (stufaps.chedro1.com/documentary-requirements) to CHEDRO1 for validation. No need to reply to this text.";
		
        $this->load->library('email');
		$this->email->set_mailtype("text");
        $this->email->from('sms@evenlyten.com');
        $this->email->to('sms@evenlyten.com');
		$this->email->subject($subject);
		$this->email->message($smsmessage);
		
		if($this->email->send()){
			//echo json_encode(['res'=>'success']);
		}else{
			//echo json_encode(['res'=>$this->email->print_debugger()]);
		}
		
		
		
	}
	

	
	
	
}