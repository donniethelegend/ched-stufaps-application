<?php
class Stufpdf extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('onlineapplication_model');
		$this->load->library('pdf');
		$this->load->helper('date');
		$this->data = array(
            'title' => 'StuFAPS CHED Regional Office 1',
			'chedpdfclass' => 'active',
		);
			
			$this->js = array(
	            'jsfile' => null,
				'typeahead' => '0'
			);
	}
	public function index2(){
		
		$applicationid = "52190";
		$mobileno = $this->input->post('mno');
		$fulldetails = $this->onlineapplication_model->onlinedetails($applicationid,"639304412577");
		
		if($fulldetails==null){
			
			header("Location: http://www.google.com");
		}
		$html_content =$this->load->view('scholarshipapplication/stufpdf_view',$this->data, TRUE);
		
		$html_content .= $fulldetails['civilstatus'].'</main></body></html>';

		$this->pdf->set_option("isPhpEnabled", true);
		$this->pdf->loadHtml($html_content);

		$this->pdf->render();

		//$canvas = $this->pdf->get_canvas(];
		// $font = Font_Metrics::get_font("helvetica", "bold"];
		// $font = $this->pdf->getFont("helvetica", "bold"];
		// $canvas->page_text(552, 20, "Page {PAGE_NUM}/{PAGE_COUNT}", '',  10, array(0,0,0]];
		echo $this->pdf->stream("sheedpdf.pdf", array("Attachment"=>1));
		// $this->pdf->Output("".$statementNo.".pdf", array("Attachment"=>0]];
		echo $output = $this->pdf->Output("sample.pdf",'F'); 
		
	}
	public function index(){
	    
		//if ($this->input->server('REQUEST_METHOD'] == 'POST']{
		ob_start();
		$applicationid = $this->input->post('applicationno');
		$mobileno = $this->input->post('mno');
		//$applicationid = "52190";
		//$mobileno = "639304412577";
		
		$fulldetails = $this->onlineapplication_model->onlinedetails($applicationid,$mobileno);
		
		if($fulldetails==null){
			
			header("Location: ". base_url());
		}
		
		$data = $this->data;
		$appid = $applicationid;
		$extensionname = $fulldetails['extension'];
                $pic2by2= $fulldetails['picby2'];
                $signature= $fulldetails['signature'];
		$lname = $fulldetails['lastname'];
		$fname = $fulldetails['firstname'];
		$mname = $fulldetails['middlename'];
		$maidname = $fulldetails['maiden_name'];
		$maidnamefont = '';
		
		//$date_format = date_format($fulldetails['dateofbirth'],"m/d/Y");
		$date_format = date("m/d/Y", strtotime($fulldetails['dateofbirth']));

		$dob =$date_format ;
		$pob = $fulldetails['placeofbirth'];
		$sex = $fulldetails['gender'];
		$civilStatus = $fulldetails['civilstatus'];
		$citizenship = $fulldetails['citizenship'];
		$mobileNo = $fulldetails['contactno'];
		$email = $fulldetails['email'];
		$schoolSector = $fulldetails['hsgraduated_sector'];
		$highestAttained = $fulldetails['year_level'];

		// PRESENT ADDRESS
		$presentAddress = $fulldetails['pr_barangay'].", ".$fulldetails['pr_towncity'].", ".$fulldetails['pr_province'];
		$presentZip =  $fulldetails['pr_zipcode'];
    
        $presentAddressLen = strlen($presentAddress);
		$presentAddressFont = '';
		if($presentAddressLen > 25) $presentAddressFont = '; font-size: 5pt';


		// PERMANENT ADDRESS
		$permanentAddress =  $fulldetails['barangay'].", ".$fulldetails['towncity'].", ".$fulldetails['province'];
		$permanentZip =  $fulldetails['zipcode'];

        $permanentAddressLen = strlen($permanentAddress);
		$permanentAddressFont = '';
		if($permanentAddressLen > 25) $permanentAddressFont = '; font-size: 5pt';

		$schoolLastAttended = $fulldetails['hsgraduated'];
		$schoolLastAttendedAddress = $fulldetails['hsgraduated_address'];
		
		$disability = $fulldetails['disability'];
		$ipAffiliation = $fulldetails['ip_affiliation'];

		// FATHER
		$fatherStatus =  $fulldetails['fstatus'];
		$fatherName =  $fulldetails['father']." ".$fulldetails['father_m']." ".$fulldetails['father_l'];
		$fatherAddress =  $fulldetails['f_address'];
		$fatherContactNo =  $fulldetails['f_contactno'];
		$fatherOccupation =  $fulldetails['foccupation'];
		$fatherEmployer =  $fulldetails['f_employer'];
		$fatherEmployerAddress =  $fulldetails['f_employer_address'];
		$fatherAttained =  $fulldetails['f_highesteduc'];
		$fatherIncome =  $fulldetails['income'];

		// MOTHER
		$motherStatus =  $fulldetails['mstatus'];
		$motherName =  $fulldetails['mother']." ".$fulldetails['mother_m']." ".$fulldetails['mother_l'];
		$motherAddress =  $fulldetails['m_address'];
		$motherContactNo =  $fulldetails['m_contactno'];
		$motherOccupation =  $fulldetails['moccupation'];
		$motherEmployer =  $fulldetails['m_employer'];
		$motherEmployerAddress =  $fulldetails['m_employer_address'];
		$motherAttained =  $fulldetails['m_highesteduc'];
		$motherIncome =  "";

		// GUARDIAN
		$guardianStatus = '';
		$guardianName = $fulldetails['guard_fname']." ".$fulldetails['guard_mname']." ".$fulldetails['guard_lname'];
		$guardianAddress = $fulldetails['guard_address'];
		$guardianContactNo = $fulldetails['guard_contact'];
		$guardianOccupation = $fulldetails['guard_occupation'];
		$guardianEmployer = $fulldetails['guard_employer'];
		$guardianEmployerAddress = $fulldetails['guard_empaddress'];
		$guardianAttained = $fulldetails['guard_highesteduc'];
		$guardianIncome = '';

		$noOfSiblings =  $fulldetails['siblingno'];

		$isDSWDBen =  $fulldetails['dswd4p'];

		$schoolIntendedToEnroll =  $fulldetails['heiname'];
		$schoolIntendedToAddress =  $fulldetails['hei_address'];
		$schoolIntendedType = $fulldetails['hei_type'];

		$degree = $fulldetails['course'];
		$degreePriority = '';
		
        $degreeLen = strlen($degree);
		$degreeFont = '';
		if($degreeLen > 30) $degreeFont = '; font-size: 5pt';

		$enjoyingOtherSources = $fulldetails['other_assistance'];

		$firSourceType = $fulldetails['othertype1'];
		$firSourceAgency = $fulldetails['othertype1_name'];
		$secSourceType = $fulldetails['othertype2'];
		$secSourceAgency = $fulldetails['othertype2_name'];

		$printedName = $fname.' '.$mname.' '.$lname;
		$dateAccomplished = date("M d, Y", strtotime($fulldetails['time_encoded']));
		//$dateAccomplished = date('M d, Y');

// CHEDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD
		$soloParent = 'Yes';
		$seniorCitizen = 'Yes';
		$withDisability = 'Yes';
		$studDisability = ' ';
		$indigenous = 'Yes';
		$indigenousGroup = ' ';

		$reportCard = 'Yes';
		$grades = 'Yes';
		$itr = 'Yes';
		$taxEx = 'Yes';
		$indigencyCert = 'Yes';
		$csDSWD = 'Yes';
		$ofwCon = 'Yes';
		$soloParentDoc = 'Yes';
		$seniorCitizenDoc = 'Yes';
		$ips = 'Yes';
		$pwd = 'Yes';
		$chedStuf = '                                             ';
		$date =  ' ';
		

		// CONDITIONS
		if($soloParent == 'Yes') $soloParentCHK = '';
		if($seniorCitizen == 'Yes') $seniorCitizenCHK = '';
		if($withDisability == 'Yes') $withDisabilityCHK = '';
		if($studDisability == '') $studDisability = '__________'; else $studDisability = '<u>'.$studDisability.'</u>';
		if($indigenous == 'Yes') $indigenousCHK = '';
		if($indigenousGroup == '') $indigenousGroup = '__________'; else $indigenousGroup = '<u>'.$indigenousGroup.'</u>';

// END CHEDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD
		// CONDITIONS
		$mnamelen = strlen($mname);
		if($mnamelen > 12){
			$mnameFont = ';font-size: 4pt;';
		}else{
			$mnameFont= '';
		}

		$maidnamelen = strlen($maidname);
		if($maidnamelen > 20 && $maidnamelen < 23){
			$maidnamefont = "font-size: 5pt;";
		}elseif($maidnamelen > 22){
			$maidnamefont = "font-size: 4pt;";
		}

		$sexMale = '';
		$sexFemale = '';
			if($sex == 'Male'){
				$sexMale = 'checked';
			}elseif($sex == 'Female'){
				$sexFemale = 'checked';
			}
		
		$civilStatusSingle = '';
		$civilStatusMarried = '';
		$civilStatusAnnulled = '';
		$civilStatusWidowed = '';
		$civilStatusSeparated = '';
		$civilStatusOthers = '';
			if($civilStatus == 'Single'){
				$civilStatusSingle = 'checked';
			}elseif($civilStatus == 'Married'){
				$civilStatusMarried = 'checked';
			}elseif($civilStatus == 'Annulled'){
				$civilStatusAnnulled = 'checked';
			}elseif($civilStatus == 'Widowed'){
				$civilStatusWidowed = 'checked';
			}elseif($civilStatus == 'Separated'){
				$civilStatusSeparated = 'checked';
			}elseif($civilStatus == 'Others'){
				$civilStatusOthers = 'checked';
			}

		$schoolSectorPublic = ' ';
		$schoolSectorPrivate = ' ';
			if($schoolSector == 'Public'){
				$schoolSectorPublic = ' / ';
			}elseif($schoolSector == 'Private'){
				$schoolSectorPrivate = ' / ';
			}
		
		$schoolLastAttendedLen = strlen($schoolLastAttended);
		if($schoolLastAttendedLen > 53){
			$schoolLastAttendedFont = '; font-size: 5pt;';
		}else{
			$schoolLastAttendedFont = '';
		}

		$fatherStatusLiving = ' ';
		$fatherStatusDeceased = ' ';
			if($fatherStatus == 'Living'){
				$fatherStatusLiving = ' / ';
			}elseif($fatherStatus == 'Deceased'){
				$fatherStatusDeceased = ' / ';
			}

		$motherStatusLiving = ' ';
		$motherStatusDeceased = ' ';
			if($motherStatus == 'Living'){
				$motherStatusLiving = ' / ';
			}elseif($motherStatus == 'Deceased'){
				$motherStatusDeceased = ' / ';
			}
		
		// FATHER CONDITION
		$fatherNameLen = strlen($fatherName);
		$fatherNameFont = '';
		if($fatherNameLen > 37) $fatherNameFont = '; font-size: 5pt';

		$fatherAddressLen = strlen($fatherAddress);
		$fatherAddressFont = '';
		if($fatherAddressLen > 30) $fatherAddressFont = '; font-size: 5pt';

		$fatherContactNoLen = strlen($fatherContactNo);
		$fatherContactNoFont = '';
		if($fatherContactNoLen > 37) $fatherContactNoFont = '; font-size: 5pt';
		$fatherOccupationLen = strlen($fatherOccupation);
		$fatherOccupationFont = '';
		if($fatherOccupationLen > 37) $fatherOccupationFont = '; font-size: 5pt';
		$fatherEmployerLen = strlen($fatherEmployer);
		$fatherEmployerFont = '';
		if($fatherEmployerLen > 37) $fatherEmployerFont = '; font-size: 5pt';

		$fatherEmployerAddressLen = strlen($fatherEmployerAddress);
		$fatherEmployerAddressFont = '';
		if($fatherEmployerAddressLen > 37) $fatherEmployerAddressFont = '; font-size: 5pt';

		$fatherAttainedLen = strlen($fatherAttained);
		$fatherAttainedFont = '';
		if($fatherAttainedLen > 37) $fatherAttainedFont = '; font-size: 5pt';

		$fatherIncomeLen = strlen($fatherIncome);
		$fatherIncomeFont = '';
		if($fatherIncomeLen > 37) $fatherIncomeFont = '; font-size: 5pt';
		// END FATHER CONDITION

		// MOTHER CONDITION
		$motherNameLen = strlen($motherName);
		$motherNameFont = '';
		if($motherNameLen > 48) $motherNameFont = '; font-size: 5pt';

		$motherAddressLen = strlen($motherAddress);
		$motherAddressFont = '';
		if($motherAddressLen > 30) $motherAddressFont = '; font-size: 5pt';

		$motherContactNoLen = strlen($motherContactNo);
		$motherContactNoFont = '';
		if($motherContactNoLen > 48) $motherContactNoFont = '; font-size: 5pt';

		$motherOccupationLen = strlen($motherOccupation);
		$motherOccupationFont = '';
		if($motherOccupationLen > 48) $motherOccupationFont = '; font-size: 5pt';

		$motherEmployerLen = strlen($motherEmployer);
		$motherEmployerFont = '';
		if($motherEmployerLen > 30) $motherEmployerFont = '; font-size: 5pt';

		$motherEmployerAddressLen = strlen($motherEmployerAddress);
		$motherEmployerAddressFont = '';
		if($motherEmployerAddressLen > 48) $motherEmployerAddressFont = '; font-size: 5pt';

		$motherAttainedLen = strlen($motherAttained);
		$motherAttainedFont = '';
		if($motherAttainedLen > 48) $motherAttainedFont = '; font-size: 5pt';

		$motherIncomeLen = strlen($motherIncome);
		$motherIncomeFont = '';
		if($motherIncomeLen > 48) $motherIncomeFont = '; font-size: 5pt';
		// END MOTHER CONDITION

		// GUARDIAN CONDITION
		$guardianNameLen = strlen($guardianName);
		$guardianNameFont = '';
			if($guardianNameLen > 32){
				$guardianNameFont = '; font-size: 5pt';
			}

		$guardianAddressLen = strlen($guardianAddress);
		$guardianAddressFont = '';
			if($guardianAddressLen > 32){
				$guardianAddressFont = '; font-size: 5pt';
			}

		$guardianContactNoLen = strlen($guardianContactNo);
		$guardianContactNoFont = '';
		if($guardianContactNoLen > 32) $guardianContactNoFont = '; font-size: 5pt';

		$guardianOccupationLen = strlen($guardianOccupation);
		$guardianOccupationFont = '';
		if($guardianOccupationLen > 32) $guardianOccupationFont = '; font-size: 5pt';

		$guardianEmployerLen = strlen($guardianEmployer);
		$guardianEmployerFont = '';
		if($guardianEmployerLen > 32) $guardianEmployerFont = '; font-size: 5pt'; 

		$guardianEmployerAddressLen = strlen($guardianEmployerAddress);
		$guardianEmployerAddressFont = '';
		if($guardianEmployerAddressLen > 32) $guardianEmployerAddressFont = '; font-size: 5pt';

		$guardianAttainedLen = strlen($guardianAttained);
		$guardianAttainedFont = '';
		if($guardianAttainedLen > 32) $guardianAttainedFont = '; font-size: 5pt';

		$guardianIncomeLen = strlen($guardianIncome);
		$guardianIncomeFont = '';
		if($guardianIncomeLen > 32) $guardianIncomeFont = '; font-size: 5pt';

		if($chedStuf == '')
			$chedStuf = '__________________________________________';
		else
			$chedStuf = '<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$chedStuf.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>';

		if($date == '')
			$date = '__________________________________________';
		else
			$date = '<font style="width: 190px;">'.$date.'</font>';
		// END GUARDIAN CONDITION

		if($noOfSiblings == '') $noOfSiblings = '&nbsp;&nbsp;';

		$isDSWDBenYes = ' ';
		$isDSWDBenNo = ' ';
			if($isDSWDBen == 'Yes'){
				$isDSWDBenYes = ' / ';
			}elseif($isDSWDBen == 'No'){
				$isDSWDBenNo = ' / ';
			}

		$schoolIntendedTypePublic = ' ';
		$schoolIntendedTypePrivate = ' ';
			if($schoolIntendedType == 'Public'){
				$schoolIntendedTypePublic = ' / ';
			}elseif($schoolIntendedType == 'Private'){
				$schoolIntendedTypePrivate = ' / ';
			}

		$degreePriorityYes = ' ';
		$degreePriorityNo = ' ';
			if($degreePriority == 'Yes'){
				$degreePriorityYes = ' / ';
			}elseif($degreePriority == 'No'){
				$degreePriorityNo = ' / ';
			}

		$enjoyingOtherSourcesYes = ' ';
		$enjoyingOtherSourcesNo = ' ';
			if($enjoyingOtherSources == 'Yes'){
				$enjoyingOtherSourcesYes = ' / ';
			}elseif($enjoyingOtherSources == 'No'){
				$enjoyingOtherSourcesNo = ' / ';
			}

		if($firSourceType == '') $firSourceType = '_______';
		if($firSourceAgency == '') $firSourceAgency = '_________________';
		if($secSourceType == '') $secSourceType = '_______';
		if($secSourceAgency == '') $secSourceAgency = '_________________';


		if($reportCard == 'Yes') $reportCard = '  '; else $reportCard = '  ';
		if($grades == 'Yes') $grades = '  '; else $grades = '  '; 
		if($itr == 'Yes') $itr = '  '; else $itr = '  ';
		if($taxEx == 'Yes') $taxEx = '  '; else $taxEx = '  ';
		if($indigencyCert == 'Yes') $indigencyCert = '  '; else $indigencyCert = '  ';
		if($csDSWD == 'Yes') $csDSWD = '  '; else $csDSWD = '  ';
		if($ofwCon == 'Yes') $ofwCon = '  '; else $ofwCon = '  ';
		if($soloParentDoc == 'Yes') $soloParentDoc = '  '; else $soloParentDoc = '  ';
		if($seniorCitizenDoc == 'Yes') $seniorCitizenDoc = '  '; else $seniorCitizenDoc = '  ';
		if($ips == 'Yes') $ips = '  '; else $ips = '  ';
		if($pwd == 'Yes') $pwd = '  '; else $pwd = '  ';



		// $html_content = '<h3 align="center">Convert HTML to PDF in CodeIgniter using Dompdf</h3>';

		$html_content =$this->load->view('scholarshipapplication/stufpdf_view',$this->data, TRUE);
		// $html_content .= strlen($mname].'aasdsa';
		$html_content .= '
		<div>
			<b><i><font style="font-size: 7.5pt;">CHED-Scholarship Application Form: '.$applicationid.'<u></u><br>2019 version </font><font style="30pt;">(NOT FOR SALE)</font></i></b>
			<div style="margin-left: 677px; margin-top: -29px; font-family: Arial, sans-serif; font-size: 11pt;"><b><font>ANNEX "A"</font></div></div><br>
			<div class="colored" style="float: right; margin-top: -25px; width: 100px; height: 100px; border: 2px solid black; margin-right: 3px;">
				<img src="'.$pic2by2.'" height="100px;">
				
			</div>

			<div style="margin-top: 15px; margin-left: 40px; width: 132px; height: 132px; margin-right: 3px;"><img src="public/img/ched-logo.png" height="70px;"></div>
			<div style="margin-top: 9px; margin-left: 40px; margin-right: 3px; font-family: Arial, sans-serif; font-size: 7.5pt; margin-top: -125px;"><center><b>Office of the President of the Philippines<br>COMMISSION ON HIGHER EDUCATION<br>REGIONAL OFFICE 1</b></center></div>
			<div style="margin-top: 9px; margin-left: 30px; margin-right: 3px; font-family: Century Gothic, sans-serif; font-size: 10pt;"><center><b>CHED STUDENT FINANCIAL ASSISTANCE PROGRAMS (StuFAPs)<br><font style="font-size: 10pt;">APPLICATION FORM</font></b></center></div>
		</div>

		<div style="margin-top: 3px; margin-left: 2px; margin-right: 3px; font-family: Arial, sans-serif; font-size: 7pt;"><i>
			Instructions: Read General and Documentary Requirements. Fill in all the required information. Do not leave an item blank. If item is not applicable, indicate "N/A".</i>
		</div>
        <table class="b" style="border-collapse: collapse;border-left: none; border-right: none;">
        	<tbody hidden>
        		<tr>
        			<td colspan="13">
	    				<div>
							<div style="margin-left: 2px; margin-right: 3px; font-family: Arial, sans-serif; font-size: 8pt; font-weight: bold;">
								Application period: Until August 15 of the current academic year
							</div>
						</div>
					</td>
        		</tr>
        	</tbody>
            <tbody>';
        $html_content .= '
        				<tr><td colspan="13" class="colored" style="border-top: solid 2px black; border-bottom: solid 2px black"><center><b>PERSONAL INFORMATION</b></center></td></tr>
        				<tr>
        					<td class="colored" style="border-right: 1px solid black;">&nbsp;</td>
        					<td colspan="5" style="border-right: 1px solid black; overflow:auto; table-layout: fixed" class="input"><center>'.$lname.', '.$extensionname.'</center></td>
        					<td align="center" colspan="4" style="border-right: 1px solid black;"  class="input">'.$fname.'</td>
        					<td align="center" colspan="2" style="border-right: 1px solid black; '.$mnameFont.'"><font class="input">'.$mname.'</font></td>
        					<td align="center" class="input"><font style="'.$maidnamefont.'">'.$maidname.'</font></td>
        				</tr>
        				<tr width="100%">
        					<td class="colored" style="border-right: 1px solid black;" width="2%">1. Name</td>
        					<td colspan="5" class="colored" style="border-right: 1px solid black; border-left: 1px solid black;"><center><i>(Last Name)<br>put extension, if any: i.e. Jr., III</i></center></td>
        					<td class="colored" colspan="4" style="border-right: 1px solid black" width="20%">
        						<center><i>(First Name)</i></font>
        					</td>
        					<td colspan="2" class="colored" style="border-right: 1px solid black"  width="80%"><center><i>(Middle Name)</i></center></td>
        					<td class="colored" width="550%"><center><i>Maiden Name<br>(for Married Women)</i></center></td>
        				</tr>
        				<tr>
        					<td colspan="2" class="colored nowrap" style="border-top: 2px solid black; border-right: 1px solid black;">2. Date of Birth <font style="font-size: 6pt">(mm/dd/yy)</font></td>
        					<td colspan="4" style="border-top: 2px solid black;" class="input">'.$dob.'</td>
        					<td colspan="3" rowspan="2" class="colored" style="border-top: 2px solid black; border-right: 1px solid black; border-left: 2px solid black">9. Present Address</td>
        					<td colspan="4" rowspan="2" style="border-top: 2px solid black '.$presentAddressFont.'" width="40%" class="input">'.$presentAddress.'</td>
        				</tr>
        				<tr>
        					<td colspan="2" class="colored" style="border-right: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black">3. Place of Birth</td>
        					<td colspan="4" style="border-right: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black" class="input">'.$pob.'</td>
        					
        				</tr>
        				<tr>
        					<td colspan="2" class="colored" style="border-right: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black;" height="10">4. Sex</td>
        					<td colspan="4" valign="middle" style="border-right: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black">
        						<div style="height: 12px;">
        							<input type="checkbox" style="margin-top: -5.8pt;" '.$sexMale.'>
        							<div style="margin-top: -17px; margin-left: 17px;">Male</div>
        							<font style="margin-bottom: 10pt;">
        							<input type="checkbox" style="margin-top: -11.5px; margin-left: 50pt" '.$sexFemale.'></font>
        							<div style="margin-top: -33px; margin-left: 83px;">Female</div>
  
        						</div>
        					</td>
        					<td colspan="3" class="colored" style="border-right: 1px solid black; border-left: 2px solid black; border-bottom: 2px solid black">10. Zip Code</td>
        					<td colspan="4" style="border-top: 1px solid black; border-bottom: 2px solid black" class="input">'.$presentZip.'</td>
        				</tr>
        				<tr>
        					<td colspan="2" rowspan="3" class="colored" style="border-right: 1px solid black; border-bottom: 1px solid black">5. Civil Status</td>
        					<td colspan="4" rowspan="3" valign="middle" style="border-right: 2px solid black; border-bottom: 1px solid black" height="30">
	        					<div style="height: 12px;  margin-top: 1px;">
        							<input type="checkbox" style="margin-top: -3.8pt;" '.$civilStatusSingle.'>
        							<div style="margin-top: -19px; margin-left: 17px;">Single</div>
        							<font style="margin-bottom: 11pt;"><input type="checkbox" style="margin-top: -10px; margin-left: 50pt" '.$civilStatusSeparated.'></font>
        							<div style="margin-top: -30px; margin-left: 83px;">Widowed</div>
	        					</div>
	        					<div style="height: 12px; margin-top: 15px;">
        							<input type="checkbox" style="margin-top: -6.8pt;" '.$civilStatusMarried.'>
        							<div style="margin-top: -19px; margin-left: 17px;">Married</div>
        							<font style="margin-bottom: 10pt;"><input type="checkbox" style="margin-top: -10.5px; margin-left: 50pt" '.$civilStatusSeparated.'></font>
        							<div style="margin-top: -30px; margin-left: 83px;">Separated</div>
	        					</div>
	        					<div style="height: 12px; margin-top: 15px;">
        							<input type="checkbox" style="margin-top: -6.8pt;" '.$civilStatusAnnulled.'>
        							<div style="margin-top: -19px; margin-left: 17px;">Annulled</div>
        							<font style="margin-bottom: 10pt;"><input type="checkbox" style="margin-top: -12.5px; margin-left: 50pt" '.$civilStatusOthers.'></font>
        							<div style="margin-top: -32px; margin-left: 83px;">Others</div>
	        					</div>
        					
        					</td>
        					<td colspan="3" rowspan="2" class="colored" style="border-right: 1px solid black">9. Permanent Address</td>
        					<td colspan="4" class="input" rowspan="2" style="border-bottom: 1px solid black '.$permanentAddressFont.'">'.$permanentAddress.'</td>
        				</tr>
        				<tr>
        					<td colspan="4" style="border-bottom: 1px solid black"></td>
        				</tr>
        				<tr>
        					<td colspan="3" class="colored" style="border-bottom: 2px solid black; border-right: 1px solid black">10. Zip Code</td>
        					<td colspan="4" style="border-bottom: 2px solid black;" class="input">'.$permanentZip.'</td>
        				</tr>
        				<tr>
        					<td colspan="2" class="colored" style="border-right: 1px solid black; border-bottom: 1px solid black">6. Citizenship</td>
        					<td colspan="4" style="border-right: 1px solid black; border-bottom: 1px solid black" class="input">'.$citizenship.'</td>
        					<td colspan="3" class="colored" style="border-left: 2px solid black; border-right: 1px solid black; border-bottom: 1px solid black">11. Name of School Last Attended</td>
        					<td colspan="4" style="border-bottom: 1px solid black; '.$schoolLastAttendedFont.'" class="input">'.$schoolLastAttended.'</td>
        				</tr>
        				<tr>
        					<td colspan="2" class="colored" style="border-right: 1px solid black; border-bottom: 1px solid black">7. Mobile Number</td>
        					<td colspan="4" style="border-right: 1px solid black; border-bottom: 1px solid black" class="input">'.$mobileNo.'</td>
        					<td colspan="3" rowspan="2" class="colored" style="border-left: 2px solid black; border-bottom: 1px solid black; border-right: 1px solid black">12. School Address</td>
        					<td colspan="4" rowspan="2" style="border-bottom: 1px solid black" class="input">'.$schoolLastAttendedAddress.'</td>
        				</tr>
        				<tr>
        					<td colspan="2" class="colored" style="border-right: 1px solid black; border-bottom: 1px solid black">8. E-mail Address</td>
        					<td colspan="4" style="border-right: 1px solid black; border-bottom: 1px solid black" class="input">'.$email.'</td>
        				</tr>
        				<tr>
        					<td colspan="2" class="colored" style="border-right: 1px solid black; border-bottom: 1px solid black">13. School Sector:</td>
        					<td colspan="4" style="border-bottom: 1px solid black">(<b>'.$schoolSectorPublic.'</b>) Public (<b>'.$schoolSectorPrivate.'</b>) Private</td>
        					<td colspan="3" style="border-left: 2px solid black; border-bottom: 1px solid black" class="nowrap">15. Type of Disability (if applicable)</td>
        					<td colspan="4" style="border-left: 1px solid black; border-bottom: 1px solid black" class="input">'.$disability.'</td>
        				</tr>
        				<tr>
        					<td colspan="4" class="colored nowrap" style="border-right: 1px solid black; border-bottom: 1px solid black;">14. Highest Attained Grade/Year Level</td>
        					<td colspan="2" style="border-bottom: 1px solid black; font-size: 4.5pt" class="input" width="130%">'.$highestAttained.'</td>
        					<td colspan="3" class="colored nowrap" style="border-left: 2px solid black; border-bottom: 1px solid black">16. IP affiliation (if applicable)</td>
        					<td colspan="4" style="border-left: 1px solid black; border-bottom: 1px solid black" class="input">'.$ipAffiliation.'</td>
        				</tr>
        				<tr><td colspan="13" height="1"></td></tr>
        				<tr><td colspan="13" style="border-top: 1px solid black; border-bottom: 2px solid black"><center><b>FAMILY BACKGROUND</b></center></td></tr>
        				<tr>
        					<td colspan="3">
        						&nbsp;
        					</td>
        					<td class="border" colspan="4"  width="25%"><b>Father: (<b>'.$fatherStatusLiving.'</b>) Living (<b>'.$fatherStatusDeceased.'</b>) Deceased</b></td>
        					<td class="border" colspan="4"  width="60%"><center><b>Mother: (<b>'.$motherStatusLiving.'</b>) Living (<b>'.$motherStatusDeceased.'</b>) Deceased</b></center></td>
        					<td style="border-bottom: 2px solid black" colspan="2"><center><b>Legal Guardian</b></center></td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black">17. Name</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$fatherNameFont.'" class="input">'.$fatherName.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherNameFont.'" class="input">'.$motherName.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianNameFont.'" class="input">'.$guardianName.'</td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black">18. Address</td>
        					<td colspan="4" style=" border-bottom: 1px solid black; border-right: 2px solid black '.$fatherAddressFont.'" class="input">'.$fatherAddress.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherAddressFont.'" class="input">'.$motherAddress.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianAddressFont.'" class="input"><span style="overflow-wrap: break-word;word-wrap: break-word;hyphens: auto;max-width: 50px;">'.$guardianAddress.'</span></td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black">19. Contact Number</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$fatherContactNoFont.'" class="input">'.$fatherContactNo.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherContactNoFont.'" class="input">'.$motherContactNo.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianContactNoFont.'" class="input">'.$guardianContactNo.'</td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black">20. Occupation</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$fatherOccupationFont.'" class="input">'.$fatherOccupation.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherOccupationFont.'" class="input">'.$motherOccupation.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianOccupationFont.'" class="input">'.$guardianOccupation.'</td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black">21. Name of Employer</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$fatherEmployerFont.'" class="input">'.$fatherEmployer.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherEmployerFont.'" class="input">'.$motherEmployer.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianEmployerFont.'" class="input">'.$guardianEmployer.'</td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black">22. Employer Address</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$fatherEmployerAddressFont.'" class="input">'.$fatherEmployerAddress.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherEmployerAddressFont.'" class="input">'.$motherEmployerAddress.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianEmployerAddressFont.'" class="input">'.$guardianEmployerAddress.'</td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black; ">23. Highest Educational Attainment</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$fatherAttainedFont.'" class="input">'.$fatherAttained.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherAttainedFont.'" class="input">'.$motherAttained.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianAttainedFont.'" class="input">'.$guardianAttained.'</td>
        				</tr>
        				<tr>
        					<td colspan="3">24. Total Parents Taxable Income</td>
        					<td colspan="4" style="border-bottom: 2px solid black; border-right: 2px solid black; border-left: 2px solid black '.$fatherIncomeFont.'" class="input">'.$fatherIncome.'</td>
        					<td colspan="4" style="border-bottom: 2px solid black; border-right: 2px solid black '.$motherIncomeFont.'" class="input">'.$motherIncome.'</td>
        					<td colspan="2" style="border-bottom: 2px solid black;" width="90%"><font style="font-size: 5.5pt">24. No. of Siblings in the family 18 years old and below  <u class="input">'.$noOfSiblings.'</u></font></td>
        				</tr>
        				<tr>
        					<td colspan="13" height="1"></td>
        				</tr>
        				<tr>
        					<td style="border-top: 1px solid black; border-bottom: 1px solid black" colspan="13">25. Is your family a beneficiary of the DSWD&rsquo;s pantawid Pamilyang Pilipino Program (4Ps)? (<b>'.$isDSWDBenYes.'</b>) Yes (<b>'.$isDSWDBenNo.'</b>) No</td>
        				</tr>
        				<tr>
        					<td colspan="13" height="1" style="border-bottom: 2px solid black"></td>
        				</tr>
        				<tr>
        					<td class="colored" colspan="5">26. School Intended to enroll or enrolled in:</td>
        					<td colspan="8" style="border-bottom: 1px solid black;" class="input">'.$schoolIntendedToEnroll.'</td>
        				</tr>
        				<tr>
        					<td class="colored" colspan="5">27. School Address:</td>
        					<td colspan="8" style="border-bottom: 1px solid black;" >'.$schoolIntendedToAddress.'</td>
        				</tr>
        				<tr>
        					<td class="colored" colspan="5">28. Type of School:</td>
        					<td colspan="8">(<b>'.$schoolIntendedTypePublic.'</b>) Public (<b>'.$schoolIntendedTypePrivate.'</b>) Private</td>
        				</tr>
        				<tr>
        					<td class="colored" colspan="5">29. Degree Program:</td>
        					<td colspan="6" style="border-bottom: 1px solid black '.$degreeFont.'">'.$degree.'</td>
        					<td colspan="2"></td>
        				</tr>
        				<tr>
        					<td class="colored" colspan="5"></td>
        					<td colspan="1"></td>
        					<td colspan="3" align="right">Type</td>
        					<td colspan="4" align="left"><font style="margin-left: 10px;">Grantee Institution/Agency</font></td>
        				</tr>
        				<tr>
        					<td class="colored" colspan="6"><font style="font-size: 5pt;">30. Are you enjoying other sources of  educational/financial assistance? (<b>'.$enjoyingOtherSourcesYes.'</b>) Yes or (<b>'.$enjoyingOtherSourcesNo.'</b>) No</font></td>
        					<td colspan="3" align="right"><font style="font-size: 5pt; float: left">If yes, please specify</font>
        						1. <font class="input"><u>'.$firSourceType.'</u></font></td>
        					<td colspan="4"><font class="input"><u style="margin-left: 10px">'.$firSourceAgency.'</u></font></td>
        				</tr>
        				<tr>
        					<td colspan="6"></td>
        					<td colspan="3" align="right">2. <font class="input"><u>'.$secSourceType.'</u></font></td>
        					<td colspan="4"><font class="input"><u style="margin-left: 10px">'.$secSourceAgency.'</u></font></td>
        				</tr>
        				<tr>
        					<td colspan="13">
        						<font style="font-size: 5pt">
        							I hereby certify that foregoing statements are true and correct. Any misinformation or witholding of information will automatically disqualify me from the CHED Scholarship Program. I am willing to refund the financial benefits received if such information is discovered after acceptance of the award.
        						</font>
        					</td>
        				</tr>
        				<tr>
        					<td colspan="13">
        						<font style="font-size: 5pt">
        							I hereby express my consent for the Commission on Higher Education to collect, record, organize, update or modify, retrieve, consult, use, consolidate, block, erase or destruct my personal data as part of my information. I hereby affirm my right to be informed, object to processing, access and rectify, suspend or withdraw my personal data and be indemnified in case of damages pursuant to the provisions of the Republic Act No. 10173 of the Philippines, Data Privacy Act of 2012 and its corresponding Implementing Rules and Regulations.
        						</font>
        					</td>
        				</tr>
	        			<tr height="6">
	        				<td colspan="9">
                                                
                                                <center class="input" style="margin-top: 13px;">
                                      <img src="'.$signature.'" style="position:absolute; width:160px; left:150px; top:620px" />
                                                
                                                '.$printedName.'</center>
                                                    </td>
        					<td colspan="4">
        						<div style="margin-left: -220px">
        							<center class="input" style="margin-top: 13px;">'.$dateAccomplished.'</center>
        						</div>
        					</td>
	        			</tr>
        				<tr>
        					<td colspan="9">
	        					<div style="text-align: center; border-top: solid black 1px; width: 250px; margin-left: 92px;">
                                                        
	        						<center><i>(Signature over Printed Name of Applicant)</i>
	        						</center>
	        					</div>
        					</td>
        					<td colspan="4">
	        					<div style="text-align: center; border-top: solid black 1px; width: 130px; margin-left:-24px;">
	        						<center><i>Date Accomplished</i>
	        						</center>
	        					</div>
        					</td>
        				</tr>
        				<tr>
        					<td colspan="13"><center><i><b>Note: Fully accomplished form to be submitted to the CHEDRO</b></i></center></td>
        				</tr>
        				<tr>
        					<td colspan="13" style="border-top: 2px solid black; border-top-style: dashed;border-top: 2px solid black; border-top-style: dashed;"><center><b>DO NOT FILL-OUT THIS PORTION (FOR CHED USE ONLY)</b></center></td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black;"><center><b><i>Belongs to:  (any of the following groups)</i></b></center></td>
        					<td colspan="6"><center><b><i>Documents Attached:</i></b></center></td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black;">
        						<div style="height: 12px;">
        							<input type="checkbox" style="margin-top: -8.8pt;" '.$soloParentCHK.'>
        							<div style="margin-top: -17px; margin-left: 17px;"><b>dependent of solo parent</b></div>
        						</div>
        					<td colspan="6">1. Academic</td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black;">
        						<div style="height: 12px;">
        							<input type="checkbox" style="margin-top: -6.8pt;" '.$seniorCitizenCHK.'>
        							<div style="margin-top: -17px; margin-left: 17px;"><b>senior citizens</b></div>
        						</div>
        					</td>
        					<td colspan="6"><i><b style="margin-left: 20px;">(<b>'.$reportCard.'</b>) Report Card (<b>'.$grades.'</b>) Copy of Grades: Grade 11 and 1st semester of Grade 12</i></b></td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black;">
        						<div style="height: 12px;">
        							<input type="checkbox" style="margin-top: -3.8pt;"  '.$withDisabilityCHK.'>
        							<div style="margin-top: -17px; margin-left: 17px;"><b>persons with disabilities</b> <font style="font-size: 5pt">please specify type of disability</font> <font class="input">'.$studDisability.'</font>
        						</div>
        					</td>
        					<td colspan="6">2. Financial</td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black;">
        						<div style="height: 12px;">
        							<input type="checkbox" style="margin-top: -1.8pt;" '.$indigenousCHK.'>
        							<div style="margin-top: -17px; margin-left: 17px;"><b>indigenous and ethnic peoples</b> <font style="font-size: 5pt">please specify membership</font> <font class="input">'.$indigenousGroup.'</font>
        						</div>
        					</td>
        					<td colspan="6"><i><b style="margin-left: 20px;">(<b>'.$itr.'</b>) ITR (<b>'.$taxEx.'</b>) Tax Exemption (<b>'.$indigencyCert.'</b>) Certifcate of Indigency</i></b></td>
        				</tr>

        				<tr>
        					<td colspan="7" style="border-right: 1px solid black"></td>
        					<td colspan="6"><i><b style="margin-left: 20px;">(<b>'.$csDSWD.'</b>) Case Study DSWD (<b>'.$ofwCon.'</b>) OFW Contract</i></b></td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black"></td>
        					<td colspan="6">3. Others</td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black; border-bottom: 2px solid black"></td>
        					<td colspan="6" style="border-bottom: 2px solid black"><i><b style="margin-left: 20px;">(<b>'.$soloParentDoc.'</b>) Solo Parent (<b>'.$seniorCitizenDoc.'</b>) Senior Citizen (<b>'.$ips.'</b>) IPs (<b>'.$pwd.'</b>) PWD</i></b></td>
        				</tr> 
        				<tr>
        					<td colspan="3" style="border-right: 1px solid black" width="130%">School intended to enrol in</td>
        					<td colspan="10" class="input">'.$schoolIntendedToEnroll.'</td>
        				</tr> 
        				<tr>
        					<td colspan="3" style="border-right: 1px solid black">School address</td>
        					<td colspan="10" class="input">'.$schoolIntendedToAddress.'</td>
        				</tr> 
        				<tr>
        					<td colspan="3" style="border-right: 1px solid black">Type of School</td>
        					<td colspan="10">(<b>'.$schoolIntendedTypePublic.'</b>) Public (<b>'.$schoolIntendedTypePrivate.'</b>) Private</td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 1px solid black">Course</td>
        					<td colspan="5" class="input"><span style="color:black '.$degreeFont.'">'.$degree.'</span></td>
        					<td colspan="5"><center>(<b>'.$degreePriorityYes.'</b>) Priority (<b>'.$degreePriorityNo.'</b>) Non-Priority</center></td>
        				</tr>
        				<tr>
        					<td colspan="3" height=".01px" style="border-right: 1px solid black; border-top: 1px solid black; border-bottom: 2px solid black"></td>
        					<td colspan="10" style="border-top: 1px solid black; border-bottom: 2px solid black"></td>
        				</tr>
        				<tr>
        					<td colspan="13"><i><b>Evaluated/Processed by:</i></b></td>
        				</tr>
        				<tr>
        					<td colspan="4" style="width: 300%; max-width: 300%" class="nowrap">
        						<div><center><b>'.$chedStuf.'</b></center></div>
        					</td>
        					<td colspan="3"></td>
        					<td colspan="4" style="border-bottom: 1px solid black;" class="nowrap"><center><b>'.$date.'</b></center>
        					</td>
        					<td colspan="2"></td>
        				</tr>
        				<tr>
        					<td colspan="4"><center><i><b>CHED StuFAP Coordinator</b></i><center></td>
        					<td colspan="3"></td>
        					<td colspan="4"><center><i><b>Date</b></i></center></td>
        					<td colspan="2"></td>
        				</tr>
        				<tr>
	        				<td colspan="7" style="border-top: 2px solid black; border-bottom: 2px solid black; border-right: 2px solid black;font-size:8px;" ><b>CRITERIA OF ELIGIBILITY per  CMO 8, s. 2019</b>
	        					<ol style="margin-top: auto; margin-left: -20px;">
	        						<li>Filipino citizen;</li>
	        						<li>Graduating high school students/High school graduate</li>
	        						<li>General Weighted Average (GWA) of at least 90% or above.</li>
	        						<li>Combined annual gross income of parents/guardian not to exceed Four Hundred Thousand Pesos (PhP400,000.00) or solo parent/guardian whose annual gross income does not exceed the said amount; In highly exceptional cases where income exceeds Php400,000.00, the CHEDRO StuFAPs Committee shall determine the merits of the application</li>
	        						<li>Avail of only one government funded financial assistance program.</li>
	        						<b style="font-size: 7pt">NOTE:<br>Beneficiaries of free higher education under RA 10931 can only receive stipend under this program</b>
	        					</ol>
	        					

	        				</td>
	        				<td colspan="6" style="border-top: 2px solid black;border-bottom: 2px solid black;font-size:8px;" width="75%"><b>DOCUMENTARY REQUIREMENTS  per  CMO 8, s. 2019</b>
	        					<br>Academic Requirements - any one of the following:
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;1. High school report card
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;2. Duly certified true copy of grades for Grade 11 and 1st semester of Grade 12 for<br><u><font style="margin-left: 24px;">graduating high school students</font></u>
	        					<br><b>Income Requirements</b> - any one of the following:
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;1. Latest ITR of parents or guardian if employed
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;2. Certificate of Tax Exemption from the BIR
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;3. Certificate of Indigency from their Barangay
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;4. Certificate/Case Study from DSWD
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;5. Latest copy of contract or proof of income for children of Overseas Filipino
	        					<br><font style="margin-left: 24px;">Workers (OFW) and seafarers.</font>
	        				</td>
        				</tr>
        				';
        $html_content .= '</tbody>
        </table>';
		
		$html_content .= '</main></body></html>';
               
           

		$this->pdf->set_option("isPhpEnabled", true);
		$this->pdf->loadHtml($html_content);

		$this->pdf->render();

		$canvas = $this->pdf->get_canvas();
                
                
		$filename = "CHEDRO1-StuFAPs-Application-".$appid.".pdf";

		// $font = Font_Metrics::get_font("helvetica", "bold"];
		// $font = $this->pdf->getFont("helvetica", "bold"];
		// $canvas->page_text(552, 20, "Page {PAGE_NUM}/{PAGE_COUNT}", '',  10, array(0,0,0]];
		//echo "end!";exit;
		//$f;
//$l;
//if(headers_sent($f,$l))
//{
    //echo $f,'<br/>',$l,'<br/>';
   // die('now detect line');
//}
		echo $this->pdf->stream($filename, array("Attachment"=>1));
		
		// $this->pdf->Output("".$statementNo.".pdf", array("Attachment"=>0]];
		echo $output = $this->pdf->Output("sample.pdf",'F'); 
		exit();
		//header('Content-Type: application/octet-stream'];
		//header("Content-Transfer-Encoding: Binary"]; 
		
		//}//end if post condigtion
		//else{
			//header("Location: "];
		//}
               
                
                
		
	}
	
	public function reprint($applicationid,$mobileno){
	    
		//if ($this->input->server('REQUEST_METHOD'] == 'POST']{
		ob_start();
		//$applicationid = $this->input->post('applicationno');
		//$mobileno = $this->input->post('mno');
		//$applicationid = "52190";
		//$mobileno = "639304412577";
		
		$fulldetails = $this->onlineapplication_model->onlinedetails($applicationid,$mobileno);
		
		if($fulldetails==null){
			
			header("Location: ". base_url());
		}
		
		$data = $this->data;
		$appid = $applicationid;
		$extensionname = $fulldetails['extension'];
		$lname = $fulldetails['lastname'];
		$fname = $fulldetails['firstname'];
		$mname = $fulldetails['middlename'];
		$maidname = $fulldetails['maiden_name'];
		$maidnamefont = '';
		
		//$date_format = date_format($fulldetails['dateofbirth'],"m/d/Y");
		$date_format = date("m/d/Y", strtotime($fulldetails['dateofbirth']));

		$dob =$date_format ;
		$pob = $fulldetails['placeofbirth'];
		$sex = $fulldetails['gender'];
		$civilStatus = $fulldetails['civilstatus'];
		$citizenship = $fulldetails['citizenship'];
		$mobileNo = $fulldetails['contactno'];
		$email = $fulldetails['email'];
		$schoolSector = $fulldetails['hsgraduated_sector'];
		$highestAttained = $fulldetails['year_level'];

		// PRESENT ADDRESS
		$presentAddress = $fulldetails['pr_barangay'].", ".$fulldetails['pr_towncity'].", ".$fulldetails['pr_province'];
		$presentZip =  $fulldetails['pr_zipcode'];

		// PERMANENT ADDRESS
		$permanentAddress =  $fulldetails['barangay'].", ".$fulldetails['towncity'].", ".$fulldetails['province'];
		$permanentZip =  $fulldetails['zipcode'];

		$schoolLastAttended = $fulldetails['hsgraduated'];
		$schoolLastAttendedAddress = $fulldetails['hsgraduated_address'];
		
		$disability = $fulldetails['disability'];
		$ipAffiliation = $fulldetails['ip_affiliation'];

		// FATHER
		$fatherStatus =  $fulldetails['fstatus'];
		$fatherName =  $fulldetails['father']." ".$fulldetails['father_m']." ".$fulldetails['father_l'];
		$fatherAddress =  $fulldetails['f_address'];
		$fatherContactNo =  $fulldetails['f_contactno'];
		$fatherOccupation =  $fulldetails['foccupation'];
		$fatherEmployer =  $fulldetails['f_employer'];
		$fatherEmployerAddress =  $fulldetails['f_employer_address'];
		$fatherAttained =  $fulldetails['f_highesteduc'];
		$fatherIncome =  $fulldetails['income'];

		// MOTHER
		$motherStatus =  $fulldetails['mstatus'];
		$motherName =  $fulldetails['mother']." ".$fulldetails['mother_m']." ".$fulldetails['mother_l'];
		$motherAddress =  $fulldetails['m_address'];
		$motherContactNo =  $fulldetails['m_contactno'];
		$motherOccupation =  $fulldetails['moccupation'];
		$motherEmployer =  $fulldetails['m_employer'];
		$motherEmployerAddress =  $fulldetails['m_employer_address'];
		$motherAttained =  $fulldetails['m_highesteduc'];
		$motherIncome =  "";

		// GUARDIAN
		$guardianStatus = '';
		$guardianName = $fulldetails['guard_fname']." ".$fulldetails['guard_mname']." ".$fulldetails['guard_lname'];
		$guardianAddress = $fulldetails['guard_address'];
		$guardianContactNo = $fulldetails['guard_contact'];
		$guardianOccupation = $fulldetails['guard_occupation'];
		$guardianEmployer = $fulldetails['guard_employer'];
		$guardianEmployerAddress = $fulldetails['guard_empaddress'];
		$guardianAttained = $fulldetails['guard_highesteduc'];
		$guardianIncome = '';

		$noOfSiblings =  $fulldetails['siblingno'];

		$isDSWDBen =  $fulldetails['dswd4p'];

		$schoolIntendedToEnroll =  $fulldetails['heiname'];
		$schoolIntendedToAddress =  $fulldetails['hei_address'];
		$schoolIntendedType = $fulldetails['hei_type'];

		$degree = $fulldetails['course'];
		$degreePriority = '';
		$pic2by2= $fulldetails['picby2'];
		$signature= $fulldetails['signature'];
		
		
		$degreeLen = strlen($degree);
		$degreeFont = '';
		if($degreeLen > 30) $degreeFont = '; font-size: 5pt';


		$enjoyingOtherSources = $fulldetails['other_assistance'];

		$firSourceType = $fulldetails['othertype1'];
		$firSourceAgency = $fulldetails['othertype1_name'];
		$secSourceType = $fulldetails['othertype2'];
		$secSourceAgency = $fulldetails['othertype2_name'];

		$printedName = $fname.' '.$mname.' '.$lname;
		$dateAccomplished = date("M d, Y", strtotime($fulldetails['time_encoded']));
		//$dateAccomplished = date('M d, Y');

// CHEDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD
		$soloParent = 'Yes';
		$seniorCitizen = 'Yes';
		$withDisability = 'Yes';
		$studDisability = ' ';
		$indigenous = 'Yes';
		$indigenousGroup = ' ';

		$reportCard = 'Yes';
		$grades = 'Yes';
		$itr = 'Yes';
		$taxEx = 'Yes';
		$indigencyCert = 'Yes';
		$csDSWD = 'Yes';
		$ofwCon = 'Yes';
		$soloParentDoc = 'Yes';
		$seniorCitizenDoc = 'Yes';
		$ips = 'Yes';
		$pwd = 'Yes';
		$chedStuf = '                                             ';
		$date =  ' ';
		

		// CONDITIONS
		if($soloParent == 'Yes') $soloParentCHK = '';
		if($seniorCitizen == 'Yes') $seniorCitizenCHK = '';
		if($withDisability == 'Yes') $withDisabilityCHK = '';
		if($studDisability == '') $studDisability = '__________'; else $studDisability = '<u>'.$studDisability.'</u>';
		if($indigenous == 'Yes') $indigenousCHK = '';
		if($indigenousGroup == '') $indigenousGroup = '__________'; else $indigenousGroup = '<u>'.$indigenousGroup.'</u>';

// END CHEDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD
		// CONDITIONS
		$mnamelen = strlen($mname);
		if($mnamelen > 12){
			$mnameFont = ';font-size: 4pt;';
		}else{
			$mnameFont= '';
		}

		$maidnamelen = strlen($maidname);
		if($maidnamelen > 20 && $maidnamelen < 23){
			$maidnamefont = "font-size: 5pt;";
		}elseif($maidnamelen > 22){
			$maidnamefont = "font-size: 4pt;";
		}

		$sexMale = '';
		$sexFemale = '';
			if($sex == 'Male'){
				$sexMale = 'checked';
			}elseif($sex == 'Female'){
				$sexFemale = 'checked';
			}
		
		$civilStatusSingle = '';
		$civilStatusMarried = '';
		$civilStatusAnnulled = '';
		$civilStatusWidowed = '';
		$civilStatusSeparated = '';
		$civilStatusOthers = '';
			if($civilStatus == 'Single'){
				$civilStatusSingle = 'checked';
			}elseif($civilStatus == 'Married'){
				$civilStatusMarried = 'checked';
			}elseif($civilStatus == 'Annulled'){
				$civilStatusAnnulled = 'checked';
			}elseif($civilStatus == 'Widowed'){
				$civilStatusWidowed = 'checked';
			}elseif($civilStatus == 'Separated'){
				$civilStatusSeparated = 'checked';
			}elseif($civilStatus == 'Others'){
				$civilStatusOthers = 'checked';
			}

		$schoolSectorPublic = ' ';
		$schoolSectorPrivate = ' ';
			if($schoolSector == 'Public'){
				$schoolSectorPublic = ' / ';
			}elseif($schoolSector == 'Private'){
				$schoolSectorPrivate = ' / ';
			}
		
		$schoolLastAttendedLen = strlen($schoolLastAttended);
		if($schoolLastAttendedLen > 53){
			$schoolLastAttendedFont = '; font-size: 5pt;';
		}else{
			$schoolLastAttendedFont = '';
		}

		$fatherStatusLiving = ' ';
		$fatherStatusDeceased = ' ';
			if($fatherStatus == 'Living'){
				$fatherStatusLiving = ' / ';
			}elseif($fatherStatus == 'Deceased'){
				$fatherStatusDeceased = ' / ';
			}

		$motherStatusLiving = ' ';
		$motherStatusDeceased = ' ';
			if($motherStatus == 'Living'){
				$motherStatusLiving = ' / ';
			}elseif($motherStatus == 'Deceased'){
				$motherStatusDeceased = ' / ';
			}
		
		// FATHER CONDITION
		$fatherNameLen = strlen($fatherName);
		$fatherNameFont = '';
		if($fatherNameLen > 37) $fatherNameFont = '; font-size: 5pt';

		$fatherAddressLen = strlen($fatherAddress);
		$fatherAddressFont = '';
		if($fatherAddressLen > 30) $fatherAddressFont = '; font-size: 5pt';

		$fatherContactNoLen = strlen($fatherContactNo);
		$fatherContactNoFont = '';
		if($fatherContactNoLen > 37) $fatherContactNoFont = '; font-size: 5pt';
		$fatherOccupationLen = strlen($fatherOccupation);
		$fatherOccupationFont = '';
		if($fatherOccupationLen > 37) $fatherOccupationFont = '; font-size: 5pt';
		$fatherEmployerLen = strlen($fatherEmployer);
		$fatherEmployerFont = '';
		if($fatherEmployerLen > 37) $fatherEmployerFont = '; font-size: 5pt';

		$fatherEmployerAddressLen = strlen($fatherEmployerAddress);
		$fatherEmployerAddressFont = '';
		if($fatherEmployerAddressLen > 30) $fatherEmployerAddressFont = '; font-size: 5pt';

		$fatherAttainedLen = strlen($fatherAttained);
		$fatherAttainedFont = '';
		if($fatherAttainedLen > 37) $fatherAttainedFont = '; font-size: 5pt';

		$fatherIncomeLen = strlen($fatherIncome);
		$fatherIncomeFont = '';
		if($fatherIncomeLen > 37) $fatherIncomeFont = '; font-size: 5pt';
		// END FATHER CONDITION

		// MOTHER CONDITION
		$motherNameLen = strlen($motherName);
		$motherNameFont = '';
		if($motherNameLen > 48) $motherNameFont = '; font-size: 5pt';

		$motherAddressLen = strlen($motherAddress);
		$motherAddressFont = '';
		if($motherAddressLen > 30) $motherAddressFont = '; font-size: 5pt';

		$motherContactNoLen = strlen($motherContactNo);
		$motherContactNoFont = '';
		if($motherContactNoLen > 48) $motherContactNoFont = '; font-size: 5pt';

		$motherOccupationLen = strlen($motherOccupation);
		$motherOccupationFont = '';
		if($motherOccupationLen > 48) $motherOccupationFont = '; font-size: 5pt';

		$motherEmployerLen = strlen($motherEmployer);
		$motherEmployerFont = '';
		if($motherEmployerLen > 30) $motherEmployerFont = '; font-size: 5pt';

		$motherEmployerAddressLen = strlen($motherEmployerAddress);
		$motherEmployerAddressFont = '';
		if($motherEmployerAddressLen > 30) $motherEmployerAddressFont = '; font-size: 5pt';

		$motherAttainedLen = strlen($motherAttained);
		$motherAttainedFont = '';
		if($motherAttainedLen > 48) $motherAttainedFont = '; font-size: 5pt';

		$motherIncomeLen = strlen($motherIncome);
		$motherIncomeFont = '';
		if($motherIncomeLen > 48) $motherIncomeFont = '; font-size: 5pt';
		// END MOTHER CONDITION

		// GUARDIAN CONDITION
		$guardianNameLen = strlen($guardianName);
		$guardianNameFont = '';
			if($guardianNameLen > 32){
				$guardianNameFont = '; font-size: 5pt';
			}

		$guardianAddressLen = strlen($guardianAddress);
		$guardianAddressFont = '';
			if($guardianAddressLen > 32){
				$guardianAddressFont = '; font-size: 5pt';
			}

		$guardianContactNoLen = strlen($guardianContactNo);
		$guardianContactNoFont = '';
		if($guardianContactNoLen > 32) $guardianContactNoFont = '; font-size: 5pt';

		$guardianOccupationLen = strlen($guardianOccupation);
		$guardianOccupationFont = '';
		if($guardianOccupationLen > 32) $guardianOccupationFont = '; font-size: 5pt';

		$guardianEmployerLen = strlen($guardianEmployer);
		$guardianEmployerFont = '';
		if($guardianEmployerLen > 32) $guardianEmployerFont = '; font-size: 5pt'; 

		$guardianEmployerAddressLen = strlen($guardianEmployerAddress);
		$guardianEmployerAddressFont = '';
		if($guardianEmployerAddressLen > 32) $guardianEmployerAddressFont = '; font-size: 5pt';

		$guardianAttainedLen = strlen($guardianAttained);
		$guardianAttainedFont = '';
		if($guardianAttainedLen > 32) $guardianAttainedFont = '; font-size: 5pt';

		$guardianIncomeLen = strlen($guardianIncome);
		$guardianIncomeFont = '';
		if($guardianIncomeLen > 32) $guardianIncomeFont = '; font-size: 5pt';

		if($chedStuf == '')
			$chedStuf = '__________________________________________';
		else
			$chedStuf = '<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$chedStuf.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>';

		if($date == '')
			$date = '__________________________________________';
		else
			$date = '<font style="width: 190px;">'.$date.'</font>';
		// END GUARDIAN CONDITION

		if($noOfSiblings == '') $noOfSiblings = '&nbsp;&nbsp;';

		$isDSWDBenYes = ' ';
		$isDSWDBenNo = ' ';
			if($isDSWDBen == 'Yes'){
				$isDSWDBenYes = ' / ';
			}elseif($isDSWDBen == 'No'){
				$isDSWDBenNo = ' / ';
			}

		$schoolIntendedTypePublic = ' ';
		$schoolIntendedTypePrivate = ' ';
			if($schoolIntendedType == 'Public'){
				$schoolIntendedTypePublic = ' / ';
			}elseif($schoolIntendedType == 'Private'){
				$schoolIntendedTypePrivate = ' / ';
			}

		$degreePriorityYes = ' ';
		$degreePriorityNo = ' ';
			if($degreePriority == 'Yes'){
				$degreePriorityYes = ' / ';
			}elseif($degreePriority == 'No'){
				$degreePriorityNo = ' / ';
			}

		$enjoyingOtherSourcesYes = ' ';
		$enjoyingOtherSourcesNo = ' ';
			if($enjoyingOtherSources == 'Yes'){
				$enjoyingOtherSourcesYes = ' / ';
			}elseif($enjoyingOtherSources == 'No'){
				$enjoyingOtherSourcesNo = ' / ';
			}

		if($firSourceType == '') $firSourceType = '_______';
		if($firSourceAgency == '') $firSourceAgency = '_________________';
		if($secSourceType == '') $secSourceType = '_______';
		if($secSourceAgency == '') $secSourceAgency = '_________________';


		if($reportCard == 'Yes') $reportCard = '  '; else $reportCard = '  ';
		if($grades == 'Yes') $grades = '  '; else $grades = '  '; 
		if($itr == 'Yes') $itr = '  '; else $itr = '  ';
		if($taxEx == 'Yes') $taxEx = '  '; else $taxEx = '  ';
		if($indigencyCert == 'Yes') $indigencyCert = '  '; else $indigencyCert = '  ';
		if($csDSWD == 'Yes') $csDSWD = '  '; else $csDSWD = '  ';
		if($ofwCon == 'Yes') $ofwCon = '  '; else $ofwCon = '  ';
		if($soloParentDoc == 'Yes') $soloParentDoc = '  '; else $soloParentDoc = '  ';
		if($seniorCitizenDoc == 'Yes') $seniorCitizenDoc = '  '; else $seniorCitizenDoc = '  ';
		if($ips == 'Yes') $ips = '  '; else $ips = '  ';
		if($pwd == 'Yes') $pwd = '  '; else $pwd = '  ';



		// $html_content = '<h3 align="center">Convert HTML to PDF in CodeIgniter using Dompdf</h3>';

		$html_content =$this->load->view('scholarshipapplication/stufpdf_view',$this->data, TRUE);
		// $html_content .= strlen($mname].'aasdsa';
		$html_content .= '
		<div>
			<b><i><font style="font-size: 7.5pt;">CHED-Scholarship Application Form: '.$applicationid.'<u></u><br>2019 version </font><font style="30pt;">(NOT FOR SALE)</font></i></b>
			<div style="margin-left: 677px; margin-top: -29px; font-family: Arial, sans-serif; font-size: 11pt;"><b><font>ANNEX "A"</font></div></div><br>
			<div class="colored" style="float: right; margin-top: -25px; width: 100px; height: 100px; border: 2px solid black; margin-right: 3px;">
				<img src="'.$pic2by2.'" height="100px;">
			</div>

			<div style="margin-top: 15px; margin-left: 40px; width: 132px; height: 132px; margin-right: 3px;"><img src="public/img/ched-logo.png" height="70px;"></div>
			<div style="margin-top: 9px; margin-left: 40px; margin-right: 3px; font-family: Arial, sans-serif; font-size: 7.5pt; margin-top: -125px;"><center><b>Office of the President of the Philippines<br>COMMISSION ON HIGHER EDUCATION<br>REGIONAL OFFICE 1</b></center></div>
			<div style="margin-top: 9px; margin-left: 30px; margin-right: 3px; font-family: Century Gothic, sans-serif; font-size: 10pt;"><center><b>CHED STUDENT FINANCIAL ASSISTANCE PROGRAMS (StuFAPs)<br><font style="font-size: 10pt;">APPLICATION FORM</font></b></center></div>
		</div>

		<div style="margin-top: 3px; margin-left: 2px; margin-right: 3px; font-family: Arial, sans-serif; font-size: 7pt;"><i>
			Instructions: Read General and Documentary Requirements. Fill in all the required information. Do not leave an item blank. If item is not applicable, indicate "N/A".</i>
		</div>
        <table class="b" style="border-collapse: collapse;border-left: none; border-right: none;">
        	<tbody hidden>
        		<tr>
        			<td colspan="13">
	    				<div>
							<div style="margin-left: 2px; margin-right: 3px; font-family: Arial, sans-serif; font-size: 8pt; font-weight: bold;">
								Application period: Until August 15 of the current academic year
							</div>
						</div>
					</td>
        		</tr>
        	</tbody>
            <tbody>';
        $html_content .= '
        				<tr><td colspan="13" class="colored" style="border-top: solid 2px black; border-bottom: solid 2px black"><center><b>PERSONAL INFORMATION</b></center></td></tr>
        				<tr>
        					<td class="colored" style="border-right: 1px solid black;">&nbsp;</td>
        					<td colspan="5" style="border-right: 1px solid black; overflow:auto; table-layout: fixed" class="input"><center>'.$lname.', '.$extensionname.'</center></td>
        					<td align="center" colspan="4" style="border-right: 1px solid black;"  class="input">'.$fname.'</td>
        					<td align="center" colspan="2" style="border-right: 1px solid black; '.$mnameFont.'"><font class="input">'.$mname.'</font></td>
        					<td align="center" class="input"><font style="'.$maidnamefont.'">'.$maidname.'</font></td>
        				</tr>
        				<tr width="100%">
        					<td class="colored" style="border-right: 1px solid black;" width="2%">1. Name</td>
        					<td colspan="5" class="colored" style="border-right: 1px solid black; border-left: 1px solid black;"><center><i>(Last Name)<br>put extension, if any: i.e. Jr., III</i></center></td>
        					<td class="colored" colspan="4" style="border-right: 1px solid black" width="20%">
        						<center><i>(First Name)</i></font>
        					</td>
        					<td colspan="2" class="colored" style="border-right: 1px solid black"  width="80%"><center><i>(Middle Name)</i></center></td>
        					<td class="colored" width="550%"><center><i>Maiden Name<br>(for Married Women)</i></center></td>
        				</tr>
        				<tr>
        					<td colspan="2" class="colored nowrap" style="border-top: 2px solid black; border-right: 1px solid black;">2. Date of Birth <font style="font-size: 6pt">(mm/dd/yy)</font></td>
        					<td colspan="4" style="border-top: 2px solid black;" class="input">'.$dob.'</td>
        					<td colspan="3" rowspan="2" class="colored" style="border-top: 2px solid black; border-right: 1px solid black; border-left: 2px solid black">9. Present Address</td>
        					<td colspan="4" rowspan="2" style="border-top: 2px solid black '.$presentAddressFont.';" width="40%" class="input">'.$presentAddress.'</td>
        				</tr>
        				<tr>
        					<td colspan="2" class="colored" style="border-right: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black">3. Place of Birth</td>
        					<td colspan="4" style="border-right: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black" class="input">'.$pob.'</td>
        					
        				</tr>
        				<tr>
        					<td colspan="2" class="colored" style="border-right: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black;" height="10">4. Sex</td>
        					<td colspan="4" valign="middle" style="border-right: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black">
        						<div style="height: 12px;">
        							<input type="checkbox" style="margin-top: -5.8pt;" '.$sexMale.'>
        							<div style="margin-top: -17px; margin-left: 17px;">Male</div>
        							<font style="margin-bottom: 10pt;">
        							<input type="checkbox" style="margin-top: -11.5px; margin-left: 50pt" '.$sexFemale.'></font>
        							<div style="margin-top: -33px; margin-left: 83px;">Female</div>
  
        						</div>
        					</td>
        					<td colspan="3" class="colored" style="border-right: 1px solid black; border-left: 2px solid black; border-bottom: 2px solid black">10. Zip Code</td>
        					<td colspan="4" style="border-top: 1px solid black; border-bottom: 2px solid black" class="input">'.$presentZip.'</td>
        				</tr>
        				<tr>
        					<td colspan="2" rowspan="3" class="colored" style="border-right: 1px solid black; border-bottom: 1px solid black">5. Civil Status</td>
        					<td colspan="4" rowspan="3" valign="middle" style="border-right: 2px solid black; border-bottom: 1px solid black" height="30">
	        					<div style="height: 12px;  margin-top: 1px;">
        							<input type="checkbox" style="margin-top: -3.8pt;" '.$civilStatusSingle.'>
        							<div style="margin-top: -19px; margin-left: 17px;">Single</div>
        							<font style="margin-bottom: 11pt;"><input type="checkbox" style="margin-top: -10px; margin-left: 50pt" '.$civilStatusSeparated.'></font>
        							<div style="margin-top: -30px; margin-left: 83px;">Widowed</div>
	        					</div>
	        					<div style="height: 12px; margin-top: 15px;">
        							<input type="checkbox" style="margin-top: -6.8pt;" '.$civilStatusMarried.'>
        							<div style="margin-top: -19px; margin-left: 17px;">Married</div>
        							<font style="margin-bottom: 10pt;"><input type="checkbox" style="margin-top: -10.5px; margin-left: 50pt" '.$civilStatusSeparated.'></font>
        							<div style="margin-top: -30px; margin-left: 83px;">Separated</div>
	        					</div>
	        					<div style="height: 12px; margin-top: 15px;">
        							<input type="checkbox" style="margin-top: -6.8pt;" '.$civilStatusAnnulled.'>
        							<div style="margin-top: -19px; margin-left: 17px;">Annulled</div>
        							<font style="margin-bottom: 10pt;"><input type="checkbox" style="margin-top: -12.5px; margin-left: 50pt" '.$civilStatusOthers.'></font>
        							<div style="margin-top: -32px; margin-left: 83px;">Others</div>
	        					</div>
        					
        					</td>
        					<td colspan="3" rowspan="2" class="colored" style="border-right: 1px solid black">9. Permanent Address</td>
        					<td colspan="4" class="input" rowspan="2" style="border-bottom: 1px solid black '.$permanentAddressFont.'">'.$permanentAddress.'</td>
        				</tr>
        				<tr>
        					<td colspan="4" style="border-bottom: 1px solid black"></td>
        				</tr>
        				<tr>
        					<td colspan="3" class="colored" style="border-bottom: 2px solid black; border-right: 1px solid black">10. Zip Code</td>
        					<td colspan="4" style="border-bottom: 2px solid black;" class="input">'.$permanentZip.'</td>
        				</tr>
        				<tr>
        					<td colspan="2" class="colored" style="border-right: 1px solid black; border-bottom: 1px solid black">6. Citizenship</td>
        					<td colspan="4" style="border-right: 1px solid black; border-bottom: 1px solid black" class="input">'.$citizenship.'</td>
        					<td colspan="3" class="colored" style="border-left: 2px solid black; border-right: 1px solid black; border-bottom: 1px solid black">11. Name of School Last Attended</td>
        					<td colspan="4" style="border-bottom: 1px solid black; '.$schoolLastAttendedFont.'" class="input">'.$schoolLastAttended.'</td>
        				</tr>
        				<tr>
        					<td colspan="2" class="colored" style="border-right: 1px solid black; border-bottom: 1px solid black">7. Mobile Number</td>
        					<td colspan="4" style="border-right: 1px solid black; border-bottom: 1px solid black" class="input">'.$mobileNo.'</td>
        					<td colspan="3" rowspan="2" class="colored" style="border-left: 2px solid black; border-bottom: 1px solid black; border-right: 1px solid black">12. School Address</td>
        					<td colspan="4" rowspan="2" style="border-bottom: 1px solid black" class="input">'.$schoolLastAttendedAddress.'</td>
        				</tr>
        				<tr>
        					<td colspan="2" class="colored" style="border-right: 1px solid black; border-bottom: 1px solid black">8. E-mail Address</td>
        					<td colspan="4" style="border-right: 1px solid black; border-bottom: 1px solid black" class="input">'.$email.'</td>
        				</tr>
        				<tr>
        					<td colspan="2" class="colored" style="border-right: 1px solid black; border-bottom: 1px solid black">13. School Sector:</td>
        					<td colspan="4" style="border-bottom: 1px solid black">(<b>'.$schoolSectorPublic.'</b>) Public (<b>'.$schoolSectorPrivate.'</b>) Private</td>
        					<td colspan="3" style="border-left: 2px solid black; border-bottom: 1px solid black" class="nowrap">15. Type of Disability (if applicable)</td>
        					<td colspan="4" style="border-left: 1px solid black; border-bottom: 1px solid black" class="input">'.$disability.'</td>
        				</tr>
        				<tr>
        					<td colspan="4" class="colored nowrap" style="border-right: 1px solid black; border-bottom: 1px solid black;">14. Highest Attained Grade/Year Level</td>
        					<td colspan="2" style="border-bottom: 1px solid black; font-size: 4.5pt" class="input" width="130%">'.$highestAttained.'</td>
        					<td colspan="3" class="colored nowrap" style="border-left: 2px solid black; border-bottom: 1px solid black">16. IP affiliation (if applicable)</td>
        					<td colspan="4" style="border-left: 1px solid black; border-bottom: 1px solid black" class="input">'.$ipAffiliation.'</td>
        				</tr>
        				<tr><td colspan="13" height="1"></td></tr>
        				<tr><td colspan="13" style="border-top: 1px solid black; border-bottom: 2px solid black"><center><b>FAMILY BACKGROUND</b></center></td></tr>
        				<tr>
        					<td colspan="3">
        						&nbsp;
        					</td>
        					<td class="border" colspan="4"  width="25%"><b>Father: (<b>'.$fatherStatusLiving.'</b>) Living (<b>'.$fatherStatusDeceased.'</b>) Deceased</b></td>
        					<td class="border" colspan="4"  width="60%"><center><b>Mother: (<b>'.$motherStatusLiving.'</b>) Living (<b>'.$motherStatusDeceased.'</b>) Deceased</b></center></td>
        					<td style="border-bottom: 2px solid black" colspan="2"><center><b>Legal Guardian</b></center></td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black">17. Name</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$fatherNameFont.'" class="input">'.$fatherName.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherNameFont.'" class="input">'.$motherName.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianNameFont.'" class="input">'.$guardianName.'</td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black">18. Address</td>
        					<td colspan="4" style=" border-bottom: 1px solid black; border-right: 2px solid black '.$fatherAddressFont.'" class="input">'.$fatherAddress.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherAddressFont.'" class="input">'.$motherAddress.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianAddressFont.'" class="input"><span style="overflow-wrap: break-word;word-wrap: break-word;hyphens: auto;max-width: 50px;">'.$guardianAddress.'</span></td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black">19. Contact Number</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$fatherContactNoFont.'" class="input">'.$fatherContactNo.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherContactNoFont.'" class="input">'.$motherContactNo.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianContactNoFont.'" class="input">'.$guardianContactNo.'</td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black">20. Occupation</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$fatherOccupationFont.'" class="input">'.$fatherOccupation.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherOccupationFont.'" class="input">'.$motherOccupation.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianOccupationFont.'" class="input">'.$guardianOccupation.'</td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black">21. Name of Employer</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$fatherEmployerFont.'" class="input">'.$fatherEmployer.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherEmployerFont.'" class="input">'.$motherEmployer.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianEmployerFont.'" class="input">'.$guardianEmployer.'</td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black">22. Employer Address</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$fatherEmployerAddressFont.'" class="input">'.$fatherEmployerAddress.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherEmployerAddressFont.'" class="input">'.$motherEmployerAddress.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianEmployerAddressFont.'" class="input">'.$guardianEmployerAddress.'</td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 2px solid black; ">23. Highest Educational Attainment</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$fatherAttainedFont.'" class="input">'.$fatherAttained.'</td>
        					<td colspan="4" style="border-bottom: 1px solid black; border-right: 2px solid black '.$motherAttainedFont.'" class="input">'.$motherAttained.'</td>
        					<td colspan="2" style="border-bottom: 1px solid black '.$guardianAttainedFont.'" class="input">'.$guardianAttained.'</td>
        				</tr>
        				<tr>
        					<td colspan="3">24. Total Parents Taxable Income</td>
        					<td colspan="4" style="border-bottom: 2px solid black; border-right: 2px solid black; border-left: 2px solid black '.$fatherIncomeFont.'" class="input">'.$fatherIncome.'</td>
        					<td colspan="4" style="border-bottom: 2px solid black; border-right: 2px solid black '.$motherIncomeFont.'" class="input">'.$motherIncome.'</td>
        					<td colspan="2" style="border-bottom: 2px solid black;" width="90%"><font style="font-size: 5.5pt">24. No. of Siblings in the family 18 years old and below  <u class="input">'.$noOfSiblings.'</u></font></td>
        				</tr>
        				<tr>
        					<td colspan="13" height="1"></td>
        				</tr>
        				<tr>
        					<td style="border-top: 1px solid black; border-bottom: 1px solid black" colspan="13">25. Is your family a beneficiary of the DSWD&rsquo;s pantawid Pamilyang Pilipino Program (4Ps)? (<b>'.$isDSWDBenYes.'</b>) Yes (<b>'.$isDSWDBenNo.'</b>) No</td>
        				</tr>
        				<tr>
        					<td colspan="13" height="1" style="border-bottom: 2px solid black"></td>
        				</tr>
        				<tr>
        					<td class="colored" colspan="5">26. School Intended to enroll or enrolled in:</td>
        					<td colspan="8" style="border-bottom: 1px solid black;" class="input">'.$schoolIntendedToEnroll.'</td>
        				</tr>
        				<tr>
        					<td class="colored" colspan="5">27. School Address:</td>
        					<td colspan="8" style="border-bottom: 1px solid black;" >'.$schoolIntendedToAddress.'</td>
        				</tr>
        				<tr>
        					<td class="colored" colspan="5">28. Type of School:</td>
        					<td colspan="8">(<b>'.$schoolIntendedTypePublic.'</b>) Public (<b>'.$schoolIntendedTypePrivate.'</b>) Private</td>
        				</tr>
        				<tr>
        					<td class="colored" colspan="5">29. Degree Program:</td>
        					<td colspan="6" style="border-bottom: 1px solid black '.$degreeFont.'">'.$degree.'</td>
        					<td colspan="2"></td>
        				</tr>
        				<tr>
        					<td class="colored" colspan="5"></td>
        					<td colspan="1"></td>
        					<td colspan="3" align="right">Type</td>
        					<td colspan="4" align="left"><font style="margin-left: 10px;">Grantee Institution/Agency</font></td>
        				</tr>
        				<tr>
        					<td class="colored" colspan="6"><font style="font-size: 5pt;">30. Are you enjoying other sources of  educational/financial assistance? (<b>'.$enjoyingOtherSourcesYes.'</b>) Yes or (<b>'.$enjoyingOtherSourcesNo.'</b>) No</font></td>
        					<td colspan="3" align="right"><font style="font-size: 5pt; float: left">If yes, please specify</font>
        						1. <font class="input"><u>'.$firSourceType.'</u></font></td>
        					<td colspan="4"><font class="input"><u style="margin-left: 10px">'.$firSourceAgency.'</u></font></td>
        				</tr>
        				<tr>
        					<td colspan="6"></td>
        					<td colspan="3" align="right">2. <font class="input"><u>'.$secSourceType.'</u></font></td>
        					<td colspan="4"><font class="input"><u style="margin-left: 10px">'.$secSourceAgency.'</u></font></td>
        				</tr>
        				<tr>
        					<td colspan="13">
        						<font style="font-size: 5pt">
        							I hereby certify that foregoing statements are true and correct. Any misinformation or witholding of information will automatically disqualify me from the CHED Scholarship Program. I am willing to refund the financial benefits received if such information is discovered after acceptance of the award.
        						</font>
        					</td>
        				</tr>
        				<tr>
        					<td colspan="13">
        						<font style="font-size: 5pt">
        							I hereby express my consent for the Commission on Higher Education to collect, record, organize, update or modify, retrieve, consult, use, consolidate, block, erase or destruct my personal data as part of my information. I hereby affirm my right to be informed, object to processing, access and rectify, suspend or withdraw my personal data and be indemnified in case of damages pursuant to the provisions of the Republic Act No. 10173 of the Philippines, Data Privacy Act of 2012 and its corresponding Implementing Rules and Regulations.
        						</font>
        					</td>
        				</tr>
	        			<tr height="6">
	        				<td colspan="9"><center class="input" style="margin-top: 13px;">
                                                <img src="'.$signature.'" style="position:absolute; width:160px; left:150px; top:620px" />
                                                <br/>
                                                    '.$printedName.'</center></td>
        					<td colspan="4">
        						<div style="margin-left: -220px">
        							<center class="input" style="margin-top: 13px;">'.$dateAccomplished.'</center>
        						</div>
        					</td>
	        			</tr>
        				<tr>
        					<td colspan="9">
	        					<div style="text-align: center; border-top: solid black 1px; width: 250px; margin-left: 92px;">
	        						<center><i>(Signature over Printed Name of Applicant)</i>
	        						</center>
	        					</div>
        					</td>
        					<td colspan="4">
	        					<div style="text-align: center; border-top: solid black 1px; width: 130px; margin-left:-24px;">
	        						<center><i>Date Accomplished</i>
	        						</center>
	        					</div>
        					</td>
        				</tr>
        				<tr>
        					<td colspan="13"><center><i><b>Note: Fully accomplished form to be submitted to the CHEDRO</b></i></center></td>
        				</tr>
        				<tr>
        					<td colspan="13" style="border-top: 2px solid black; border-top-style: dashed;border-top: 2px solid black; border-top-style: dashed;"><center><b>DO NOT FILL-OUT THIS PORTION (FOR CHED USE ONLY)</b></center></td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black;"><center><b><i>Belongs to:  (any of the following groups)</i></b></center></td>
        					<td colspan="6"><center><b><i>Documents Attached:</i></b></center></td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black;">
        						<div style="height: 12px;">
        							<input type="checkbox" style="margin-top: -8.8pt;" '.$soloParentCHK.'>
        							<div style="margin-top: -17px; margin-left: 17px;"><b>dependent of solo parent</b></div>
        						</div>
        					<td colspan="6">1. Academic</td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black;">
        						<div style="height: 12px;">
        							<input type="checkbox" style="margin-top: -6.8pt;" '.$seniorCitizenCHK.'>
        							<div style="margin-top: -17px; margin-left: 17px;"><b>senior citizens</b></div>
        						</div>
        					</td>
        					<td colspan="6"><i><b style="margin-left: 20px;">(<b>'.$reportCard.'</b>) Report Card (<b>'.$grades.'</b>) Copy of Grades: Grade 11 and 1st semester of Grade 12</i></b></td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black;">
        						<div style="height: 12px;">
        							<input type="checkbox" style="margin-top: -3.8pt;"  '.$withDisabilityCHK.'>
        							<div style="margin-top: -17px; margin-left: 17px;"><b>persons with disabilities</b> <font style="font-size: 5pt">please specify type of disability</font> <font class="input">'.$studDisability.'</font>
        						</div>
        					</td>
        					<td colspan="6">2. Financial</td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black;">
        						<div style="height: 12px;">
        							<input type="checkbox" style="margin-top: -1.8pt;" '.$indigenousCHK.'>
        							<div style="margin-top: -17px; margin-left: 17px;"><b>indigenous and ethnic peoples</b> <font style="font-size: 5pt">please specify membership</font> <font class="input">'.$indigenousGroup.'</font>
        						</div>
        					</td>
        					<td colspan="6"><i><b style="margin-left: 20px;">(<b>'.$itr.'</b>) ITR (<b>'.$taxEx.'</b>) Tax Exemption (<b>'.$indigencyCert.'</b>) Certifcate of Indigency</i></b></td>
        				</tr>

        				<tr>
        					<td colspan="7" style="border-right: 1px solid black"></td>
        					<td colspan="6"><i><b style="margin-left: 20px;">(<b>'.$csDSWD.'</b>) Case Study DSWD (<b>'.$ofwCon.'</b>) OFW Contract</i></b></td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black"></td>
        					<td colspan="6">3. Others</td>
        				</tr>
        				<tr>
        					<td colspan="7" style="border-right: 1px solid black; border-bottom: 2px solid black"></td>
        					<td colspan="6" style="border-bottom: 2px solid black"><i><b style="margin-left: 20px;">(<b>'.$soloParentDoc.'</b>) Solo Parent (<b>'.$seniorCitizenDoc.'</b>) Senior Citizen (<b>'.$ips.'</b>) IPs (<b>'.$pwd.'</b>) PWD</i></b></td>
        				</tr> 
        				<tr>
        					<td colspan="3" style="border-right: 1px solid black" width="130%">School intended to enrol in</td>
        					<td colspan="10" class="input">'.$schoolIntendedToEnroll.'</td>
        				</tr> 
        				<tr>
        					<td colspan="3" style="border-right: 1px solid black">School address</td>
        					<td colspan="10" class="input">'.$schoolIntendedToAddress.'</td>
        				</tr> 
        				<tr>
        					<td colspan="3" style="border-right: 1px solid black">Type of School</td>
        					<td colspan="10">(<b>'.$schoolIntendedTypePublic.'</b>) Public (<b>'.$schoolIntendedTypePrivate.'</b>) Private</td>
        				</tr>
        				<tr>
        					<td colspan="3" style="border-right: 1px solid black">Course</td>
        					<td colspan="5" class="input"><span style="color:black '.$degreeFont.'">'.$degree.'</td>
        					<td colspan="5"><center>(<b>'.$degreePriorityYes.'</b>) Priority (<b>'.$degreePriorityNo.'</b>) Non-Priority</center></td>
        				</tr>
        				<tr>
        					<td colspan="3" height=".01px" style="border-right: 1px solid black; border-top: 1px solid black; border-bottom: 2px solid black"></td>
        					<td colspan="10" style="border-top: 1px solid black; border-bottom: 2px solid black"></td>
        				</tr>
        				<tr>
        					<td colspan="13"><i><b>Evaluated/Processed by:</i></b></td>
        				</tr>
        				<tr>
        					<td colspan="4" style="width: 300%; max-width: 300%" class="nowrap">
        						<div><center><b>'.$chedStuf.'</b></center></div>
        					</td>
        					<td colspan="3"></td>
        					<td colspan="4" style="border-bottom: 1px solid black;" class="nowrap"><center><b>'.$date.'</b></center>
        					</td>
        					<td colspan="2"></td>
        				</tr>
        				<tr>
        					<td colspan="4"><center><i><b>CHED StuFAP Coordinator</b></i><center></td>
        					<td colspan="3"></td>
        					<td colspan="4"><center><i><b>Date</b></i></center></td>
        					<td colspan="2"></td>
        				</tr>
        				<tr>
	        				<td colspan="7" style="border-top: 2px solid black; border-bottom: 2px solid black; border-right: 2px solid black;font-size:8px;" ><b>CRITERIA OF ELIGIBILITY per  CMO 8, s. 2019</b>
	        					<ol style="margin-top: auto; margin-left: -20px;">
	        						<li>Filipino citizen;</li>
	        						<li>Graduating high school students/High school graduate</li>
	        						<li>General Weighted Average (GWA) of at least 90% or above.</li>
	        						<li>Combined annual gross income of parents/guardian not to exceed Four Hundred Thousand Pesos (PhP400,000.00) or solo parent/guardian whose annual gross income does not exceed the said amount; In highly exceptional cases where income exceeds Php400,000.00, the CHEDRO StuFAPs Committee shall determine the merits of the application</li>
	        						<li>Avail of only one government funded financial assistance program.</li>
	        						<b style="font-size: 7pt">NOTE:<br>Beneficiaries of free higher education under RA 10931 can only receive stipend under this program</b>
	        					</ol>
	        					

	        				</td>
	        				<td colspan="6" style="border-top: 2px solid black;border-bottom: 2px solid black;font-size:8px;" width="75%"><b>DOCUMENTARY REQUIREMENTS  per  CMO 8, s. 2019</b>
	        					<br>Academic Requirements - any one of the following:
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;1. High school report card
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;2. Duly certified true copy of grades for Grade 11 and 1st semester of Grade 12 for<br><u><font style="margin-left: 24px;">graduating high school students</font></u>
	        					<br><b>Income Requirements</b> - any one of the following:
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;1. Latest ITR of parents or guardian if employed
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;2. Certificate of Tax Exemption from the BIR
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;3. Certificate of Indigency from their Barangay
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;4. Certificate/Case Study from DSWD
	        					<br>( &nbsp;&nbsp;) &nbsp;&nbsp;5. Latest copy of contract or proof of income for children of Overseas Filipino
	        					<br><font style="margin-left: 24px;">Workers (OFW) and seafarers.</font>
	        				</td>
        				</tr>
        				';
        $html_content .= '</tbody>
        </table>';
		
		$html_content .= '</main></body></html>';

		$this->pdf->set_option("isPhpEnabled", true);
		$this->pdf->loadHtml($html_content);

		$this->pdf->render();

		$canvas = $this->pdf->get_canvas();
		$filename = "CHEDRO1-StuFAPs-Application-".$appid.".pdf";

		// $font = Font_Metrics::get_font("helvetica", "bold"];
		// $font = $this->pdf->getFont("helvetica", "bold"];
		// $canvas->page_text(552, 20, "Page {PAGE_NUM}/{PAGE_COUNT}", '',  10, array(0,0,0]];
		//echo "end!";exit;
		//$f;
//$l;
//if(headers_sent($f,$l))
//{
    //echo $f,'<br/>',$l,'<br/>';
   // die('now detect line');
//}
	
		
		// $this->pdf->Output("".$statementNo.".pdf", array("Attachment"=>0]];
		$ptype = $this->input->post('ptype');
		if($ptype==null){
		    echo $this->pdf->stream($filename, array("Attachment"=>1));
			echo $output = $this->pdf->Output("sample.pdf",'F'); 
		}else{
		    	echo $this->pdf->stream($filename, array("Attachment"=>0));
			echo $output = $this->pdf->Output("sample.pdf",'D'); 
		}
		
		exit();
		//header('Content-Type: application/octet-stream'];
		//header("Content-Transfer-Encoding: Binary"]; 
		
		//}//end if post condigtion
		//else{
			//header("Location: "];
		//}
		
	}

}