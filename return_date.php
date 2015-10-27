<?php
	function return_date($date)
	{
		list($year,$month,$day) = explode("-",$date);
		echo date ("F d, Y", mktime(0,0,0,$month,$day,$year));
	}
?>