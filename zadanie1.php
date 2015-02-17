<?php
	include('db.php');

	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

	class Zadanie1 {
		private $conn;

		public function __construct($flag_table, $flag_generate, $count = 15) {
			$dbconn = new Database();
			$this->conn = $dbconn->dbconnect();
			if($this->conn) {
				if($flag_table == true) {
					$this->createDbTable($this->conn);
				}

				if($flag_generate == true) {
					$this->generateNodes($count);
				}
				$this->showTree();
			}
		}

		private function createDbTable($dbconn) {
			$dbconn->query("CREATE TABLE zad1(id int NOT NULL AUTO_INCREMENT, name varchar(255) NOT NULL, parent_id int, PRIMARY KEY (id));");
		}

		private function generateNodes($counter) {
			for($i=0; $i<$counter; $i++) {
				$random = rand(0, 1);
				if($random == 0) {
					$parentId = $this->getParent();
					if($parentId === null) {
						$this->addParent();
					}
					else {
						$this->addChild($parentId);
					}
				}
				else {
					$this->addParent();
				}
			}
		}

		private function getParent() {
			$result = $this->conn->query("SELECT id FROM zad1 WHERE parent_id IS NULL");
			$lenght = $result->num_rows;
			$ids = array();
			if($lenght > 0) {
				while ($obj = $result->fetch_object()) {
					$ids[] = $obj->id;
				}
				$id = rand(0,$lenght-1);
				return $ids[$id];
			}
			else {
				return null;
			}
		}

		public function getChild($id) {
			$child = array();
			$id = $this->conn->real_escape_string($id);
			$result = $this->conn->query("SELECT * FROM zad1 WHERE parent_id = $id;");
			if($result) {
				while($row = $result->fetch_assoc()) {
					$next_child = $this->getChild($row['id']);
					$child[] = array('name' =>$row['name'], 'children' => $next_child);
				}
			}
			return $child;
		}

		private function addParent() {
			$parent_name = $this->findNth(true);
			$result = $this->conn->query("INSERT INTO zad1 VALUES('', '$parent_name', NULL);");
		}

		private function addChild($parent) {
			$parent = $this->conn->real_escape_string($parent);
			//$child_name = $this->conn->real_escape_string("Child ".$n);
			$child_name = $this->findNth();
			$this->conn->query("INSERT INTO zad1 VALUES('', '$child_name', '$parent');");
		}

		private function findNth($isParent = false) {
			$query = "IS NOT NULL";
			if($isParent == true) {
				$query = "IS NULL";
			}

			$result = $this->conn->query("SELECT * FROM zad1 WHERE parent_id $query");
			$n = $result->num_rows + 1;

			if($isParent == true) {
				return $name = $this->conn->real_escape_string("Parent ".$n);
			}
			else {
				return $name = $this->conn->real_escape_string("Child ".$n);
			}
		}

		private function showTree() {
			$tree = array();
			$result = $this->conn->query("SELECT * FROM zad1 WHERE parent_id IS NULL;");
			
			while($row = $result->fetch_assoc()) {
				$child = $this->getChild($row['id']);
				$tree[] = array('name' =>$row['name'], 'children' => $child);
			}
			
			echo "<pre>";		
				var_export($tree);
			echo "</pre>";

		}
	}


// Pierwszy parametr - stworzenie tabeli
// Drugi parametr - generowanie elementów drzewa
// Trzeci parametr - ilośc elementów do wygenerowania
	$a = new Zadanie1(true, true, 20);


?>