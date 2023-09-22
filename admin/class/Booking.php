<?php
require_once 'Connection.php';

class Booking
{
	private $userid;
	private $roomid;
	private $checkin;
    private $checkout;
	private $status;

	private $conn;
	
	function __construct()
	{
		$this->conn = new Connection();
	}
	
	function setValue($ui, $ri, $ci, $co, $s)
	{
		$this->userid = $ui;
		$this->roomid = $ri;
		$this->checkin = $ci;
		$this->checkout = $co;
		$this->status = 'processing';
	}
	
	public function registerBooking(){
		$qry = "INSERT INTO booking VALUES ('', 
		 '$this->userid', '$this->roomid', 
		'$this->checkin', '$this->checkout', '$this->status')";
		return $this->conn->iud($qry);
	}
	
	public function selectBooking(){
		$qry = "SELECT * FROM booking";
		return $this->conn->getData($qry);
	}
	
	public function selectSingleBooking($id){
		$qry = "SELECT *, booking.id as id FROM booking join user on booking.userid = user.id WHERE booking.id = $id";
		return $this->conn->getData($qry);
	}
	
	
	public function searchBooking($key){
		$qry = "SELECT * FROM booking WHERE name LIKE '$key%'";
		return $this->conn->getData($qry);
	}
	
	
	public function login($un, $pw){
		$qry = "SELECT * FROM booking WHERE email ='$un' AND password = '$pw'";
		return $this->conn->getData($qry);
	}
	
	
	public function updateBooking( $ui, $ri, $ci, $co, $s, $id){
		$qry = "UPDATE booking SET  userid = '$ui', roomid = '$ri', checkin = '$ci', checkout = '$co', status='$s' WHERE id = $id";
		$this->conn->iud($qry);
	}
	
	
	public function deleteBooking($id){
		$qry = "DELETE FROM booking WHERE id = $id";
		$this->conn->iud($qry);
	}

	public function selectjoinBooking(){
		$qry = "SELECT *, booking.id as id FROM booking join user on booking.userid = user.id";
		return $this->conn->getData($qry);
	}

	public function mybooking($id){
		$qry = "SELECT *, booking.id as id FROM booking join room on booking.roomid = room.id where userid='$id'";
		return $this->conn->getData($qry);
	}

	public function updatecnlBooking( $c, $id){
		$qry = "UPDATE booking SET status='$c' WHERE id = $id";
		$this->conn->iud($qry);
	}
}
