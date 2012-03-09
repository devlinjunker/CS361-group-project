<?php

	include "../log.php";


	$isbn = mysql_real_escape_string($_POST['isbn']);
	$title = mysql_real_escape_string($_POST['name']);
	$author = mysql_real_escape_string($_POST['author']);
	
	$query = "INSERT INTO books (`isbn`, `name`, `author`)
			  VALUE ('$isbn', '$title', '$author')";
			  
	mysql_query($query, $mysql_handle);

?>