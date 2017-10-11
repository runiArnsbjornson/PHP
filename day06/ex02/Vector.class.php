<?php

require_once 'Vertex.class.php';
require_once 'Color.class.php';

class Vector {

	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.0;
	static $verbose = FALSE;

	static function doc() {
		return ("\n" . file_get_contents('Vector.doc.txt'));
	}

	function getOrig() { return ($this->_orig); }
	function getDest() { return ($this->_dest); }

	function setOrig($v) {
		if ($v instanceof Vertex) {
			$this->_orig = $v;
		}
	}

	function setDest($v) {
		if ($v instanceof Vertex) {
			$this->_dest = $v;
		}
	}

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

	function __construct(array $kwargs) {
		$orig = new Vertex( array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
		if (array_key_exists('orig', $kwargs))
		{
			if ($kwargs['orig'] instanceof Vertex)
				$orig = $kwargs['orig'];
		}
		if (array_key_exists('dest', $kwargs))
		{
			if ($kwargs['dest'] instanceof Vertex)
				$dest = $kwargs['dest'];
			$this->_x = $dest->getX() - $orig->getX();
			$this->_y = $dest->getY() - $orig->getY();
			$this->_z = $dest->getZ() - $orig->getZ();
		}
		if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs) && array_key_exists('z', $kwargs))
		{
			$this->setX($kwargs['x']);
			$this->setY($kwargs['y']);
			$this->setZ($kwargs['z']);
		}

		if (self::$verbose)
			printf ("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
	}

	function __toString() {
		if (self::$verbose)
			return (sprintf ("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}

	function __destruct() {
		if (self::$verbose)
			printf ("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
	}

	function magnitude() {
		return sqrt($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z);
	}

	function normalize() {
		$new = $this->magnitude();
		return new Vector( array('x' => $this->_x / $new, 'y' => $this->_y / $new, 'z' => $this->_z / $new));
	}

	function add(Vector $rhs)
	{
		return new Vector(array('x' => ($this->_x + $rhs->_x), 'y' => ($this->_y + $rhs->_y), 'z' => ($this->_z + $rhs->_z)));
	}
	function sub(Vector $rhs)
	{
		return new Vector(array('x' => ($this->_x - $rhs->_x), 'y' => ($this->_y - $rhs->_y), 'z' => ($this->_z - $rhs->_z)));
	}
	function opposite()
	{
		return new Vector(array('x' => -$this->_x, 'y' => -$this->_y, 'z' => -$this->_z));
	}
	function scalarProduct($k)
	{
		return new Vector(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k));
	}
	function dotProduct(Vector $rhs)
	{
		return (($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z));
	}
	function cos(Vector $rhs)
	{
		return ($this->_x * $rhs->_x + $this->_y * $rhs->_y + $this->_z * $rhs->_z) / sqrt(($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z) * ($rhs->_x * $rhs->_x + $rhs->_y * $rhs->_y + $rhs->_z * $rhs->_z));
	}
	function crossProduct(Vector $rhs)
	{
		return new Vector(array('x' => (($this->_y * $rhs->_z) - ($this->_z * $rhs->_y)), 'y' => (($this->_z * $rhs->_x) - ($this->_x * $rhs->_z)), 'z' => (($this->_x * $rhs->_y) - ($this->_y * $rhs->_x))));
	}
}

?>
