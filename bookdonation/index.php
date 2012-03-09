<?php $sitepage = "Login"; ?>

	<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml">
	
<head>
	<?php 
		$sitename = "Textbookie";
		$sitedescription = "Blah blah blah";
		$sitepath = "http://engr.oregonstate.edu/~junkerd/CS361/bookdonation/";
		$keywords = "";
	?>
		<meta charset="UTF-8" />  
		<meta name="Keywords" content="<?php echo $keywords; ?>" />
		<meta name="Description" content="<?php echo $sitedescription; ?>" />
		<meta name="Author" content="OSUHHSA" />
		<meta name="viewport" content="width=device-width">
		<meta name="robots" content="noindex, nofollow">

	<title>
		<?php echo $sitepage; ?> |
		<?php echo $sitename; ?> |
		<?php echo $sitedescription?>
	</title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo $sitepath; ?>screen.css" media="screen"/>
	<link href='http://fonts.googleapis.com/css?family=Cutive' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Trade+Winds|Cutive' rel='stylesheet' type='text/css'>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo $sitepath; ?>AccountCreationValidation.js"></script>
	<script type="text/javascript" src="<?php echo $sitepath; ?>bookdonate.js"></script>
</head>

<body>
<div id="wrapper">	

	<header>
		<h1><a href="http://llosi.com/cs361/bookdonation/">Textbookie</a></h1>
	</header>
		
	<nav id="menuhorizontal">
		<ul class="horizontal">
			<li><a class="menu" href="<?php echo $sitepath; ?>account">Account</a></li>
			<li><a class="menu" href="<?php echo $sitepath; ?>request">Request</a></li>
			<li><a class="menu" href="<?php echo $sitepath; ?>donate">Donate</a></li>
			<li><a class="menu" href="<?php echo $sitepath; ?>list">Book List</a></li>
			<li><a class="menu" href="<?php echo $sitepath; ?>about">About</a></li>
		</ul>
	</nav>
		
<section>


<h2><?php echo $sitepage; ?></h2>

	<form name="login" method="post" action="account/index.php?action=login">
		
		<fieldset class="login">
			<legend>Account Information</legend>
			<label for="username">Username:</label>
			<input name="username" type="text" tabindex="1" autofocus required />
			
			<label for="password">Password:</label>
			<input type="password" name="password" tabindex="2" required/>
		</fieldset>
		
		<fieldset id="login">
			<input class="button" type="submit" name="login" value="Login" tabindex="3" onclick="" />
			<input class="button" type="button" value="Create Account" tabindex="4" onclick="location.href='<?php echo $sitepath; ?>create/'" />
		</fieldset>

	</form>
<?php include 'footer.html' ?>
