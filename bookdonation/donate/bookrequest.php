<?php $sitepage = "Request"; ?>

<?php include '../header.html' ?>

<h2><?php echo $sitepage; ?></h2>

<script type="text/javascript">
function validateForm()
{
	var y=document.getElementById("book_reason").value;
	if (y==null || y=="")
  	{
  		alert("You must give a reason for the request");
  		return false;
 	}
	var x=document.forms["Book Request"]["book_isbn"].value;
	if (x==null || x=="")
  	{
  		alert("ISBN must be filled out");
  		return false;
  	}
 	var patt10=/^\d{10}/;
	var patt11to12=/^\d{11,12}/;
	var patt13 =/^\d{13}/;
	var patt14 =/^\d{14}/;
	var isbn = document.forms["Book Request"]["book_isbn"].value;


	if(patt10.test(isbn)== false||patt14.test(isbn)== true ||(patt11to12.test(isbn) == true && patt13.test(isbn)== false)){
		alert("ISBN must have 10 or 13 numbers");
	} 
}

function fill()
{
	var isbn = document.forms["Book Request"]["book_isbn"].value;
	var url = "https://www.googleapis.com/book/v1/volumes?q=isbn:" + isbn + "&key=AIzaSyBJd1OdD6aCx91QSuQ2_beoM15g0ESyr1Q";
	alert(url + " made it here");
	var xmlrequest = new XMLHttpRequest();
	xmlHttp.open("GET", url, true);
	xmlHttp.send();
	if(xmlHttp.status == 200) {
		var my_JSON_object = JSON.parse(xmlHttp.responseText);
		document.forms["Book Request"]["book_name"].value = my_JSON_object[0].title;
		document.forms["Book Request"]["book_author"].value = my_JSON_object[0].authors;
	}
}
</script>
	<form id="book_request" name="Book Request" method="post" action="<?php echo $sitepath; ?>requestbook.php" onsubmit="return validateForm()">
		
		<p>Fields with * are required.</p>
		
		<fieldset>
			<legend>Book Information</legend>
			<label for="book_isbn">*ISBN:</label>
			<input name="book_isbn" type="text" id="book_isbn" tabindex="1" autofocus required />
			<button type="button" onclick="fill()">Auto Filll</button>

			<label for="book_name">Book Name:</label>
			<input type="text" name="book_name" id="book_name" tabindex="2" disabled="disabled"/>
			
			<label for="book_author">Author:</label>
			<input type="text" name="book_author" id="book_author" tabindex="3" disabled="disabled" />

		</fieldset>
		<fieldset>
			<legend>Reason for request</legend>
			<label for="book_reason">*Reason:</label>
			<textarea name="book_reason" id="book_reason" tabindex="4"></textarea>
		</fieldset> 
		<fieldset class="submit">
			<input class="button" type="reset" name="book_clear" id="book_clear" value="Reset" tabindex="6"/>
			<input class="button" type="submit" name="book_post" id="book_post" value="Submit" tabindex="5"/>
		</fieldset>

</form>

<?php include '../footer.html' ?>