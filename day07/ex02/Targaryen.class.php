<?php

Class Targaryen {

	function __construct() {
		return ;
	}

	function __destruct() {
		return ;
	}

	public function resistsFire() {
		return False;
	}

	function getBurned() {
		if ($this->resistsFire($class))
			return ('emerges naked but unharmed');
		else
			return ('burns alive');
	}
}

?>
