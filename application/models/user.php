<?php
Class User extends CI_Model
{
	function login($username, $password)
	{
		$this -> db -> select('id, username, password, usertype, firstname, finishdate');
		$this -> db -> from('users');
		$this -> db -> where('username = ' . "'" . $username . "'");
		$this -> db -> where('password = ' . "'" . MD5($password) . "'");
		$this -> db -> limit(1);
		
		$query = $this -> db -> get();
		
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
		return false;
		}
	}
	
	function viewemployees()
	{
		$this -> db -> select('id, firstname, lastname, username, phone, startdate, finishdate, notes');
		$this -> db -> from('users');
		$this -> db -> where('usertype = "employee"');
		$this -> db -> order_by('firstname', 'asc'); 
		
		$query = $this -> db -> get();
		
		return $query->result();
	}
	
	function viewclients()
	{
		$this -> db -> select('id, firstname, username, lastname, phone, startdate, finishdate, notes, latestmonth');
		$this -> db -> from('users');
		$this -> db -> where('usertype = "client"');
		$this -> db -> order_by('firstname', 'asc'); 
		
		$query = $this-> db -> get();
		
		return $query->result();
	}
	
	function editemployee()
	{
		if($_POST['empPass'] != '')
		{
			$data = array('firstname' => $_POST['empFirst'], 'lastname' => $_POST['empLast'], 'phone' => $_POST['empPhone'], 'username' => $_POST['empUser'], 'password' => MD5($_POST['empPass']), 'startdate' => $_POST['empStart'], 'finishdate' => $_POST['empFinish'], 'notes' => $_POST['empNotes']);
		}
		else
		{
			$data = array('firstname' => $_POST['empFirst'], 'lastname' => $_POST['empLast'], 'phone' => $_POST['empPhone'], 'username' => $_POST['empUser'], 'startdate' => $_POST['empStart'], 'finishdate' => $_POST['empFinish'], 'notes' => $_POST['empNotes']);
		}
		$this->db->where('id', $_POST['empID']);
		$this->db->update('users', $data);
	}
	
	function editclient()
	{
		if($_POST['clientPass'] != '')
		{
			$data = array('firstname' => $_POST['clientName'], 'lastname' => $_POST['clientAddress'], 'phone' => $_POST['clientPhone'], 'username' => $_POST['clientUser'], 'password' => MD5($_POST['clientPass']), 'startdate' => $_POST['clientStart'], 'notes' => $_POST['clientNotes'], 'latestmonth' => $_POST['clientInvoiceView']);
		}
		else
		{
			$data = array('firstname' => $_POST['clientName'], 'lastname' => $_POST['clientAddress'], 'phone' => $_POST['clientPhone'], 'username' => $_POST['clientUser'], 'startdate' => $_POST['clientStart'], 'notes' => $_POST['clientNotes'], 'latestmonth' => $_POST['clientInvoiceView']);
		}
		$this->db->where('id', $_POST['clientID']);
		$this->db->update('users', $data);
	}
	
	function addemployee()
	{
		$data = array('firstname' => $_POST['empFirst'], 'lastname' => $_POST['empLast'], 'phone' => $_POST['empPhone'], 'username' => $_POST['empUser'], 'password' => MD5($_POST['empPass']), 'startdate' => $_POST['empStart'], 'finishdate' => "Active", 'notes' => $_POST['empNotes'], 'usertype' => "employee");
		$this->db->insert('users', $data);
	}
	
	function addclient()
	{
		$data = array('firstname' => $_POST['clientName'], 'lastname' => $_POST['clientAddress'], 'phone' => $_POST['clientPhone'], 'username' => $_POST['clientUser'], 'password' => MD5($_POST['clientPass']), 'startdate' => $_POST['clientStart'], 'finishdate' => "Active", 'notes' => $_POST['clientNotes'], 'usertype' => "client", 'latestmonth' => $_POST['clientInvoiceView']);
		$this->db->insert('users', $data);
	}
	
	function disable($id)
	{
		$date = date("Y-m-d");
		$data = array('finishdate' => $date);
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}
	
	function enable($id)
	{
		$data = array('finishdate' => 'Active');
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}
}?>