<?php
	include 'connect.php';
	$book_isbn	= $_POST['book_isbn'];
	$book_name 	= $_POST['book_name'];
	$book_author= $_POST['book_author'];
	$book_reason= $_POST['book_reason'];
	$userid = $_COOKIE['userid'];
	
	if(isset($book_isbn))
	{	
		$query = "INSERT INTO bookrequests('accountid', 'isbn','title',`author`,'reason') VALUES(0, '".$book_isbn."', '".$book_name."', '".$book_author."', '".$book_reason."')";
		
		$result = mysql_query ($query, $mysql_handle);	
	}

	mysql_close($mysql_handle);
?>