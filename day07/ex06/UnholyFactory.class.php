<?php

class UnholyFactory {

	function __construct() {
		$this->array = [];
	}

	function absorb($who) {
		if ($who instanceof Fighter)
		{
			if (array_key_exists($who->type, $this->array))
				printf ("(Factory already absorbed a fighter of type %s)\n", $who->type);
			else {
				printf ("(Factory absorbed a fighter of type %s)\n", $who->type);
				$this->array[$who->type] = $who;
			}
		}
		else
			printf ("(Factory can't absorb this, it's not a fighter)\n");
	}

	function fabricate($type) {
		if (array_key_exists($type, $this->array))
		{
			printf ("(Factory fabricates a fighter of type %s)\n", $type);
			return ($this->array[$type]);
		}
		else 
			printf ("(Factory hasn't absorbed any fighter of type %s)\n", $type);
	}
}

?>
