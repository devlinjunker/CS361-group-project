<?php $sitepage = "Create Account"; ?>

<?php include '../header.html' ?>

<h2><?php echo $sitepage; ?></h2>

	<form name="create_account" method="post" action="" onclick='form[name="create_account"]'>
		
		<fieldset class="create">
			<legend>User Information</legend>
			<label for="username">User Name:</label>
			<input name="username" type="text" tabindex="1" autofocus required />
			
			<label for="password">Password:</label>
			<input type="password" name="password"  tabindex="2" required/>
			
			<label for="verpassword">Verify Password:</label>
			<input type="password" name="verpassword"  tabindex="3" required/>
			
			<label for="address">Address:</label>
			<input type="text" name="address" tabindex="4" required />
			
			<label for="email">E-mail:</label>
			<input type="text" name="email" tabindex="5" required />
		</fieldset>
		
		<fieldset class="create">
			<legend>Optional</legend>
			<label for="paypal">PayPal E-mail:</label>
			<input name="paypal" type="text" tabindex="6"></textarea>
		</fieldset> 
		<fieldset class="submit">
			<input class="button" type="submit" name="book_post" id="book_post" value="Submit" tabindex="7"/>
		</fieldset>

	</form>

<?php include '../footer.html' ?>