<?php include "../log.php";?>

<?php $sitepage = "Account"; ?>

<?php include '../header.html' ?>

<h2><?php echo $sitepage; ?></h2>

<?php

	include '../connect.php';
	
	$username = $_COOKIE['username'];
	
	
	$query_account = "SELECT accountid, name, email, address, paypal
		      			FROM accounts WHERE name = 'test'";
						
	$result_account = mysql_query($query_account, $mysql_handle);
	
	$result_a = mysql_fetch_array($result_account);
	
	$acc_id = $result_a[0];
?>
	<div id="userinfo">
		<h3>User Information</h3>
	
		<p>Username: <?php echo $result_a[1]; ?></p>
		<p>E-mail: <?php echo $result_a[2]; ?></p>
		<p>Address: <?php echo $result_a[3]; ?></p>
		<p>PayPal: <?php echo $result_a[4]; ?></p>
	</div>
	
	<div id="donatedbooks">
	<h3>Donated Books</h3>
	<table>
		<tr>
			<th>Book Name</th>
			<th>Condition</th>
			<th>Availability</th>
		</tr>
<?php
	$query_donation = "SELECT  `available` ,  `condition` ,  `isbn` 
						FROM  `bookdonations` 
						WHERE accountid = " .$acc_id;

	$result_donation = mysql_query($query_donation, $mysql_handle);
		
	while($result_don = mysql_fetch_array($result_donation)) { 
		$isbn = $result_don[2];  ?>
		
		<tr>
			<td><?php echo $isbn; ?></td>
			<td><?php echo $result_don[1]; ?></td>
			<td><?php 
					switch($result_don[0]) {
						case 0:
							echo 'yes';
							break;
						default:
							echo 'no';
					}
				
				?></td>
		</tr>

<?php	} ?>
	</table>
	</div>
	
	<div id="requestedbooks">
	<h3>Requested Books</h3>
	<table>
		<tr>
			<th>Book Name</th>
			<th>Date</th>
			<th>Message</th>
			<th>Sent</th>
			<th>Received</th>
			<th>Returned</th>
		</tr>
<?php
	$query_donation = "SELECT  isbn, date, message, sent, received, returned
						FROM  bookrequests 
						WHERE accountid = " .$acc_id;

	$result_donation = mysql_query($query_donation, $mysql_handle);
		
	while($result_don = mysql_fetch_array($result_donation)) { 
		$isbn = $result_don[0];  ?>
		
		<tr>
			<td><?php echo $isbn; ?></td>
			<td><?php echo $result_don[1]; ?></td>
			<td><?php echo $result_don[2]; ?></td>
			<td><?php switch($result_don[3]) {
						case 0:
							echo 'yes';
							break;
						default:
							echo 'no';
					}
				?></td>
			<td><?php switch($result_don[4]) {
						case 0:
							echo 'yes';
							break;
						default:
							echo 'no';
					}
				?></td>
			<td><?php switch($result_don[5]) {
						case 0:
							echo 'yes';
							break;
						default:
							echo 'no';
					}
				?></td>
		</tr>

<?php	} ?>
	</table>
	</div>

	
<?php include '../footer.html' ?>