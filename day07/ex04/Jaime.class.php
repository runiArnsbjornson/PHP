<?php

class Jaime extends Lannister {

	function sleepWith($who) {
		if ($who instanceof Cersei)
			echo 'With pleasure, but only in a tower in Winterfell, then.'.PHP_EOL;
		else if ($who instanceof Lannister)
			echo "Not even if I'm drunk !".PHP_EOL;
		else
			echo "Let's do this.".PHP_EOL;
	}
}

?>
