<?php


class Contacts_model extends CI_Model
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
		//$result = $this->db->get('contacts');
		$contacts = $this->db->query("SELECT contacts.contactid,contacts.contactname,contacts.telno,contacts.address,contacts.email,a_institution_profile.instname,accounts.accountname,contacts.position,contacts.fax,contacts.website FROM contacts LEFT JOIN a_institution_profile ON contacts.instcode = a_institution_profile.instcode LEFT JOIN accounts ON contacts.accountid = accounts.accountid");
		return $contacts->result_array();
		
		
	}
	
	public function gethei()
	{
		//$result = $this->db->get('contacts');
		$heilist = $this->db->query("SELECT * FROM a_institution_profile");
		return $heilist->result_array();
		
		
	}
	
	public function getaccount()
	{
		//$result = $this->db->get('contacts');
		$account = $this->db->query("SELECT * FROM accounts");
		return $account->result_array();
		
		
	}
	

	public function savesinglecontact($instcode,$accountid,$contactname,$email,$telno,$address,$position,$fax,$website)
	{
		$sql = "INSERT INTO contacts (contactname,telno,address,email,instcode,accountid,position,fax,website) VALUES (".$this->db->escape($contactname).", ".$this->db->escape($telno).", ".$this->db->escape($address).", ".$this->db->escape($email).", ".$this->db->escape($instcode).", ".$this->db->escape($accountid).", ".$this->db->escape($position).", ".$this->db->escape($fax).", ".$this->db->escape($website).")";
		$this->db->query($sql);
		
		//echo $this->db->affected_rows();
	}
	
	public function updatesinglecontact($contactid,$instcode,$accountid,$contactname,$email,$telno,$address,$position,$fax,$website)
	{
		$sql = "update contacts set contactname=".$this->db->escape($contactname)." ,telno=".$this->db->escape($telno).",position=".$this->db->escape($position).",fax=".$this->db->escape($fax).",website=".$this->db->escape($website).",address=".$this->db->escape($address).",email=".$this->db->escape($email).",instcode=".$this->db->escape($instcode).",accountid=".$this->db->escape($accountid)." where contactid=".$this->db->escape($contactid)."";

		$this->db->query($sql);
		
		//echo $sql;
		//echo $this->db->affected_rows();
	}
	
	public function deletecontact($contactid)
	{
		$sql = "DELETE from contacts where contactid='".$contactid."'";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
	}
	
	public function editcontact($contactid)
	{
		
		$contact = $this->db->query("SELECT contacts.contactid,contacts.contactname,contacts.telno,contacts.position,contacts.fax,contacts.website,contacts.address,contacts.email,contacts.instcode,contacts.accountid,a_institution_profile.instname,accounts.accountid,accounts.accountname FROM contacts LEFT JOIN a_institution_profile ON contacts.instcode = a_institution_profile.instcode LEFT JOIN accounts ON contacts.accountid = accounts.accountid WHERE contactid=".$this->db->escape($contactid)."");
		
		return $contact->result_array();
		
		
	}
}

?>