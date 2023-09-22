<?php
require_once 'Connection.php';

class User
{
	private $name;
	protected $email;
	private $phone;
	private $address;
	private $password;
	private $type;
	private $conn;
	
	function __construct()
	{
		$this->conn = new Connection();
	}
	
	function setValue($n, $e, $p, $un, $pw, $t)
	{
		$this->name = $n;
		$this->email = $e;
		$this->phone = $p;
		$this->address = $un;
		$this->password = $pw;
		$this->type = $t;
	}
	
	public function registerUser(){
		$qry = "INSERT INTO user VALUES ('','$this->name', 
		'$this->email', '$this->phone', '$this->address', 
		'$this->password', '$this->type')";
		return $this->conn->iud($qry);
	}
	
	public function selectUser(){
		$qry = "SELECT * FROM user";
		return $this->conn->getData($qry);
	}
	
	public function selectSingleUser($id){
		$qry = "SELECT * FROM user WHERE id = $id";
		return $this->conn->getData($qry);
	}
	
	
	public function searchUser($key){
		$qry = "SELECT * FROM user WHERE name LIKE '$key%'";
		return $this->conn->getData($qry);
	}
	
	
	public function login($un, $pw){
		$qry = "SELECT * FROM user WHERE email ='$un' AND password = '$pw'";
		return $this->conn->getData($qry);
	}
	
	
	public function updateUser($n, $e, $p, $un, $pw, $t, $id){
		$qry = "UPDATE user SET name='$n', email='$e', phone='$p', 
				address = '$un', password = '$pw', type = '$t';
				WHERE id = $id";
		$this->conn->iud($qry);
	}
	
	
	public function deleteUser($id){
		$qry = "DELETE FROM user WHERE id = $id";
		$this->conn->iud($qry);
	}
	
	public function chkuna($n){
		$qry = "SELECT count(id) as count FROM user WHERE email = '$n'";
		return $this->conn->getData($qry);
	}
}
