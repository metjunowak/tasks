<?php

include('db.php');
header('Content-Type: text/html; charset=utf-8'); 

class Pager {
	
	private $items_per_page;
	private $page;
	private $all_items;


	public function __construct($items = 3) {
		$this->items_per_page = $items;
		$db = new Database();
		$this->dbconn = $db->dbconnect();
	}

	public function __destruct() {
		if(!empty($this->dbconn)) {
			$this->dbconn->close();
		}
	}

	public function showHTML() {
			$items = $this->getResults();
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

	public function showPaginator() {
		echo '<a href="zadanie4.php?p='.$this->getPrevious().'">'.$this->getPrevious().'</a>';
		echo '<strong>'.$this->getCurrent().'</strong>';
		echo '<a href="zadanie4.php?p='.$this->getNext().'">'.$this->getNext().'</a>';
	}

	private function getAll() {
		$result = $this->dbconn->query("SELECT a.*, COUNT(b.id) AS employees FROM zad3_companies a
			LEFT JOIN zad3_employees b ON (a.id = b.company_id)
			GROUP BY b.company_id
			ORDER BY establish_date DESC, employees DESC");

			$this->all_items = $result->num_rows;
			return $this->all_items;
	}

	private function getPageLimit() {
		$limit = $this->getAll() / $this->items_per_page;
		return ceil($limit);
	}
	

	public function getResults()
	{

		$start = (0 +($this->getCurrent() * $this->items_per_page) - $this->items_per_page);
		$stop = ($this->getCurrent() * $this->items_per_page);
		$result = $this->dbconn->query("SELECT a.*, COUNT(b.id) AS employees FROM zad3_companies a
			LEFT JOIN zad3_employees b ON (a.id = b.company_id)
			GROUP BY b.company_id
			ORDER BY establish_date DESC, employees DESC
			LIMIT $start, $stop");

		
			//var_dump($items);
			$c_list = array();
			while($row = $result->fetch_assoc()) {
				$c_list[] = $row;
			}
			return $c_list;
	}

	public function getPrevious()
	{
		if(($this->getCurrent() > 1) && ($this->getCurrent() <= $this->getPageLimit())) {
			$prev = $this->getCurrent() -1;
		}
		elseif ($this->getCurrent() > $this->getPageLimit()) {
			$prev = $this->getPageLimit();
		}
		else {
			$prev = '';
		}

		return $prev;
	}

	public function getCurrent()
	{
		if(isset($_GET['p']) && is_numeric($_GET['p'])) {
			$this->page = $_GET['p'];
		}
		else {
			$this->page = 1;
		}
		return $this->page;
	}

	public function getNext()
	{
		if($this->getCurrent() < $this->getPageLimit()) {
			$next = $this->getCurrent() + 1;
		}
		else {
			$next = '';
		}	
		return $next;
	}
}

$a = new Pager(2);
echo $a->showHTML();
echo $a->showPaginator();

?>