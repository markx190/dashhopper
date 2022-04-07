<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>
<script type='text/javascript'>
    
    $('#accountType').on('change', function(){
		getAccountType(this.value);
	});

	$('.account-select2').bind('click', function(){
        $('#accountText').text('');
		$('#submit-button').attr('disabled', false);
	});

	$('.industry-select2').bind('click', function(){
        $('#industryText').text('');
		$('#submit-button').attr('disabled', false);
	});

	$('.select-skills').bind('click', function(){
        $('#serviceText').text('');
		$('#submit-button').attr('disabled', false);
	});

	$('.location-select').bind('click', function(){
        $('#locationText').text('');
		$('#submit-button').attr('disabled', false);
	});

	$('.radio').on('change', function(){
        $('#genderText').text('');
		$('#submit-button').attr('disabled', false);
	});

	$('.select-month').bind('click', function(){
        $('#monthText').text('');
	});

	$('#passwordCon').bind('keypress', function(){
		$('#password-con-text').text('');
		// $('#passwordMatch').text('');
		$('#submit-button').attr('disabled', false);
	});

	function getAccountType(typeValue){
        if (typeValue == 'Single'){
			$('#companyName').attr('disabled', true);
		} else {
			$('#companyName').attr('disabled', false);
		}
	}

	$('#industry').on('change', function(){
		getSkillsFilter(this.value);
	});

    function getSkillsFilter(industryValue){
        $.ajax({
            url: '/skill_filters',
            method: 'post',
            dataType: 'json',
            data: { 
		        _token: function() {
                    return "{{ csrf_token() }}"
                },
            industryValue
            },
            success: function (response){
                // $('#skillFilter').attr('disabled', false);
                const skills = response;
                var roles = {
                    skills
                }
                // console.log(roles);
                var dropDownField = roles;
                var html = '<option value=""></option>';
                if (typeof(dropDownField) === "object" && Object.keys(dropDownField).length) {
                    $.each(dropDownField.skills, function(key, data) {
                    html += `<option value="${data.title}">${data.title}</option>`;
                    });
                }
                $('#skillTrans').html(html); 
            }
        });
    }

	$('#submit-button').click(function(){
		$([document.documentElement, document.body]).animate({
            scrollTop: $("#registerPage").offset().top
        }, 800);
	});
		
    function toSubmit(event){	   
	    event.preventDefault();
         
        $('#submit-button').attr('disabled', true);

        $('#firstname').bind('keypress', function(){
	        $('#firstname-text').text('');
	        $('#submit-button').attr('disabled', false);
	    });

		$('#lastname').bind('keypress', function(){
            $('#lastname-text').text('');
	        $('#submit-button').attr('disabled', false);
		});

		$('#age').bind('keypress', function(){
            $('#age-text').text('');
	        $('#submit-button').attr('disabled', false);
		});

		$('#day').bind('keypress', function(){
            $('#day-text').text('');
			$('#submit-button').attr('disabled', false);
		});

		$('#year').bind('keypress', function(){
            $('#year-text').text('');
			$('#submit-button').attr('disabled', false);
		});

		$('#mobileno').bind('keypress', function(){
            $('#mobile-text').text('');
			$('#submit-button').attr('disabled', false);
		});

        $('#email').bind('keypress', function(){
            $('#email-text').text('');
            $('#emailExist').text('');
			$('#submit-button').attr('disabled', false);
		});

		$('#password').bind('keypress', function(){
            $('#password-text').text('');
			$('#submit-button').attr('disabled', false);
		});

	const inputToken = $('#register-form input[name="_token"]');
	const token = inputToken.val();

	const accountType = $('#accountType').val(); 
    const industry = $('#industry').val();
	const pOrigin = $('#origin').val(); 
    
	const skill = $('#skillTrans').val();    
    const companyName = $('#companyName').val();
	
	const inputFirstName = $('#register-form input[name="firstName"]');
    const firstName = inputFirstName.val();

	const inputLastName = $('#register-form input[name="lastName"]');
    const lastName = inputLastName.val();

	const inputUserStatus = $('#register-form input[name="user_status"]');
	const userStatus = inputUserStatus.val();
	const inputUserLevel = $('#register-form input[name="user_level"]');
	const userLevel = inputUserLevel.val();
	
	const inputMobileNo = $('#register-form input[name="mobile_no"]');
	const mobileNumber = inputMobileNo.val();
	var mobileLength = $("#mobileno").val().length;

	const inputEmail = $('#register-form input[name="email"]');
	const email = inputEmail.val();

	const inputPassword = $('#register-form input[name="password"]');
    const passWord = inputPassword.val();
	var passwordL = inputPassword.val().length;

	const inputPasswordCon = $('#register-form input[name="passwordCon"]');
	const passwordConfirm = inputPasswordCon.val();
    
	if(!accountType){
		$('#accountText').text('Account type is required').css('color', '#D24D57');
	} else {
		var getAccountType = accountType;
	}

	if(!industry){
		$('#industryText').text('Industry is required').css('color', '#D24D57');
	} else {
        var getIndustry = industry;
	}

	if(!skill){
		$('#serviceText').text('Service is required').css('color', '#D24D57');
	} else{
        var getSkill = skill;
	}

	if(!pOrigin){
		$('#locationText').text('Location is required').css('color', '#D24D57');
	} else{
        var getOrigin = pOrigin;
	}

	if(!firstName){
		$('#firstname-text').text('Firstname is required').css('color', '#D24D57');
	} else {
		var getFirstName = firstName;
	}

	if(!lastName){
		$('#lastname-text').text('Lastname is required').css('color', '#D24D57');
	} else {
		var getLastName = lastName;
	}

	if(!mobileNumber){
		$('#mobile-text').text('Mobile number is Required').css('color', '#D24D57');
	} else if (isMobile(mobileNumber) == false){
        $('#mobile-text').text('Mobile Number is Invalid').css('color', '#D24D57');  
		return false;
	} else if (mobileLength > 11){
        $('#mobile-text').text('Mobile Number should not exceed 11 digits').css('color', '#D24D57');  
		return false;       
	} else {
		var getMobileNumber = mobileNumber;
	}

	if (!email){
        $('#email-text').text('Email is Required').css('color', '#D24D57');
	} else if (IsEmail(email) == false){
		$('#email-text').text('Email is Invalid').css('color', '#D24D57'); 
	    // $('.inputError').css('color', '#D24D57');
        return false;
	} else {
		var getEmail = email;
	}
	
	if (email){
		checkEmail();
	} else {
		var getEmail = email;
	}

	if(!passWord){
		$('#password-text').text('Password is Required').css('color', '#D24D57');
	} else if (passwordL < 6){ 
	    $('#password-text').text('Password is too weak').css('color', '#D24D57');  
	} else {
		var getPassWord = passWord;
	}
    
	if (!passwordConfirm){
        $('#password-con-text').text('Password Confirm is Required').css('color', '#D24D57');
	} else if(passwordConfirm != passWord){
        $('#password-con-text').text('Password Confirm did not match').css('color', '#D24D57');
	} else {
	    var getPasswordConfirm = passwordConfirm;
	}
	
	if (getAccountType && getIndustry && getOrigin && getSkill && getFirstName && getLastName && getEmail && getPassWord && getPasswordConfirm){
		callRegister();
	}

	// $('.inputError').css('color', 'red');
	function checkEmail(){
		$.ajax({
			url: "{{ url('/check-mail') }}",
			method: 'POST',
			data: {
				_token: function() {
            return "{{csrf_token()}}"
        }, 
		email
			},
			dataType: "json",
			success: function(response){
                if (response.error != null){
		            $('#email').after('<span id="emailExist" class="input-email" style="color: #D24D57;">This email already exists</span>');             
				}
			}
		});
	}

	function callRegister(){
	$.ajax({
    url: '{{ url("/register") }}',
    data: { 
		_token: function() {
            return "{{csrf_token()}}"
        },
		getAccountType,
		getIndustry,
		getOrigin,
		getFirstName,
		getLastName,
		getSkill,
		companyName,		
		// getGender,
		// getAge,
		// getBirthMonth,
		// getBirthDay,
		// getBirthYear,
		getMobileNumber,
		userStatus,
        userLevel,
		getEmail,
		getPassWord
	},
        method: 'POST',
	    cache: false,
	    success: function (html){
		$('.reg-text').after('<div class="row"><div class="col-md-12"><div id="alert-text" class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Thank you for joining. Now, you will be connected with people who will be needing your service.</div></div></div>');
        // setTimeout(window.location.href = '/dashboard', 9000);
		setTimeout(redirectToDashboard, 5000);
	    }
	    });
    }
}

function redirectToDashboard(){
    window.location.href = '/dashboard';
}

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
        return false;
    } else{
        return true;
    }
}

function isMobile(mobileNumber){
	var phone_pattern = /^([0-9]{11})|(\([0-9]{0}\))/;
	if(phone_pattern.test(mobileNumber)){
		return true;
	} else {
		return false;
	}
}

</script>