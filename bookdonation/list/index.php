<?php include "../log.php";?>
<?php $sitepage = "Book List"; ?>

<?php include '../header.html' ?>

<h2><?php echo $sitepage; ?></h2>
	
	<div id ='booklist'>
		<h3>Availabile Books</h3>
		<table style='width:100%'>
			<tr>
				<th>ISBN</th>
				<th>Title</th>
				<th>Condition</th>
				<th>Available</th>
			</tr>



<?php
	$query_donation = "SELECT  `available` ,  `condition` ,  `bookdonations`.`isbn`, `name`
						FROM  bookdonations, books
						WHERE bookdonations.isbn = books.isbn
						ORDER BY available DESC, name ASC";

	$result_donation = mysql_query($query_donation, $mysql_handle);
		
	while($result_don = mysql_fetch_array($result_donation)) { 
?>
		
		<tr>
			<td><?php echo $result_don[2]; ?></td>
			<td><?php echo $result_don[3]; ?></td>
			<td><?php echo $result_don[1]; ?></td>
			<td><?php 
					switch($result_don[0]) {
						case 1:
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