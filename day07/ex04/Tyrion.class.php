<?php

class Tyrion extends Lannister {

	function sleepWith($who) {
		if ($who instanceof Lannister)
			echo "Not even if I'm drunk !".PHP_EOL;
		else
			echo "Let's do this.".PHP_EOL;
	}
}

?>
