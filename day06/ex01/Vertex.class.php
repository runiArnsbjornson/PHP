<?php

class Vertex {

	$x;
	$y;
	$z;
	$w;
	


	static $verbose = FALSE;

	static function doc() {
		return ("\n" . file_get_contents('Color.doc.txt'));
	}

	function __construct(array $kwargs) {
	}

	function __toString() {
	}

	function __destruct() {
	}
}
?>
