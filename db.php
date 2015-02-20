<?php
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

	class Database extends mysqli {


		private $dbname = 'tasks';
		private $dbuser = 'root';
		private $dbpass = '';
		private $dbhost = '';

		public function dbconnect() {
			$mysqli = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if ($mysqli->connect_errno) {
	    		echo "Błąd połączenia: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			else {
				$mysqli->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
				return $mysqli;
			}
		}

	}
	

?>