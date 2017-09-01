<?php

namespace Classes;
/**
* 
*/
class Foo extends Bar {
	
	public function __construct() {
		echo 'Foo Loaded.<br>';
		//parent::__construct();
		//$bar = new Bar();
		Bar::__construct('Classe bar passada com parametro construct');
	}
	
}