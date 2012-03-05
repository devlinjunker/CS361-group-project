<?php

	include 'connect.php';
	
	$userid = $_COOKIE['userid'];
	
	
	$query_account = "SELECT name, email, address, paypal
		      			FROM accounts WHERE accountid = ".$userid."";

	$query_donation = "SELECT books.isbn, title, author, condition
						FROM bookdonations, books
						WHERE books.isbn = bookdonation.isbn AND bookdonations.accountid = ".$userid."";
			
	$query_request = "SELECT
					  FROM
					  WHERE "
			
	$result_account = mysql_query($query_account, $mysql_handle);
	$result_donation = mysql_query($query_donation, $mysql_handle);
	$result_request = mysql_query($query_request, $mysql_handle);
	
	$account_array = mysql_fetch_row($result_account);
	
	
?>

	<h3>Information</h3>
	
	<p>Username: <?php echo $account_array[0]; ?></p>
	<p>E-mail: <?php echo $account_array[1]; ?></p>
	<p>Address: <?php echo $account_array[2]; ?></p>
	<p>PayPal: <?php echo $account_array[3]; ?></p>
	
	
	<h3>Donated Books</h3>
	<table>
<?php //display donation list
	while($row_donation = mysql_fetch_row($result_donation)) {
?>
	<tr>
	
<?php foreach ($row_donation as $attribute) { ?>
	<td><?php echo $attribute; ?><td>// loop through adding info
<?php } ?>
	
	</tr>
<?php } ?>
	</table>
	
	
	<h3>Requested Books</h3>
	<table>
<?php //display donation list
	while($row_donation = mysql_fetch_row($result_donation)) {
?>
	<tr>
	
<?php foreach ($row_donation as $attribute) { ?>
	<td><?php echo $attribute; ?><td>// loop through adding info
<?php } ?>
	
	</tr>
<?php } ?>
	</table>


<?php 
	mysql_free_result($result_account);
	mysql_free_result($result_donation);
	mysql_free_result($result_request);
	mysql_close($mysql_handle);
?>