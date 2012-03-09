<?php include "../log.php";?> 

<?php $sitepage = "Account"; ?>

<?php include '../header.html' ?>

<h2><?php echo $sitepage; ?></h2>
<script src="https://apis.google.com/js/client.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	gapi.client.setApiKey("AIzaSyBJd1OdD6aCx91QSuQ2_beoM15g0ESyr1Q");
	gapi.client.load("books", "v1", makerequest);
});


function makerequest() {
	$('tr.book').find('td#isbn').each(function(){
		var isbn = $(this).val();
		var url = "books/v1/volumes?q=isbn:" + isbn;
		var request = gapi.client.request({'path': url});
		request.execute(function(result) {
			var book = result.items[0];
			
			$(this).siblings('td#name').val(book.volumeInfo.title);
			
		});
	});		
}
	

</script>



<?php

	include '../connect.php';
	
	$username = $_COOKIE['username'];
	
	
	$query_account = "SELECT accountid, name, email, address, paypal
		      			FROM accounts WHERE name ='$username'";
						
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
			<th>ISBN</th>
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
		
		<tr class='book'>
			<td id='isbn'><?php echo $result_don[2]; ?></td>
			<td id='name'></td>
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
			<th>ISBN</th>
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
		$isbn = $result_don[0]; ?>
		
		<tr class='book'>
			<td id='isbn'><?php echo $isbn; ?></td>
			<td id='name'> Book name </td>
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