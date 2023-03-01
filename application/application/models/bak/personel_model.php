<?php


class Personel_model extends CI_Model
{
	
	public function get()
	{
		//$result = $this->db->get('contacts');
		$scholars = $this->db->query("select * from scholarship_studentprofile left join scholarship_award_student on scholarship_studentprofile.scholarid = scholarship_award_student.scholarid left join scholarship_type on scholarship_award_student.typecode = scholarship_type.typecode");
		return $scholars->result_array();
		
		
	}
	
	public function gethei()
	{
		//$result = $this->db->get('contacts');
		$heilist = $this->db->query("SELECT * FROM a_institution_profile");
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
		return $scholar;
		
		
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
	
	public function insert()
	{
			
	}
	
	public function update()
	{
		
	}
	
	public function delete()
	{
		
	}
}

?>