<?php
require_once 'Connection.php';

class Room
{
	private $name;
	protected $price;
	private $features;
	private $facilities;
	private $guest;
	private $image;
	private $conn;
	
	function __construct()
	{
		$this->conn = new Connection();
	}
	
	function setValue($n, $p, $f, $fa, $g, $i)
	{
		$this->name = $n;
		$this->price = $p;
		$this->features = $f;
		$this->facilities = $fa;
		$this->guest = $g;
		$this->image = $i;

	}
	
	public function registerRoom(){
		$qry = "INSERT INTO room VALUES ('','$this->name', 
		'$this->price', '$this->features', '$this->facilities', 
		'$this->guest', '$this->image')";
		return $this->conn->iud($qry);
	}
	
	
	
	public function selectRoom(){
		$qry = "SELECT * FROM room";
		return $this->conn->getData($qry);
	}
	
	public function selectSingleRoom($id){
		$qry = "SELECT * FROM room WHERE id = $id";
		return $this->conn->getData($qry);
	}
	
	
	public function searchRoom($key){
		$qry = "SELECT * FROM room WHERE name LIKE '$key%'";
		return $this->conn->getData($qry);
	}
	
	
	public function login($un, $pw){
		$qry = "SELECT * FROM room WHERE username ='$un' AND password = '$pw'";
		return $this->conn->getData($qry);
	}
	
	
	public function updateRoom($n, $p, $f, $fa, $g,$id){
		$qry = "UPDATE room SET name='$n', price='$p', features='$f', 
				facilities = '$fa', guest= '$g'
                WHERE id = $id";
		$this->conn->iud($qry);
	}
	
	
	public function deleteRoom($id){
		$qry = "DELETE FROM room WHERE id = $id";
		$this->conn->iud($qry);
	}
}