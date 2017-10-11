<?php

Class Color {

	private $_red;
	private $_green;
	private $_blue;
	static $verbose = FALSE;

	static function doc() {
		return ("\n" . file_get_contents('Color.doc.txt'));
	}

	function getRed() { return ($this->red); }
	function getGreen() { return ($this->green); }
	function getBlue() { return ($this->blue); }

	function setRed($c) {
			$this->red = $c;
	}

	function setGreen($c) {
			$this->green = $c;
	}

	function setBlue($c) {
			$this->blue = $c;;
	}

	function __construct(array $kwargs) {
		if (array_key_exists('red', $kwargs))
			$this->setRed($kwargs['red']);
		if (array_key_exists('green', $kwargs))
			$this->setGreen($kwargs['green']);
		if (array_key_exists('blue', $kwargs))
			$this->setBlue($kwargs['blue']);
		if (array_key_exists('rgb', $kwargs)) {
			$this->red = ($kwargs['rgb'] >> 16) & 0xff;
			$this->green = ($kwargs['rgb'] >> 8) & 0xff;
			$this->blue = $kwargs['rgb'] & 0xff;
		}
		if (self::$verbose)
			printf ("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
	}

	function add($color) {
		$result = new color(array (
			'red' => $this->red + $color->red,
			'green' => $this->green + $color->green,
			'blue' => $this->blue + $color->blue));
		return ($result);
	}

	function sub($color) {
		$result = new color(array (
			'red' => $this->red - $color->red,
			'green' => $this->green - $color->green,
			'blue' => $this->blue - $color->blue));
		return ($result);
	}

	function mult($f) {
		$result = new color(array (
			'red' => $this->red * $f,
			'green' => $this->green * $f,
			'blue' => $this->blue * $f));
		return ($result);
	}

	function __toString() {
		return (sprintf ("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
	}

	function __destruct() {
		if (self::$verbose)
			printf ("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
	}
}

?>
