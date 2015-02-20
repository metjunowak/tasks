<?php

	include('../db.php');

	class Employee {
		public $name;
		public $surname;
		public $date_of_birth;
		public $join_date;
		public $company_id;

		private $dbconn;

		public function __construct($name, $surname, $date_of_birth, $join_date) {
			$this->name = $name;
			$this->surname = $surname;
			$this->date_of_birth = $date_of_birth;
			$this->join_date = $join_date;
		}

		public function __destruct() {
			if(!empty($this->dbconn)) {
				$this->dbconn->close();
			}
		}

		public function save() {
			$db = new Database();
			$this->dbconn = $db->dbconnect();

			$this->name = $this->dbconn->real_escape_string($this->name);
			$this->surname = $this->dbconn->real_escape_string($this->surname);
			$this->date_of_birth = $this->dbconn->real_escape_string($this->date_of_birth);
			$this->join_date = $this->dbconn->real_escape_string($this->join_date);
			$this->company_id= $this->dbconn->real_escape_string($this->company_id);

			$this->dbconn->query("INSERT INTO zad3_employees VALUES('', '$this->name', '$this->surname', '$this->date_of_birth', '$this->join_date', '$this->company_id');");
		}
	}


	class Company {
		public $name;
		public $establish_date;
		public $city;
		public $nip;
		public $regon;

		private $dbconn;

		public function __construct($name, $establish_date, $city, $nip, $regon) {
			$this->name = $name;
			$this->establish_date = $establish_date;
			$this->city = $city;
			$this->nip = $nip;
			$this->regon = $regon;
		}

		public function __destruct() {
			if(!empty($this->dbconn)) {
				$this->dbconn->close();
			}
		}

		public function save() {
			$db = new Database();
			$this->dbconn = $db->dbconnect();

			$this->name = $this->dbconn->real_escape_string($this->name);
			$this->establish_date = $this->dbconn->real_escape_string($this->establish_date);
			$this->city = $this->dbconn->real_escape_string($this->city);
			$this->nip = $this->dbconn->real_escape_string($this->nip);
			$this->regon= $this->dbconn->real_escape_string($this->regon);

			$this->dbconn->query("INSERT INTO zad3_companies VALUES('', '$this->name', '$this->establish_date', '$this->city', '$this->nip', '$this->regon');");
			return $this->dbconn->insert_id;
		}

	}
	var_dump($_POST);
	$employee = new Employee($_POST['sumName'], $_POST['sumSurname'], $_POST['sumDoB'], $_POST['sumJoinDate']);

	if(!isset($_POST['sumCompanyNameSelId'])) {
		$company = new Company($_POST['sumCompanyName'], $_POST['sumCompanyDate'], $_POST['sumCompanyCity'], $_POST['sumCompanyNip'], $_POST['sumCompanyRegon']);
		$employee->company_id = $company->save();
	}
	else {
		$employee->company_id = $_POST['sumCompanyNameSelId'];
	}

	$employee->save();

?>