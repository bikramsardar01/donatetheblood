<?php
require_once 'Connection.php';

class Message
{
	private $name;
	private $email;
	private $subject;
	private $message;
	private $conn;
	
	function __construct()
	{
		$this->conn = new Connection();
	}
	
	public function setValue($n, $e, $s, $m)
	{
		$this->name = $n;
		$this->email = $e;
		$this->subject = $s;
		$this->message = $m;
	}
	
	public function registerMessage(){
		$qry = "INSERT INTO messages VALUES ('', '$this->name', '$this->email', '$this->subject', '$this->message')";
		return $this->conn->iud($qry);
	}

	public function selectMessage(){
		$qry = "SELECT * FROM messages";
		return $this->conn->getData($qry);
	}
}
?>