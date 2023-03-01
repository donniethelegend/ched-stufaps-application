<?php


class Accounts_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->session;
		$dbname = $this->session->userdata('regioncode');
		$this->db = $this->load->database($dbname, true);
	}
	
	public function get()
	{
		$result = $this->db->get('accounts');
		
		return $result->result_array();
	}
	
	public function getinstname($icode)
	{
			//get institution name
			$this->db->select('*');
			$this->db->from('a_institution_profile');
			$this->db->where('instcode',$icode);
			//$query = $this->db->get();
			//if ($query->num_rows() > 0) {
			// query returned results
			return $this->db->get();
			//} else {
			// query returned no results
			//	$returnzero = array(array('result'=>'0'));
			//	return $returnzero;
			//}
			
		
	}
	public function getprograms($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get(); */
			$progs = $this->db->query("SELECT mainprogram,supervisor,major,pstatuscode,authcat,authserial,authyear,(newstudm+oldstudm+secondm+thirdm+fourthm+fifthm+sixthm+seventhm) AS totalmale,(newstudf+oldstudf+secondf+thirdf+fourthf+fifthf+sixthf+seventhf) AS totalfemale FROM b_program where instcode='$icode'");
			return $progs->result_array();
		
	}
	public function getdeans($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get(); */
			$deans = $this->db->query("SELECT * FROM a_deans where instcode='$icode'");
			return $deans->result_array();
		
	}
	
	public function getformernames($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get(); */
			$formernames = $this->db->query("SELECT * FROM a_formernames where instcode='$icode'");
			return $formernames->result_array();
		
	}

	public function saveaccount($accountname,$email,$telno,$address)
	{
		$sql = "INSERT INTO accounts (accountname,address,telno,email) VALUES (".$this->db->escape($accountname).", ".$this->db->escape($address).", ".$this->db->escape($telno).", ".$this->db->escape($email).")";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
	}
	
	public function updateaccount($accountid,$accountname,$address,$telno,$email)
	{
		$sql = "update accounts set accountname=".$this->db->escape($accountname)." ,address=".$this->db->escape($address).",telno=".$this->db->escape($telno).",email=".$this->db->escape($email)." where accountid=".$this->db->escape($accountid)."";

		$this->db->query($sql);
	}
	
	public function deleteaccount($accountid)
	{
		$this->db->delete('accounts', array('accountid' => $accountid));
	}
	
	public function editaccount($accountid)
	{
		$account = $this->db->query("SELECT * from accounts WHERE accountid=".$this->db->escape($accountid)."");
		
		return $account->result_array();
	}
}

?>