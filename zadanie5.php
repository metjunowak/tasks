<?php

class Person {
	private $name;
	private $surname;
	private $birthdate;

	public function __construct($name, $surname, \DateTime $birthdate)
	{
		$this->name = $name;
		$this->surname = $surname;
		$this->birthdate = $birthdate;
	}

	static function findAdults(array $persons)
	{
		$now = new DateTime('now');
		$ago = $now->modify('-18 years')->format('Y-m-d');
		$adults = array();
		foreach ($persons as $key => $value) {
			if($value->birthdate->format('Y-m-d') < $ago) {
				$adults[] = $value;
			}
		}
	return $adults;
	}

}


$persons = array(0 => new Person('Andrzej', 'Koziński', new DateTime('2001-02-02')),
				 1 => new Person('Anna', 'Pawelec', new DateTime('2003-09-04')),
				 2 => new Person('Piotr', 'Bigaj', new DateTime('1981-11-01')),
				 3 => new Person('Zdzisław', 'Król', new DateTime('1995-07-21')),
				 4 => new Person('Klara', 'Lis', new DateTime('1987-12-05')),
				 5 => new Person('Leopold', 'Górny', new DateTime('1998-10-30')),
				 6 => new Person('Apolonia', 'Smaga', new DateTime('1996-03-19')));

	

$a = Person::findAdults($persons);
var_dump($a);

?>