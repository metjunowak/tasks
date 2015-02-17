<?php
	include('db.php');

	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

	class Zadanie1 {
		private $conn;

		public function __construct($count) {
			$dbconn = new Database();
			$this->conn = $dbconn->connect();
			if($this->conn) {
				$this->createDbTable($this->conn);
				//$this->generateNodes($count);
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
			$result = $this->conn->query("SELECT * FROM zad1 WHERE parent_id = $id;");
			while($row = $result->fetch_assoc()) {
				$child[] = array('name' =>$row['name'], 'children' => '');
			};
			return $child;
		}

		private function addParent() {
			$result = $this->conn->query("INSERT INTO zad1 VALUES('','Parent', NULL);");
		}

		private function addChild($parent) {
			$this->conn->query("INSERT INTO zad1 VALUES('', 'Child', $parent);");
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

	$a = new Zadanie1(10);
	$a->getChild(73);



?>