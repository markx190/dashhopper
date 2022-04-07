<script type="text/javascript">

function submitLogin(event){
    event.preventDefault();

    $('#email').bind('click', function(){
        $('#email-text').text('');
        $('#cred-match').text('');
        // $('#credError').text('')
        $('#login-button').attr('disabled', false);
    });
    
    $('#password').bind('click', function(){
        $('#password-text').text('');
        $('#cred-match-text').text('');
        $('#login-button').attr('disabled', false);
    });

    const getEmail = $('#login-form input[name="email"]');
    const email = getEmail.val();
    const getPassword = $('#login-form input[name="password"]');
    const password = getPassword.val();

    if (!email){
        $('#email-text').text('Please enter an email').css('color', '#D24D57');
        $('#login-button').attr('disabled', true);
    } else if (IsEmail(email) == false){
		$('#email-text').text('Email is Invalid').css('color', '#D24D57'); 
	    // $('.errorText').css('color', '#D24D57');
        $('#login-button').attr('disabled', true);
        return false;
    }

    if (!password){
        $('#password-text').text('Please enter a Password').css('color', '#D24D57');
        $('#login-button').attr('disabled', true);
    }
    
    if (email && password){
        toLogin();
    }

function toLogin(){
    $.ajax({
        url: '{{ url("/login") }}',
            method: 'POST',
            data: { 
		        _token: function() {
                return "{{csrf_token()}}"
            },
		    email,
		    password 
	    },
        dataType: "json",
	    success: function (response){
        console.log('response to ', response);
        
        if(response.errors != null){
            $('#cred-match-text').text('Credentials you have entered did not match').css('color', '#D24D57');
            $('#login-button').attr('disabled', true);
        } else if (response.checked != null){
            window.location.href = "/dashboard";
        }
	    // window.location.href = "/dashboard";
	    }
    })
 
    }
}

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
        return false;
    } else{
        return true;
    }
}

</script>

