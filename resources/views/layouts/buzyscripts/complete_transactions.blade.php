<script type="text/javascript">

function completeTransaction(event){
    event.preventDefault();
    
    $('#cd-create-button').attr('disabled', true);

    $('#client-email').bind('keypress', function(){
        $('#cd-create-button').attr('disabled', false); 
		$('#client-email-text').text('');   
		$('#client-email-exist').text('');
    });

	$('#client-password').bind('keypress', function(){
        $('#cd-create-button').attr('disabled', false); 
		$('#client-password-text').text('');   
    });

	$('#client-password-con').bind('keypress', function(){
        $('#cd-create-button').attr('disabled', false); 
		$('#client-password-con-text').text('');   
    });

    const inputToken = $('#complete-trans-form input[name="_token"]');
	const token = inputToken.val();

	const inputTransIdNo = $('#complete-trans-form input[name="spock_id_no"]');
	const clientTransIdNo = inputTransIdNo.val();
	console.log('trans-id-no: ', clientTransIdNo);

    const inputUserStatus = $('#complete-trans-form input[name="user_status"]');
	const clientUserStatus = inputUserStatus.val();
	
	const inputUserLevel = $('#complete-trans-form input[name="user_level"]');
	const clientUserLevel = inputUserLevel.val();
    console.log('user-level: ', clientUserLevel)

    const inputFirstName = $('#complete-trans-form input[name="firstname"]');
    const clientFirstName = inputFirstName.val();

	const inputLastName = $('#complete-trans-form input[name="lastname"]');
    const clientLastName = inputLastName.val();

	const inputClientContactNo = $('#complete-trans-form input[name="mobile_no"]');
    const clientContactNo = inputClientContactNo.val();

    const inputClientEmail = $('#complete-trans-form input[name="email"]');
	const clientEmail = inputClientEmail.val();

	const inputClientPassword = $('#complete-trans-form input[name="password"]');
    const clientPassword = inputClientPassword.val();

	var clientPasswordL = inputClientPassword.val().length;

	const inputClientPasswordCon = $('#complete-trans-form input[name="passwordCon"]');
	const clientPasswordConfirm = inputClientPasswordCon.val();
	
    if (!clientEmail){
        $('#client-email-text').text('Email is Required').css('color', '#D24D57');
	} else if (IsEmail(clientEmail) == false){
		$('#client-email-text').text('Email is Invalid').css('color', '#D24D57'); 
	    // $('.inputError').css('color', '#D24D57');
        return false;
	} else {
		var getClientEmail = clientEmail;
	}
	
	if (clientEmail){
		checkClientEmail();
	} else {
		var getClientEmail = clientEmail;
	}

	if(!clientPassword){
		$('#client-password-text').text('Password is Required').css('color', '#D24D57');
	} else if (clientPasswordL < 6){ 
	    $('#client-password-text').text('Password is too weak').css('color', '#D24D57');  
	} else {
		var getClientPassword = clientPassword;
	}
    
	if (!clientPasswordConfirm){
        $('#client-password-con-text').text('Password Confirm is Required').css('color', '#D24D57');
	} else if(clientPasswordConfirm != clientPassword){
        $('#client-password-con-text').text('Password Confirm did not match').css('color', '#D24D57');
	} else {
	    var getClientPasswordConfirm = clientPasswordConfirm;
	}

	if (getClientEmail && getClientPassword && getClientPasswordConfirm){
        callCreateClientAccount();
	}

    function checkClientEmail(){
		$.ajax({
			url: '{{ url("/check-client-email") }}',
			method: 'POST',
			data: {
				_token: function() {
            return "{{csrf_token()}}"
        }, 
		clientEmail
			},
			dataType: "json",
			success: function(response){
                if (response.error != null){
		            $('#client-email-text').after('<span id="client-email-exist" class="input-email" style="color: #D24D57;">This email already exists</span>');             
				}
			}
		});
	}

    function callCreateClientAccount(){
	$.ajax({
    url: '{{ url("/create-client-account") }}',
    data: { 
		_token: function() {
            return "{{csrf_token()}}"
        },
		clientTransIdNo,
		clientFirstName,
		clientLastName,
		clientContactNo,
		clientUserStatus,
        clientUserLevel,
		getClientEmail,
		getClientPassword
	},
        method: 'POST',
	    cache: false,
	    success: function (html){
		$('.client-reg-text').after('<div class="row"><div class="col-md-12"><div id="alert-text" class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Thank you choosing Buzytour. Now, you will be connected to our services.</div></div></div>');
        // setTimeout(window.location.href = '/dashboard', 9000);
		setTimeout(redirectToLogin, 5000);
	    }
	    });
    }
}  

function redirectToLogin(){
    window.location.href = "{{ url('/login') }}";
}

function IsEmail(clientEmail) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(clientEmail)) {
        return false;
    } else{
        return true;
    }
}

function cancelCreatingAccount(event){
	event.preventDefault();
    window.location.href = '/';
}
</script>