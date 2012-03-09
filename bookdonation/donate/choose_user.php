<form id="choose_user_form" name="choose_user_form" method="post" action="">

<?php
	$query = "SELECT name, message, accountid, requestid FROM bookrequests NATURAL JOIN accounts WHERE isbn = '$isbn' AND sent = 0 AND received = 0 AND returned = 0 ORDER BY date ASC";

	$result = mysql_query($query);
	if(!$result){
		die('failed to retrieve users');
	}
	if(mysql_num_rows($result) == 0){
	
	}	
	else{	$i = 0;
		while($row = mysql_fetch_assoc($result)){
			echo "<input type=\"checkbox\"i ";
			if($i == 0){
				echo "selected=\"selected\"";
			}	
			echo " name=\"requestid\" value=\"$row['requestid']\"/> $row['name']  Reason: $row['message']</br>";
			$i++;
		}

		echo "<input type=\"submit\" value=\"submit\" />";
		echo "</form>";
		break;
	}
?>
