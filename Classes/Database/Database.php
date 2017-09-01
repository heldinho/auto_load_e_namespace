<?php

namespace Classes\Database;

use Classes\Foo;
use Classes\Bar;

class Database {

	protected $con;
	
	public function __construct() {
		try {
			//$this->con = new \PDO('');
			echo 'Database Loaded.<br>';
			$foo = new Foo(); // captura o 'Foo' e o 'Bar' juntos
			$bar = new Bar('Classe bar passada com parametro construct'); // captura somente o 'Bar'
		} catch(PDOExection $e) {
			$e->getMessage();
		}
	}
}