
<?php
	$query = "SELECT name, message, accountid, requestid FROM bookrequests NATURAL JOIN accounts WHERE isbn = '$isbn' accountid <> '$USERID' AND sent = 0 AND received = 0 AND returned = 0 ORDER BY date ASC";

	$result = mysql_query($query,$mysql_handle);
	if(!$result){
		echo "didnt work";
		die('failed to retrieve users');
	}
	if(mysql_num_rows($result) == 0){
	
/*	}	
	else{	
		$i = 0;
		echo "<form id=\"choose_user_form\" name=\"choose_user_form\" method=\"post\" action=\"\">";
		while($row = mysql_fetch_assoc($result)){
			echo "<input type=\"radio\" ";
			if($i == 0){
				echo "selected=\"selected\"";
			}	
			echo " name=\"requestid\" value=\"$row['requestid']\" /> $row['name']  Reason: $row['message']</br>";
			$i++;
		}

		echo "<input type=\"submit\" value=\"submit\" />";
		echo "</form>";
		break;
	}*/
?>
