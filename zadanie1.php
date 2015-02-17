<?php
	include('db.php');

	ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

	class Zadanie1 {

		//private $dbconn;

		public function __construct() {
			$dbconn = new Database();
			$this->createDbTable($dbconn);
		}


		private function createDbTable($dbconn) {

			$dbconn->query("CREATE TABLE zad1(id int);");
			
		}


	}

	$a = new Zadanie1();



?>