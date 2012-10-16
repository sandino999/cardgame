// firstname validation
	
	var error=0
	
	$("#fname").change( function() {
		var value = $('#fname').val();
	
		if(jQuery.trim(value) == '')
		{
			error =1;
			error_message = 'This Field is required';
			$('#return_fname').html(error_message);
			
		}
		else if(value.length < 2)
		{
			error =1;
			error_message = 'Please enter atleast 2 characters';
			$('#return_fname').html(error_message);
		}
		else
		{
			error =0;
			error_message = '';
			$('#return_fname').html(error_message);
		}
	});
  
// middlename validation

	$("#mname").change( function() {
		var value = $('#mname').val();
	
		if(jQuery.trim(value) == '')
		{
			error =1;
			error_message = 'This Field is required';
			$('#return_mname').html(error_message);
		}
		else if(value.length < 2)
		{
			error =1;
			error_message = 'Please enter atleast 2 characters';
			$('#return_mname').html(error_message);
		}
		else
		{
			error =0;
			error_message = '';
			$('#return_mname').html(error_message);
		}
	});

// lastname validation

	$("#lname").change( function() {
		var value = $('#lname').val();
	
		if(jQuery.trim(value) == '')
		{
			error =1;
			error_message = 'This Field is required';
			$('#return_lname').html(error_message);
		}
		else if(value.length < 2)
		{
			error =1;
			error_message = 'Please enter atleast 2 characters';
			$('#return_lname').html(error_message);
		}
		else
		{
			error =0;
			error_message = '';
			$('#return_lname').html(error_message);
		}
	});
	
//username validation
  
	$("#username").change( function() {
			var value = $('#username').val();
		
			if(jQuery.trim(value) == '')
			{
				error =1;
				error_message = 'This Field is required';
				$('#return_username').html(error_message);
			}
			else if(value.length < 2)
			{
				error =1;
				error_message = 'Please enter atleast 2 characters';
				$('#return_username').html(error_message);
			}
			else
			{
				error =0;
				error_message = '';
				$('#return_username').html(error_message);
			}
		});

//password validation  
  
	$("#password").change( function() {
		var value = $('#password').val();
		
		if(jQuery.trim(value) == '')
		{
			error =1;
			error_message = 'This Field is required';
			$('#return_password').html(error_message);
		}
		else if(value.length < 8)
		{
			error =1;
			error_message = 'Password must be 8 characters long';
			$('#return_password').html(error_message);
		}
		else if($('#retype').val() == '')
		{
			error =1;
			error_message = 'Enter retype password';
			$('#return_password').html(error_message);
		}	
		else if(value != $('#retype').val())
		{
			error =1;
			error_message = 'Password does not match';
			$('#return_password').html(error_message);
		}
		else
		{
			error =0;
			error_message = '';
			error_message2 = ''
			$('#return_password').html(error_message);
			$('#return_retype').html(error_message2);
		}
	});
	
// retype password validation

	$("#retype").change( function() {
		var value = $('#retype').val();
		
		if($('#retype').val().length < 8)	// added code: whole if statement from 148 to 153  10/15/12
		{
			error =1;
			error_message = 'retype password must be 8 characters long';
			$('#return_retype').html(error_message);
		}			
		else if(value != $('#password').val())
		{
			error =1;
			error_message = 'Password does not match';
			$('#return_password').html(error_message);
		}
		else
		{
			error =0;
			error_message = '';					
			error_message2 = ''								// added code 10/15/12
			$('#return_password').html(error_message);
			$('#return_retype').html(error_message2);		// added code 10/15/12
		}
	});	
	
//sercret question answer validation

 
	$("#ans").change( function() {
		var value = $('#ans').val();
		
		if(jQuery.trim(value) == '')
		{
			error =1;
			error_message = 'This Field is required';
			$('#return_ans').html(error_message);
		}
		else if(value.length < 2)
		{
			error =1;
			error_message = 'Please enter atleast 2 characters';
			$('#return_ans').html(error_message);
		}
		else
		{
			error =0;
			error_message = '';
			$('#return_ans').html(error_message);
		}
	});
		
// contact number validation

	$("#contact").change( function() {
		
		var value = $('#contact').val();
		var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
		
		if(jQuery.trim(value) == '')
		{
			error =1;
			error_message = 'This Field is required';
			$('#return_contact').html(error_message);
		}
		else if(!numberRegex.test(value))
		{
			error =1;
			error_message = 'Not a number';
			$('#return_contact').html(error_message);
		}
		else if(value.length < 7)
		{
			error =1;
			error_message = 'Please enter atleast 7 characters';
			$('#return_contact').html(error_message);
		}
		else
		{
			error =0;
			error_message = '';
			$('#return_contact').html(error_message);
		}
	});

//address validation

	$("#addr").change( function() {
		var value = $('#addr').val();
		
		if(jQuery.trim(value) == '')
		{
			error =1;
			error_message = 'This Field is required';
			$('#return_addr').html(error_message);
		}
		else if(value.length < 2)
		{
			error =1;
			error_message = 'Please enter atleast 2 characters';
			$('#return_addr').html(error_message);
		}
		else
		{
			error =0;
			error_message = '';
			$('#return_addr').html(error_message);
		}
	});	
	
//validate email address
	
	$("#email").change( function() {
		
		var value = $('#email').val();
		var email_check = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i;
		
		if(jQuery.trim(value) == '')
		{
			error =1;
			error_message = 'This Field is required';
			$('#return_email').html(error_message);
		}	
		else if(!email_check.test(value))
		{	
			error =1;
			error_message = 'Not a valid email';
			$('#return_email').html(error_message);
		}
		else
		{
			error =0;
			error_message = '';
			$('#return_email').html(error_message);
		}
	});	
	
// validate submit

	$('#register').submit(function() {
		if(error!=0)
		{
			error_message = 'There were problems in creating your accounts, check all the details in the input field';
				$('#return_error').html(error_message);
			return false;
		}
		else if(jQuery.trim($('#fname').val()) == '' || jQuery.trim($('#mname').val()) == '' || jQuery.trim($('#lname').val()) == ''
				|| jQuery.trim($('#username').val()) == '' || jQuery.trim($('#password').val()) == '' || jQuery.trim($('#retype').val()) == ''
				|| jQuery.trim($('#ans').val()) == '' || jQuery.trim($('#contact').val()) == '' || jQuery.trim($('#addr').val()) == '' || jQuery.trim($('#email').val()) == '')
		{
			if(jQuery.trim($('#fname').val()) == '')
			{
				error_message = 'This field is required';
				$('#return_fname').html(error_message);
			}
			 
			if(jQuery.trim($('#mname').val()) == '')
			{
				error_message = 'This field is required';
				$('#return_mname').html(error_message);
			}
			
			if(jQuery.trim($('#lname').val()) == '')
			{
				error_message = 'This field is required';
				$('#return_lname').html(error_message);
			}
			
			if(jQuery.trim($('#username').val()) == '')
			{
				error_message = 'This field is required';
				$('#return_username').html(error_message);
			}
			
			if(jQuery.trim($('#password').val()) == '')
			{
				error_message = 'This field is required';
				$('#return_password').html(error_message);
			}
			
			if(jQuery.trim($('#retype').val()) == '')
			{
				error_message = 'This field is required';
				$('#return_retype').html(error_message);
			}
			
			if(jQuery.trim($('#ans').val()) == '')
			{
				error_message = 'This field is required';
				$('#return_ans').html(error_message);
			}
			
			if(jQuery.trim($('#contact').val()) == '')
			{
				error_message = 'This field is required';
				$('#return_contact').html(error_message);
			}
			
			if(jQuery.trim($('#addr').val()) == '')
			{
				error_message = 'This field is required';
				$('#return_addr').html(error_message);
			}
			
			if(jQuery.trim($('#email').val()) == '')
			{
				error_message = 'This field is required';
				$('#return_email').html(error_message);
			}
			
			return false;
		}
		else
		{
			return true;
		}
	});

	