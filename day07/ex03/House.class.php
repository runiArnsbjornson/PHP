<?php

abstract class House {

	function __construct() {
		return ;
	}

	function __destruct() {
		return ;
	}

	abstract public function getHouseName();
	abstract public function getHouseSeat();
	abstract public function getHouseMotto();

	function introduce() {
		printf ("House %s of %s : \"%s\"\n", static::getHouseName(), static::getHouseSeat(), static::getHouseMotto());
	}
}

?>
