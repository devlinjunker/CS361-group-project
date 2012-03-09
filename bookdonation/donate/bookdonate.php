<?php  
	include '../header.html';
	include "../log.php";
	
	
	echo "<style> #message{
	position:relative;
	left:200px;
	top:50px;
	}</style>";
	
	$sitepage = "Donate";
	
	$isbn = mysql_real_escape_string($_POST['book_isbn']);
	$name = mysql_real_escape_string($_POST['book_name']);
	$condition = mysql_real_escape_string($_POST['book_condition2']);
	
	$sql = "INSERT INTO  `junkerd-db`.`bookdonations` (`donationid` ,`isbn` ,`accountid` ,`condition` ,`available`)VALUES (NULL ,  '$isbn',  '$USERID',  '$condition',  '0')";
	
	#echo $sql;	
	$result = mysql_query($sql, $mysql_handle);
	
	if($result == 1){
		echo "<p id='message'> Succesfully Donated Book... <a href='../account'> Return to Account Here</a></p>";
		
		header('refresh: 5; url=../account');
	}else{
		
	}
	
?>


<?php include '../footer.html' ?>
