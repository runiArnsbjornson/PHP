<?php

class NightsWatch implements IFighter {

	function fight() {}

	function recruit($who) {
		if ($who instanceof IFighter)
			$who->fight();
	}

}

?>
