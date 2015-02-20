<?php

	include('../db.php');

	class PrepareDb {
		private $conn;

		public function __construct() {
			$dbconn = new Database();
			$this->conn = $dbconn->dbconnect();
			if($this->conn) {
				$this->createFirmTable($this->conn);
				$this->createEmployeeTable($this->conn);
			}
		}

		private function createFirmTable($dbconn) {
			$dbconn->query("CREATE TABLE zad3_companies(id int NOT NULL AUTO_INCREMENT, name varchar(255) NOT NULL, establish_date date, city varchar(255), nip varchar(255), regon int, PRIMARY KEY (id));");
			$dbconn->query("CREATE INDEX  date ON zad3_companies (establish_date);");
		
		}

		private function createEmployeeTable($dbconn) {
			$dbconn->query("CREATE TABLE zad3_employees(id int NOT NULL AUTO_INCREMENT, name varchar(255) NOT NULL, surname varchar(255) NOT NULL, birth_date date, join_date date, company_id int, PRIMARY KEY (id));");
		} 
	}

	$a = new PrepareDb();

?>