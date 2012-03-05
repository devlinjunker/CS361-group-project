<?php
	$dbhost = 'oniddb.cws.oregonstate.edu';
	$dbname = 'junkerd-db';
	$dbuser = 'junkerd-db';
	$dbpass = 'MzpKCE2xA2Xy2zbq';
	
	$mysql_handle = mysql_connect($dbhost, $dbuser, $dbpass)
    or die("Error connecting to database server");

	mysql_select_db($dbname, $mysql_handle)
    or die("Error selecting database: $dbname");
	
?>