<?php $sitepage = "Login"; ?>

<?php include 'header.html' ?>

<h2><?php echo $sitepage; ?></h2>

	<form name="login" method="post" action="index.php?action=login">
		
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
