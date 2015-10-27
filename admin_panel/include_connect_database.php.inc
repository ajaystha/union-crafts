<?php
	require("../cgi-bin/req/connect_database.inc");

	$link=mysql_connect($db_server, $usr, $pwd);
	
	if(!$link)
	{
			die("Couldn't connect to MySQL");
	}
	if(!isset($isDatabase))
	{
		mysql_select_db($db, $link) 
			or die("Couldn't open $db : ".mysql_error());
	}
	else
	{
		mysql_select_db($myDatabase, $link) 
			or die("Couldn't open $db : ".mysql_error());
	}
?>