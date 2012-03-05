<?php
require_once 'connect.php';

if($_GET['action'] == "login") {
	$USERNAME = $_POST['username'];
	$PWD = $_POST['password'];
	$USERNAME=mysql_escape_string($USERNAME); 
	$PWD=mysql_escape_string($PWD); 
	$result = mysql_query("SELECT * FROM accounts WHERE name='$USERNAME'");

	if(mysql_num_rows($result) == 1) {

		$data = mysql_fetch_array($result);
		if(md5($PWD) == $data['password']) { 
			setcookie('username', $_POST['username'], time()+86400, '/');
			setcookie('password', md5($PWD), time()+84600, '/');
			$USERID=$data['accountid'];
			
		} else {
			header("Location: ../index.php?login=failed&cause=".urlencode('Wrong Password'));
			exit;
		}
	} else {
		header("Location: ../index.php?login=failed&cause=".urlencode('Invalid User'));
		exit;
	}
}else if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
	$USERNAME = $_COOKIE['username'];
	$result = mysql_query("SELECT * FROM accounts WHERE name='$USERNAME'");

	if(mysql_num_rows($result) == 1){
		$data = mysql_fetch_array($result);
		if($_COOKIE['password'] == $data['password']){
			$USERID=$data['accountid'];
		}else{
			header("Location: ../index.php");
		}
	}else{
	header("Location: ../index.php");
	}
}else{
	header("Location: ../index.php");
}

?>