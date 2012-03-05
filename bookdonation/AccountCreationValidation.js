$(document).ready(function(){

	$('form[name="create_account"]').validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			username: {
				required: true,
                minlength: 6,
                maxlength: 20
			},
			password:{
				required: true,
				minlength: 6,
                maxlength: 20
			},
			verpassword:{
				equalTo:'input[name="password"]',
                required: true
            },
			
			address:{
				required: true,
			},
			paypal:{
				email: true
			}	
		},
        messages: {
            email:{
                required: "Email is required"
            },
            username:{
                required: "Username is required"
            },
            password:{
                required: "Password is required"
            },   
            verpassword:{
                required: "Please verify your password",
                equalTo: "Passwords do not match"
            },
            address:{
                required: "Address is required"
            }    
            
       }     
	});	
});	

