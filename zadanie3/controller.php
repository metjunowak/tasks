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

		public function __construct($name = NULL, $establish_date = NULL, $city = NULL, $nip = NULL, $regon = NULL) {
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

		public function getCompanies() {
			$db = new Database();
			$this->dbconn = $db->dbconnect();

			$result = $this->dbconn->query("SELECT id, name FROM zad3_companies");
			$list = array();
			while($row = $result->fetch_array()) {
				$list[] = $row;
			}
			return $list;
		}

	}

	class CompanyList {

		private $dbconn;

		public function __construct() {
			$db = new Database();
			$this->dbconn = $db->dbconnect();
		}

		public function __destruct() {
			if(!empty($this->dbconn)) {
				$this->dbconn->close();
			}
		}

		private function getList() {
			$result = $this->dbconn->query("SELECT a.*, COUNT(b.id) AS employees FROM zad3_companies a
			LEFT JOIN zad3_employees b ON (a.id = b.company_id)
			GROUP BY b.company_id
			ORDER BY establish_date DESC, employees DESC");

			$c_list = array();
			while($row = $result->fetch_assoc()) {
				$c_list[] = $row;
			}
			return $c_list;
		}

		public function showHTML() {
			$items = $this->getList();
			$html = '<table class="table table-striped">';	
			$html .= '<tr>';
			$html .= '<th>Nazwa</th><th>Miasto</th><th>Data założenia</th><th>Ilośc pracowników</th>';
			$html .= '</tr>';	
			foreach ($items as $value) {
				$html .= '<tr>';
				$html .= '<td>'.$value['name'].'</td>';
				$html .= '<td>'.$value['city'].'</td>';
				$html .= '<td>'.$value['establish_date'].'</td>';
				$html .= '<td>'.$value['employees'].'</td>';
				$html .= '</tr>';
			}
			$html .= '</table>';
			return $html;
		}
	}
		

?>