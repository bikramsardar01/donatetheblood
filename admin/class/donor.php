<?php
require_once 'Connection.php';

class Donor
{
	private $name;
	private $gender;
	protected $email;
	private $city;
	private $dob;
	private $contact_no;
	private $save_life_date;
	private $password;
	private $blood_group;
	private $type;
	private $status;
	private $conn;

	function __construct()
	{
		$this->conn = new Connection();
	}

	function setValue($n, $g, $e, $c, $dob, $co, $s, $pw, $bg, $t)
	{
		$this->name = $n;
		$this->gender = $g;
		$this->email = $e;
		$this->city = $c;
		$this->dob = $dob;
		$this->contact_no = $co;
		$this->save_life_date = $s;
		$this->password = $pw;
		$this->blood_group = $bg;
		$this->type = $t;
		$this->status = 'pending';
	}

	public function registerDonor()
	{
		$qry = "INSERT INTO donor VALUES ('','$this->name',
		'$this->gender', '$this->email', '$this->city', 
		'$this->dob', '$this->contact_no', '$this->save_life_date', '$this->password',
        '$this->blood_group', '$this->type', '$this->status')";
		return $this->conn->iud($qry);
	}

	public function selectDonor()
	{
		$qry = "SELECT * FROM donor";
		return $this->conn->getData($qry);
	}

	public function selectSingleDonor($id)
	{
		$qry = "SELECT * FROM donor WHERE id = $id";
		return $this->conn->getData($qry);
	}


	public function searchDonor($key)
	{
		$qry = "SELECT * FROM donor WHERE name LIKE '$key%'";
		return $this->conn->getData($qry);
	}


	public function login($un, $pw)
	{
		$qry = "SELECT * FROM donor WHERE email ='$un' AND password = '$pw'";
		return $this->conn->getData($qry);
	}


	public function updateDonor($n, $g, $e, $c, $dob, $co, $s, $pw, $bg, $t, $st, $id)
	{
		$qry = "UPDATE donor SET name='$n', gender='$g', email='$e', city='$c', 
				dob = '$dob', contact_no='$co', save_life_date='$s', password = '$pw', blood_group='$bg', type = '$t', status = '$st'
				WHERE id = $id";
		$this->conn->iud($qry);
	}


	public function deleteDonor($id)
	{
		$qry = "DELETE FROM donor WHERE id = $id";
		$this->conn->iud($qry);
	}

	public function chkuna($n)
	{
		$qry = "SELECT count(id) as count FROM donor WHERE email = '$n'";
		return $this->conn->getData($qry);
	}
}
