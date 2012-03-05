<?php
	include("../connect.php");
	$landingpage = "../index.php";
	$create = "index.php";
	$email = mysql_real_escape_string($_POST['email']);

	$username = mysql_real_escape_string($_POST['username']);
	$password = md5(mysql_real_escape_string($_POST['password']));
	$address = mysql_real_escape_string($_POST['address']);
	$paypal = (isset($_POST['paypal']) && ! empty($_POST['paypal'])) ? mysql_real_escape_string($_POST['paypal']) : null ;
	$userCheck = "SELECT username FROM accounts WHERE username = '$username'";
	if(mysql_num_rows(mysql_query($userCheck,$mysql_handle))){
		//username taken
		header( "Location: $create?error=1");
	}	
	$emailCheck = "SELECT email FROM accounts WHERE email = '$email'";
	if(mysql_num_rows(mysql_query($emailCheck,$mysql_handle))){
		//email taken
		header( "Location:$create?error=2");
	}
	$query = "INSERT INTO accounts (username, password, adddress, email, paypal) VALUES('$username','$password','$address','$email','$paypal')";

	$success = mysql_query($query,$mysql_handle);
	if($success === true){
		setcookie("username",$username,time()+86400);
		setcookie("pwd",$password, time()+86400);
		header( "Location: $landingpage");
	}
	else{
		header("Location: $create?error=0");
	}	
	
?>	
