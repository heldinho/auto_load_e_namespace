<?php

function __autoload($class) {

	$class = www_ROOT . DS . str_replace('\\', DS, $class . '.php');
	if(!file_exists($class)) {
		throw new Exception("File's path '{$class}' not found.");
	}

	require_once($class);

}