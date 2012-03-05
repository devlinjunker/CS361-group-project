$(document).ready(function(){

	$('form#book_donate').validate({
		rules: {
			book_name: {
				required: true
			},
			book_author: {
				required: true
			},
			book_isbn:{
				required: true,
				check_isbn:true
			},
			book_condition2:{
				required: true
			},
			
		}
	});	
});	


jQuery.validator.addMethod(
	"check_isbn",
	function (value,element){
		var patt10=/^\d{10}/;
		var patt11to12=/^\d{11,12}/;
		var patt13 =/^\d{13}/;
		var patt14 =/^\d{14}/;
		var  isbn = value;


		if(patt10.test(isbn)== false||patt14.test(isbn)== true ||(patt11to12.test(isbn) == true && patt13.test(isbn)== false)){
		return false;
		}else{
		return true;
		}
	},
	"Must be valid ISBN"
);