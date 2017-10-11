<?php

require_once ('Color.class.php');

class Vertex {

	private $_x = 0.00;
	private $_y = 0.00;
	private $_z = 0.00;
	private $_w = 1.00;
	private $_color;
	static $verbose = FALSE;

	function getX() { return ($this->_x); }
	function getY() { return ($this->_y); }
	function getZ() { return ($this->_z); }
	function getW() { return ($this->_w); }

	function setX($v) {
		$this->_x = $v;
	}

	function setY($v) {
		$this->_y = $v;
	}

	function setZ($v) {
		$this->_z = $v;
	}

	function setW($v) {
		$this->_w = $v;
	}

	function setColor($c) {
		if ($c instanceof Color)
			$this->_color = $c;
	}

	static function doc() {
		return ("\n" . file_get_contents('Vertex.doc.txt'));
	}

	function __construct(array $kwargs) {
		if (array_key_exists('x', $kwargs))
			$this->setX($kwargs['x']);
		if (array_key_exists('y', $kwargs))
			$this->setY($kwargs['y']);
		if (array_key_exists('z', $kwargs))
			$this->setZ($kwargs['z']);
		if (array_key_exists('w', $kwargs))
			$this->setW($kwargs['w']);
		if (array_key_exists('color', $kwargs))
			$this->setColor($kwargs['color']);
		else
		{
			$color = new Color(array('rgb' => 0xffffff));
			$this->_color = $color;
		}
		if (self::$verbose)
			printf ("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		}

	function __toString() {
		if (self::$verbose)
			return (sprintf ("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color));
		else
			return (sprintf ("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}

	function __destruct() {
		if (self::$verbose)
			printf ("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);

	}
}

?>
