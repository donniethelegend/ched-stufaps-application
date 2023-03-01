<?php


class Awardnumber_model extends CI_Model
{
	
	public function get()
	{
		//$result = $this->db->get('contacts');
		$scholars = $this->db->query("SELECT awardid,scholarship_award_student.typecode,scholarship_type.typedescription, awardnumber,scholarship_award_student.scholarid,remarks,CONCAT(firstname,' ',middlename,' ',lastname) AS granteename FROM scholarship_award_student LEFT JOIN scholarship_studentprofile ON scholarship_award_student.scholarid = scholarship_studentprofile.scholarid LEFT JOIN scholarship_type ON scholarship_award_student.typecode = scholarship_type.typecode");
		return $scholars->result_array();
		
		
	}
	
	public function gettypecode()
	{
		//$result = $this->db->get('contacts');
		$heilist = $this->db->query("SELECT DISTINCT(scholarship_award_student.typecode),scholarship_type.typedescription FROM scholarship_award_student LEFT JOIN scholarship_type ON scholarship_award_student.typecode = scholarship_type.typecode");
		return $heilist->result_array();
		
		
	}
	
	public function getaccreditedhei()
	{
		//$result = $this->db->get('contacts');
		$heilist = $this->db->query("SELECT * FROM scholarship_hei");
		return $heilist->result_array();
		
		
	}
	
	public function getaccount()
	{
		//$result = $this->db->get('contacts');
		$account = $this->db->query("SELECT * FROM accounts");
		return $account->result_array();
		
		
	}
	

	//payment module
	
	public function getpayment()
	{
		//$result = $this->db->get('contacts');
		$payment = $this->db->query("SELECT CONCAT(scholarship_studentprofile.firstname,' ',scholarship_studentprofile.middlename,' ',scholarship_studentprofile.lastname) AS scholarname, spaymentid,scholarship_studentprofile.scholarid,semester,schoolyear,checkno,amount,remarks,cy,status FROM scholarship_payment LEFT JOIN scholarship_studentprofile ON scholarship_payment.scholarid = scholarship_studentprofile.scholarid");
		return $payment->result_array();
		
		
	}
	public function getscholar($scholar_id)
	{
		//$result = $this->db->get('contacts');
		$scholar = $this->db->query("SELECT * FROM scholarship_studentprofile LEFT JOIN scholarship_award_student ON scholarship_studentprofile.scholarid = scholarship_award_student.scholarid LEFT JOIN scholarship_type ON scholarship_award_student.typecode = scholarship_type.typecode WHERE scholarship_studentprofile.scholarid=$scholar_id");
		$scholar_profile = $scholar->result_array();
		return $scholar_profile[0];
		
		
	}
	public function getscholarpayment($scholar_id)
	{
		//$result = $this->db->get('contacts');
		$payment = $this->db->query("SELECT spaymentid,scholarship_studentprofile.scholarid,semester,schoolyear,checkno,amount,remarks,cy,status FROM scholarship_payment LEFT JOIN scholarship_studentprofile ON scholarship_payment.scholarid = scholarship_studentprofile.scholarid where scholarship_studentprofile.scholarid=$scholar_id");
		return $payment->result_array();
		
		
	}
	
	public function getvoucherlist()
	{
		//$result = $this->db->get('contacts');
		$voucherlistdata = $this->db->query("SELECT * FROM scholarship_voucher LEFT JOIN scholarship_studentprofile ON scholarship_voucher.scholarid = scholarship_studentprofile.scholarid");
		return $voucherlistdata->result_array();
		
		
	}
	public function getvoucherspecific($scholarid)
	{
		//$result = $this->db->get('contacts');
		$voucherlist_data = $this->db->query("SELECT * FROM scholarship_voucher where scholarid=$scholarid");
		return $voucherlist_data->result_array();
		
		
	}
	
	public function getscholarshiptype()
	{
		//$result = $this->db->get('contacts');
		$scholarshiptype = $this->db->query("SELECT * FROM scholarship_type");
		return $scholarshiptype->result_array();
		
		
	}
	
	public function getlastvoucherbatch()
	{
		//$result = $this->db->get('contacts');
		$maxnumdata = $this->db->query("SELECT MAX(batch) as maxnum FROM scholarship_voucher");
		return $maxnumdata;
		
		
		
	}
	public function getvoucherdetails($voucherid)
	{
		//$result = $this->db->get('contacts');
		$voucher_data = $this->db->query("
SELECT * FROM scholarship_voucher LEFT JOIN scholarship_studentprofile ON scholarship_voucher.scholarid = scholarship_studentprofile.scholarid LEFT JOIN scholarship_award_student ON scholarship_studentprofile.scholarid = scholarship_award_student.scholarid WHERE voucherid='$voucherid'");
		return $voucher_data;
		
		
	}

	public function getaccountingentry($voucherid)
	{
		//$result = $this->db->get('contacts');
		$accountentry = $this->db->query("SELECT * FROM scholarship_voucher_b WHERE voucherid='$voucherid'");
		return $accountentry->result_array();
		
		
	}

	public function getvoucherbatch()
	{
		//$result = $this->db->get('contacts');
		$scholarshiptype = $this->db->query("SELECT batch,COUNT(*) AS batchcount,voucherdate FROM scholarship_voucher GROUP BY batch");
		return $scholarshiptype->result_array();
		
		
	}
	public function getvoucherbatchlist($batchid)
	{
		//$result = $this->db->get('contacts');
		$scholarshiptype = $this->db->query("SELECT * FROM scholarship_voucher left join scholarship_studentprofile on scholarship_voucher.scholarid = scholarship_studentprofile.scholarid where batch='$batchid'");
		return $scholarshiptype->result_array();
		
		
	}
	
	public function getxls()
	{
		//$result = $this->db->get('contacts');
		$scholarapplicant = $this->db->query("SELECT * FROM scholarship_applicant");
		return $scholarapplicant->result_array();
		
		
	}
	
	
	
	public function insert()
	{
			
	}
	
	public function update()
	{
		
	}
	
	public function delete()
	{
		
	}
	
	public function updateprofile($applicantid,$lastname,$firstname,$middlename,$dateofbirth,$placeofbirth,$gender,$civilstatus,$citizenship,$contactno,$email,$extension,$barangay,$towncity,$province,$zipcode,$congressionaldistrict,$heicode,$course,$father,$foccupation,$mother,$moccupation,$siblingno,$disability,$yearofapplication,$year_level,$type,$hsgraduated)
	{
		//$result = $this->db->get('contacts');
		
		$sql = "update scholarship_studentprofile set lastname=".$this->db->escape($lastname).",firstname=".$this->db->escape($firstname).",middlename=".$this->db->escape($middlename).",extension=".$this->db->escape($extension).",gender= ".$this->db->escape($gender).",barangay=".$this->db->escape($barangay).",towncity=".$this->db->escape($towncity).",province=".$this->db->escape($province).",zipcode=".$this->db->escape($zipcode).",dateofbirth=".$this->db->escape($dateofbirth).",placeofbirth=".$this->db->escape($placeofbirth).",civilstatus=".$this->db->escape($civilstatus).",citizenship=".$this->db->escape($citizenship).",congressionaldistrict=".$this->db->escape($congressionaldistrict).",hei=".$this->db->escape($heicode).",course=".$this->db->escape($course).",contactno=".$this->db->escape($contactno).",email=".$this->db->escape($email).",father=".$this->db->escape($father).",foccupation=".$this->db->escape($foccupation).",mother=".$this->db->escape($mother).",moccupation=".$this->db->escape($moccupation).",siblingno=".$this->db->escape($siblingno).",disability=".$this->db->escape($disability).",yearapplied=".$this->db->escape($yearofapplication).",year_level=".$this->db->escape($year_level).",average_grade=".$this->db->escape($average_grade).",income=".$this->db->escape($income).",type=".$this->db->escape($type).",hsgraduated=".$this->db->escape($hsgraduated)."where applicantid=".$this->db->escape($applicantid)."";
		echo $sql;
		$this->db->query($sql);
		
	}
	
	
}

?>