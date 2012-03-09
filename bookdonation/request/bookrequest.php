<?php  
	include '../header.html';
	include "../log.php";
	
	
	echo "<style> </style>";
	
	$sitepage = "Request";
	
	$isbn = mysql_real_escape_string($_POST['book_isbn']);
	$name = mysql_real_escape_string($_POST['book_name']);
	$note = mysql_real_escape_string($_POST['book_reason']);
	
	$sql = "INSERT INTO `bookrequests` (`accountid`, `isbn`, `message`, `date`) 
			VALUES ($USERID, '$isbn', '$note', '".date("Y-m-d", time())."')";
			
	$result = mysql_query($sql, $mysql_handle);
	
	if($result == 1){
		echo "<div id='message'> Succesfully Requested Book... <a href='../account'> Return to Account Here</a></div>";
		
		header('refresh: 5; url=../account');
	}else{
		echo "<div id='message'> Error Adding Your Request </div>";
	}
	
?>


<?php include '../footer.html' ?>