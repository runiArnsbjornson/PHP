<?php

abstract class Fighter {

	function __construct($name) {
		$this->type = $name;
	}

	abstract function fight($type);
}

?>
