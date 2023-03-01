<?php

class Heidirectory2 extends CI_Controller
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

		$this->load->model('heidirectory_model');
		$this->load->model('permitsrecognition_model');
		$this->load->model('eteeap_model');
		$this->load->model('programapplication_model');
		$this->load->helper('date');
		 $this->data = array(
            'title' => 'HEI Directory',
			'heiclass' => 'active',
			'heilist' => 'active',
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
			'breadcrumb' =>array('bc'=>"HEI Profile")
			);
			$this->js = array(
            'jsfile' => 'heidirectory.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Higher Education Institution Directory") ;
		$data['heidirectory'] = $this->heidirectory_model->get();
		$data['activehei'] = $this->heidirectory_model->activehei();
		$data['privatehei'] = $this->heidirectory_model->privatehei();
		$data['luchei'] = $this->heidirectory_model->luchei();
		$data['suchei'] = $this->heidirectory_model->suchei();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		//$this->load->view('dataviz/inc/header_view');
		$this->load->view('heidirectory/heidirectory_view',$data);
		//$this->load->view('dataviz/heidirectory_view',$data);
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
			$data['contacts_list'] = $this->heidirectory_model->getcontacts($instcode);
			$data['programs'] = $this->heidirectory_model->getprograms($instcode);
			$data['deans'] = $this->heidirectory_model->getdeans($instcode);
			$data['formernames'] = $this->heidirectory_model->getformernames($instcode);
			
			$data['permits_list'] = $this->permitsrecognition_model->getspecific($instcode);
			$data['eteeap_list'] = $this->eteeap_model->getperhei($instcode);
			$data['building_list'] = $this->heidirectory_model->getbuilding($instcode);
			$data['department_list'] = $this->heidirectory_model->getdepartment($instcode);
			$data['employee_list'] = $this->programapplication_model->getemployee();
			$data['faculty_list'] = $this->heidirectory_model->getfaculty($instcode);
			$data['ref_f_fullpart'] = $this->heidirectory_model->getfullpart();
			
			
			$data['institutioncode'] = $instcode;
			//$data['subnavtitle'] = $data['instname'];
			//$data['heidirectory'] = $result->result();
			
			$this->load->view('inc/header_view');
			$this->load->view('heidirectory/heidirectorydetails_view',$data);
			$this->load->view('heidirectory/mapheader_view');
			$this->load->view('inc/footer_view',$js);
			//print_r($data);
		//}
		
	}
	
	public function savehei(){
		
		$instcode = $this->input->post('instcode');
		$instname = $this->input->post('instname');
		$this->heidirectory_model->savehei($instcode,$instname);
		
		
	}
	
	public function addnewprogram(){
		
		$instcode = $this->input->post('instcode');
		$newprogramname = $this->input->post('newprogramname');
		$newauthcat = $this->input->post('newauthcat');
		$newauthserial = $this->input->post('newauthserial');
		$newauthyear = $this->input->post('newauthyear');
		$newmajor = $this->input->post('newmajor');
		$newselectsupervisor = $this->input->post('newselectsupervisor');
		$newselectdiscipline = $this->input->post('newselectdiscipline');
		$newselectdiscipline2 = $this->input->post('newselectdiscipline2');
		$this->heidirectory_model->addnewprogram($instcode,$newprogramname,$newauthcat,$newauthserial,$newauthyear,$newmajor,$newselectsupervisor,$newselectdiscipline,$newselectdiscipline2);
		
		
	}
	
	public function checkduplicatehei(){
		
		$instcode = $this->input->post('instcode');
		
		$duplicate = $this->heidirectory_model->checkduplicatehei($instcode);
		echo $duplicate;
		
	}
	
	public function checkduplicateprogram(){
		
		$instcode = $this->input->post('instcode');
		$newprogramname = $this->input->post('newprogramname');
		
		$duplicate = $this->heidirectory_model->checkduplicateprogram($instcode,$newprogramname);
		echo $duplicate;
		
	}
	
	public function deletehei(){
		$heid = $this->input->post('heid');
		
		//$sql = "DELETE from a_institution_profile where heid='".$heid."'";
		//$this->db->query($sql);
		
	}
	
	public function deleteheicontact(){
		$contactid = $this->input->post('contactid');
		
		$this->heidirectory_model->deleteheicontact($contactid);
		
	}
	
	public function saveformername(){
		$former_name = $this->input->post('former_name');
		$former_year = $this->input->post('former_year');
		$instcode = $this->input->post('instcode');
		
		$this->heidirectory_model->saveformername($former_name,$former_year,$instcode);
	}
	
	
	public function getprograminfo($programid){

		$programinfoarray = $this->heidirectory_model->getprograminfo($programid);
		echo json_encode($programinfoarray[0]);

	}
	
	
	
	public function updateprogram($programid){
		
		
		$editprogramname =$this->input->post('editprogramname');
		$supervisor =$this->input->post('supervisor');
		$discipline =$this->input->post('discipline');
		$discipline2 =$this->input->post('discipline2');
		$authcat =$this->input->post('authcat');
		$authserial =$this->input->post('authserial');
		$authyear =$this->input->post('authyear');
		$editmajor =$this->input->post('editmajor');
		
		$this->heidirectory_model->updateprogram($editprogramname,$supervisor,$discipline,$discipline2,$authcat,$authserial,$authyear,$editmajor,$programid);
		
		
		//echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	public function saveheiinfo($instcode){
		
		//$instcode = $this->input->post('instcode');
		$latitude = $this->input->post('latitude');
		$longtitude = $this->input->post('longtitude');
		$heitype =$this->input->post('heitype');
		$province2 =$this->input->post('province2');
		$insthead =$this->input->post('insthead');
		$titlehead =$this->input->post('titlehead');
		$atel =$this->input->post('atel');
		$afax =$this->input->post('afax');
		$ainsttelhead =$this->input->post('ainsttelhead');
		$aemail =$this->input->post('aemail');
		$awebsite =$this->input->post('awebsite');
		
		$instname =$this->input->post('instname');
		$form_ownership =$this->input->post('form_ownership');
		$astreet =$this->input->post('astreet');
		$amunicipality =$this->input->post('amunicipality');
		$aprovince =$this->input->post('aprovince');
		$aregion =$this->input->post('aregion');
		$azip =$this->input->post('azip');
		$aestablished =$this->input->post('aestablished');
		$asec =$this->input->post('asec');
		$ayearapproved =$this->input->post('ayearapproved');
		$acollege =$this->input->post('acollege');
		$auniversity =$this->input->post('auniversity');
		
		$insttype =$this->input->post('insttype');
		$insttype2 =$this->input->post('insttype2');
		$hei_remarks =$this->input->post('hei_remarks');
		$hei_status =$this->input->post('hei_status');
		$heid =$this->input->post('heid');
		$highesteduchead =$this->input->post('highesteduchead');
		//$heid =$this->input->post('heid');
		
		
		$this->heidirectory_model->saveheiinfo($heitype,$province2,$insthead,$titlehead,$atel,$afax,$ainsttelhead,$aemail,$awebsite,$instname,$form_ownership,$astreet,$amunicipality,$aprovince,$aregion,$azip,$aestablished,$asec,$ayearapproved,$acollege,$auniversity,$instcode,$insttype,$insttype2,$hei_remarks,$hei_status,$latitude,$longtitude,$heid,$highesteduchead);
		
		
		
		//echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	//save contact from hei details
	public function savecontact(){
		
		$instcode = $this->input->post('instcode');
		$contactname = $this->input->post('contactname');
		$position = $this->input->post('position');
		$email = $this->input->post('email');
		$telno = $this->input->post('telno');
		$address = $this->input->post('address');
		
		$this->heidirectory_model->savecontact($instcode,$contactname,$position,$email,$telno,$address);
		
	}
	
	public function savedean(){
		$instcode = $this->input->post('instcode');
		$deansname = $this->input->post('deansname');
		$designation = $this->input->post('designation');
		$assignment = $this->input->post('designation');
		$baccalaureate = $this->input->post('baccalaureate');
		$masters = $this->input->post('masters');
		$doctoral = $this->input->post('doctoral');
		
		$this->heidirectory_model->savedean($instcode,$deansname,$designation,$assignment,$baccalaureate,$masters,$doctoral);
	}

	public function deletedean(){
		$deanid = $this->input->post('deanid');
		
		$this->heidirectory_model->deletedean($deanid);
		
	}
	
	public function getfacultyprofile(){
		
		$facultyid = $this->input->post('facultyid');
		$facultyprofile = $this->heidirectory_model->getfacultyprofile($facultyid);
		echo json_encode($facultyprofile[0]);

	}
	
	public function deleteprogram(){

		$programid = $this->input->post('programid');
		$this->heidirectory_model->deleteprogram($programid);
		
		
		
	}
	
	public function savecoordinates(){
		
		
		$latitude = $this->input->post('latitude');
		$longtitude = $this->input->post('longtitude');
		$instcode = $this->input->post('instcode');

		$this->heidirectory_model->savecoordinates($latitude,$longtitude,$instcode);

		
	}
	
	public function savesupervisorprogram(){
		
		
		$programid =$this->input->post('programid');
		$supervisor =$this->input->post('supervisor');
		$this->heidirectory_model->savesupervisorprogram($programid,$supervisor);

	}
	
	
	
	public function heidirectoryxls(){
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('HEI Directory');
		
		$this->excel->getActiveSheet()->setCellValue('A1','HEI Name');	
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
		$this->excel->getActiveSheet()->setCellValue('AQ1','totalenrolment');
		$this->excel->getActiveSheet()->setCellValue('AR1','totalgraduate');
		$this->excel->getActiveSheet()->setCellValue('AS1','street');
		$this->excel->getActiveSheet()->setCellValue('AT1','municipality');
		$this->excel->getActiveSheet()->setCellValue('AU1','province1');
		$this->excel->getActiveSheet()->setCellValue('AV1','province2');
		$this->excel->getActiveSheet()->setCellValue('AW1','postalcode');
		$this->excel->getActiveSheet()->setCellValue('AX1','heitype');
		/*$this->excel->getActiveSheet()->setCellValue('AY1','province1');
		$this->excel->getActiveSheet()->setCellValue('AZ1','province2');
		$this->excel->getActiveSheet()->setCellValue('BA1','Region');
		$this->excel->getActiveSheet()->setCellValue('BB1','Postalcode');
		$this->excel->getActiveSheet()->setCellValue('BC1','insttel');
		$this->excel->getActiveSheet()->setCellValue('BD1','instfax');
		$this->excel->getActiveSheet()->setCellValue('BE1','email');
		$this->excel->getActiveSheet()->setCellValue('BF1','website');
		$this->excel->getActiveSheet()->setCellValue('BG1','established');
		$this->excel->getActiveSheet()->setCellValue('BH1','sec');
		$this->excel->getActiveSheet()->setCellValue('BI1','yearapproved');
		$this->excel->getActiveSheet()->setCellValue('BJ1','tocollege');
		$this->excel->getActiveSheet()->setCellValue('BK1','touniversity');
		$this->excel->getActiveSheet()->setCellValue('BL1','insthead');
		$this->excel->getActiveSheet()->setCellValue('BM1','titlehead');
		$this->excel->getActiveSheet()->setCellValue('BN1','highesteduchead');
		$this->excel->getActiveSheet()->setCellValue('BO1','lat');
		$this->excel->getActiveSheet()->setCellValue('BP1','long');
		$this->excel->getActiveSheet()->setCellValue('BQ1','heitype');
		$this->excel->getActiveSheet()->setCellValue('BR1','heistatus');
		
		*/
		
		
		
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
	
	public function instprofile(){
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Institutional Profile');
		
		$this->excel->getActiveSheet()->setCellValue('A1','id');	
		$this->excel->getActiveSheet()->setCellValue('B1','instcode');	
		$this->excel->getActiveSheet()->setCellValue('C1','instname');	
		$this->excel->getActiveSheet()->setCellValue('D1','formownership');	
		$this->excel->getActiveSheet()->setCellValue('E1','insttype');	
		$this->excel->getActiveSheet()->setCellValue('F1','insttype2');	
		$this->excel->getActiveSheet()->setCellValue('G1','street');	
		$this->excel->getActiveSheet()->setCellValue('H1','municipality');	
		$this->excel->getActiveSheet()->setCellValue('I1','province1');	
		$this->excel->getActiveSheet()->setCellValue('J1','province2');	
		$this->excel->getActiveSheet()->setCellValue('K1','region');	
		$this->excel->getActiveSheet()->setCellValue('L1','postal code');	
		$this->excel->getActiveSheet()->setCellValue('M1','institution tel');	
		$this->excel->getActiveSheet()->setCellValue('N1','institution fax');	
		$this->excel->getActiveSheet()->setCellValue('O1','institution head');	
		$this->excel->getActiveSheet()->setCellValue('P1','email');	
		$this->excel->getActiveSheet()->setCellValue('Q1','website');	
		$this->excel->getActiveSheet()->setCellValue('R1','establised');
		$this->excel->getActiveSheet()->setCellValue('S1','sec');
		$this->excel->getActiveSheet()->setCellValue('T1','year approved');
		$this->excel->getActiveSheet()->setCellValue('U1','tocollege');
		$this->excel->getActiveSheet()->setCellValue('V1','touniversity');
		$this->excel->getActiveSheet()->setCellValue('W1','institutionhead');
		$this->excel->getActiveSheet()->setCellValue('X1','head title');
		$this->excel->getActiveSheet()->setCellValue('Y1','highest education');
		$this->excel->getActiveSheet()->setCellValue('Z1','latitude');
		$this->excel->getActiveSheet()->setCellValue('AA1','longtitude');
		$this->excel->getActiveSheet()->setCellValue('AB1','heitype');
		$this->excel->getActiveSheet()->setCellValue('AC1','hei_status');
		$this->excel->getActiveSheet()->setCellValue('AD1','hei_remarks');
		
		
		
		
		
		
		$this->load->model('heidirectory_model');
		$hei_dir_list = $this->heidirectory_model->getxlsinstprofile();
		
		$this->excel->getActiveSheet()->fromArray($hei_dir_list,NULL,'A2');
		$filename='institutional_profile.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 $objWriter->save('php://output');
		
	

	}
	

	public function deleteformername(){

		$formerid = $this->input->post('formerid');
		$this->heidirectory_model->deleteformername($formerid);
		
		
		
	}
	
	public function updateinstcode(){

		$instcode = $this->input->post('instcode');
		$heid = $this->input->post('heid');
		$this->heidirectory_model->updateinstcode($instcode,$heid);
		
		
		
	}
	
	

	
}