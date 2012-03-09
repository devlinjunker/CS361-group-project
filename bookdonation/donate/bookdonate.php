<?php  
	include '../header.html';
	include "../log.php";

	
	$sitepage = "Donate";
	
	$isbn = mysql_real_escape_string($_POST['book_isbn']);
	$name = mysql_real_escape_string($_POST['book_name']);
	$condition = mysql_real_escape_string($_POST['book_condition2']);
	switch($_POST['RadioGroup1']){
	case "book_listuser":
			include("choose_user.php");
	case "book_nextuser":
			$sql = "INSERT INTO  `junkerd-db`.`bookdonations` (`donationid` ,`isbn` ,`accountid` ,`condition` ,`available`)VALUES (NULL ,  '$isbn',  '$USERID',  '$condition',  '0')";
	
			#echo $sql;	
			$result = mysql_query($sql, $mysql_handle);
	
			if($result == 1){
				echo "<div id='message'> Succesfully Donated Book... <a href='../account'> Return to Account Here</a></div>";
		
				header('refresh: 5; url=../account');
				break;
			}else{
				break;	
			}
		default:
			break;
	}			
	
?>


<?php include '../footer.html' ?>
