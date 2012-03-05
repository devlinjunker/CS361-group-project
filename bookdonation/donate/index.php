<?php include "../log.php";?>
<?php $sitepage = "Donate"; ?>

<?php include '../header.html' ?>

<h2><?php echo $sitepage; ?></h2>
<script type="text/javascript">

	function makerequest() {
		var isbn = document.forms["Book Donation"]["book_isbn"].value;
		var url = "books/v1/volumes?q=isbn:" + isbn;
		var request = gapi.client.request({'path': url});
		request.execute(function(result) {
				var book = result.items[0];
				document.forms["Book Donation"]["book_name"].value = book.volumeInfo.title;
				document.forms["Book Donation"]["book_author"].value = book.volumeInfo.authors;
			});
	}

	function load() {
		gapi.client.setApiKey("AIzaSyBJd1OdD6aCx91QSuQ2_beoM15g0ESyr1Q");
		gapi.client.load("books", "v1", makerequest);
	}
</script>
<script src="https://apis.google.com/js/client.js"></script>
	<form id="book_donate" name="Book Donation" method="post" action="">
		
		<p>All fields required.</p><!-- TEST GIT -->
		
		<fieldset>
			<legend>Book Information</legend>
			<label for="book_isbn">ISBN:</label>
			<input name="book_isbn" type="text" id="book_isbn" tabindex="1" autofocus required />
			<input id="autofill" type="button" value="Auto Fill" onclick="javascript:load()" />

			
			<label for="book_name">Book Name:</label>
			<input type="text" name="book_name" id="book_name" tabindex="2" disabled="disabled" required />
			
			<label for="book_author">Author:</label>
			<input type="text" name="book_author" id="book_author" tabindex="3" disabled="disabled" required />
			
			<label for="book_condition2">Condition:</label>
			<input name="book_condition2" type="text" id="book_condition2" tabindex="4" />
		</fieldset>
		<fieldset>
			<legend>Type of Donation</legend>
			<input class="radio" type="radio" name="RadioGroup1" value="book_nextuser" id="RadioGroup1_0" tabindex="5" />
			<label class="rlabel">Give to next user</label>
			
			<input class="radio" type="radio" name="RadioGroup1" value="book_listuser" id="RadioGroup1_1" tabindex="6" />
			<label class="rlabel">Look at list and choose</label>
		</fieldset> 
		<fieldset class="submit">
			<input class="button" type="reset" name="book_clear" id="book_clear" value="Reset" tabindex="8"/>
			<input class="button" type="submit" name="book_post" id="book_post" value="Submit" tabindex="7"/>
		</fieldset>

	</form>

<?php include '../footer.html' ?>