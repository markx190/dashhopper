<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>
<script type='text/javascript'>

function toUpdateProfile(event){
	event.preventDefault();
	$('#submit-button').attr('disabled', true);

	$([document.documentElement, document.body]).animate({
	scrollTop: $("#updateProfile").offset().top
    }, 800);

	$('#firstname').bind('keypress', function(){
        $('#firstname-text').text('');
		$('#submit-button').attr('disabled', false);
	});

	$('#lastname').bind('keypress', function(){
        $('#lastname-text').text('');
		$('#submit-button').attr('disabled', false);
	});

	$('.radio').on('change', function(){
        $('#genderText').text('');
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
	
	$('.select-month').bind('click', function(){
        $('#s-month-text').text('');
    });

	$('#year').bind('keypress', function(){
        $('#year-text').text('');
		$('#submit-button').attr('disabled', false);
	});

	$('#mobileno').bind('keypress', function(){
        $('#mobile-text').text('');
		$('#submit-button').attr('disabled', false);
	});

	$('#street').bind('keypress', function(){
        $('#street-text').text('');
		$('#submit-button').attr('disabled', false);
	});

	$('#village').bind('keypress', function(){
        $('#village-text').text('');
		$('#submit-button').attr('disabled', false);
	});

	$('#city').bind('keypress', function(){
        $('#city-text').text('');
		$('#submit-button').attr('disabled', false);
	});

	$('#province').bind('keypress', function(){
        $('#province-text').text('');
		$('#submit-button').attr('disabled', false);
	});
	
	const inputToken = $('#register-form input[name="_token"]');
	const token = inputToken.val();
    
	const inputFirstName = $('#register-form input[name="firstName"]');
    const firstName = inputFirstName.val();
    if (!firstName){
        $('#firstname-text').text('Firstname is required').css('color', '#D24D57');
    } 
    const inputMiddleName = $('#register-form input[name="middleName"]');
    const middleName = inputMiddleName.val();
    const inputLastName = $('#register-form input[name="lastName"]');
    
	const lastName = inputLastName.val();
	if (!lastName){
		$('#lastname-text').text('Lastname is required').css('color', '#D24D57');
	}
	 
	const inputSuffix = $('#register-form input[name="suffix"]');
    const suffix = inputSuffix.val(); 
	
	const checkMale = $('#male:input:radio').is(':checked');
	const checkFemale = $('#female:input:radio').is(':checked');
    
	if (checkMale == true){
        var inputGender = $('#male:input[name="gender"]');
		var gender = inputGender.val();
		$('#gender').after('<input id="getGender" class="inputHidden" value="ok" type="hidden">');
    } else if (checkFemale == true){
		var inputGender = $('#female:input[name="gender"]');
		var gender = inputGender.val();
		$('#gender').after('<input id="getGender" class="inputHidden" value="ok" type="hidden">');
	} else {
	    $('#genderText').text('This field is required').css('color', '#D24D57');
	}

	const inputAge = $('#register-form input[name="age"]');
	const age = inputAge.val();
	var yourAge = $('#age').val().length;

	if (!age){
	    $('#age-text').text('Age is required').css('color', '#D24D57');	    
	}

	const birthMonth = $('#month').val(); 
	
	if (!birthMonth){
		$('#s-month-text').text('Month is required').css('color', '#D24D57');
	} 

	const inputBirthDay = $('#register-form input[name="birthday"]');
	const birthDay = inputBirthDay.val();
	var dayL = $('#day').val().length;
	
	if (!birthDay){
		$('#day-text').text('Day is Required').css('color', '#D24D57');
	} else if (dayL > 2){
        $('#day-text').text('Day is Invalid').css('color', '#D24D57');
	} else if (birthDay < 1 || birthDay > 31){
        $('#day-text').text('Day is Invalid').css('color', '#D24D57');
	} else {
		$('#day-text').text('');
	}

	const inputBirthYear = $('#register-form input[name="birthyear"]');
    const birthYear = inputBirthYear.val();
    var yearL = $('#year').val().length;
	
	if (!birthYear){
		$('#year-text').text('Year is Required').css('color', '#D24D57');
	} 

	const inputUserStatus = $('#register-form input[name="user_status"]');
	const userStatus = inputUserStatus.val();
	const inputUserLevel = $('#register-form input[name="user_level"]');
	const userLevel = inputUserLevel.val();
	
	const inputMobileNo = $('#register-form input[name="mobile_no"]');
	const mobileNumber = inputMobileNo.val();
	var mobileLength = $("#mobileno").val().length;

	if (!mobileNumber){
		$('#mobile-text').text('Mobile is Required').css('color', '#D24D57');
	} else if (isMobile(mobileNumber) == false){
        $('#mobile-text').text('Mobile Number is Invalid').css('color', '#D24D57');
		return false;
	} else {
		$('#mobile-text').text('');
	}

	const inputStreet = $('#register-form input[name="street"]');
    const streetVal = inputStreet.val();

	if (!streetVal){
		$('#street-text').text('Street is Required').css('color', '#D24D57');
	}
    
	const inputVillage = $('#register-form input[name="village"]');
	const villageVal = inputVillage.val();

	if (!villageVal){
		$('#village-text').text('Village is Invalid').css('color', '#D24D57');
	}

	const inputCity = $('#register-form input[name="city"]');
	const cityVal = inputCity.val();

	if (!cityVal){
		$('#city-text').text('City is Required').css('color', '#D24D57');
	}

	const inputProvince = $('#register-form input[name="province"]');
	const provinceVal = inputProvince.val();

	if (!provinceVal){
		$('#province-text').text('Province is Required').css('color', '#D24D57');
	}

    const inputAccountType = $('#accountType').val();
	const accountTypeVal = inputAccountType;

	if (!accountTypeVal){
		$('#account-text').text('Account Type is Required').css('color', '#D24D57');
	}

	if (accountTypeVal == 'Company'){
		var companyVal = $('#companyName').val();

	    if (!companyVal){
		    $('#company-text').text('Company name is Required').css('color', '#D24D57');            
		}	
	}

	const industry = $('#industry').val();
	const skill = $('#skillTrans').val();
	const pOrigin = $('#origin').val();

	if(!industry){
		$('#industry-text').text('Industry is required').css('color', '#D24D57');
	} else{
        var getIndustry = industry;
	}

	if(!skill){
		$('#service-text').text('Service is required').css('color', '#D24D57');
	} else{
        var getSkill = skill;
	}

	if(!pOrigin){
		$('#location-text').text('Location is required').css('color', '#D24D57');
	} else{
        var getOrigin = pOrigin;
	}

	if (birthYear < 1955 || birthYear > 2000){
        $('#year-text').text('Year is Invalid').css('color', '#D24D57');
	} else if (yearL > 4){
		$('#year-text').text('Year is Invalid').css('color', '#D24D57');
	} else if (mobileLength > 11){
        $('#mobile-text').text('Mobile number should not exceed 11 digits').css('color', '#D24D57');
	} else if (yourAge > 2){
        $('#age-text').text('Age is Invalid').css('color', '#D24D57');
    } else if (age < 20 || age > 85){
        $('#age-text').text('Age is Invalid').css('color', '#D24D57');
	} else {
        if (firstName && lastName && gender && age && birthMonth && birthDay && birthYear && mobileNumber && streetVal && villageVal && cityVal && provinceVal && accountTypeVal && getIndustry && getSkill && getOrigin){   
			callUpdateProfile();
  	    }
	}
    
	function callUpdateProfile(){
        $.ajax({
            url: '{{ url("/update_user") }}',
            data: { 
		    _token: function() {
                return "{{csrf_token()}}"
            },

		    firstName,
		    middleName, 
		    lastName,
			suffix,
			gender,
			age,
			birthMonth,
			birthDay,
			birthYear,
			mobileNumber,
			userStatus,
			userLevel,
			streetVal,
			villageVal,
			cityVal,
			provinceVal,
			accountTypeVal,
			companyVal,
			getIndustry,
			getSkill,
			getOrigin
	    },
			method: 'POST',
			cache: false,
			success: function (html){
			$('.registerLoading').hide();
			window.location.href = "/preferences";
			}
		});
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

function saveUpdatedUsernameAndPassword(event){
	event.preventDefault();
	$('#update-button').attr('disabled', true);
    $('input').bind('click', function(){
        $('.inputError').text('');
		$('#update-button').attr('disabled', false);
	});

	const inputEmail = $('#update-form input[name="email"]');
	const email = inputEmail.val();
    
	if (!email){
		$('#email').after('<span id="forError" class="inputError" style="color: red;">This Field is required</span>');
	} else if (IsEmail(email) == false){
		$('#email').after('<span class="inputError" style="color: red;">Invalid Email</span>'); 
	    $('.inputError').css('color', 'red');
        return false;
    } else {
		$('#email').after('<input id="getEmail" class="inputHidden" value="ok" type="hidden">');
	}

	const inputPassword = $('#update-form input[name="password"]');
    const passWord = inputPassword.val();
	var passwordL = $('#password').val().length;
	if (!passWord){
		$('#password').after('<span class="inputError" style="color: red;">This field is required</span>');
	} else {
		$('#password').after('<input id="getPassword" class="inputHidden" value="ok" type="hidden">');
	}

	const inputPasswordCon = $('#update-form input[name="passwordCon"]');
	const passwordConfirm = inputPasswordCon.val();
	
	if(!passwordConfirm){
        $('#passwordCon').after('<span style="color: red;" class="inputError" style="color: red;">This field is required</span>');
	} else if(passwordConfirm != passWord){
        $('#passwordCon').after('<span id="passConText" style="color: red;" class="getPasswordConfirm">Password confirmation did not match</span>');
	} else {
		'';
	}
    
	if(passWord){
        if (passwordL < 6){
		    $('#password').after('<span class="inputError" style="color: red;">Password is too short</span>');
		} else {	
  	        if (email && passWord && passwordConfirm){
	            checkEmail();	   
	        }
	    }
	}

	function checkEmail(){
		$.ajax({
			url: '{{ url("/checkEmail") }}',
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
		            $('#email').after('<span class="inputError" style="color: red;">This email already exists</span>');             
				} else if (response.success == 'ok') {
	                setTimeout(callSaveUpdateUsernamePassword, 3000);
			   }
			}
		});
	}

	function callSaveUpdateUsernamePassword(){
	$.ajax({
    url: '{{ url("/save-updated-username-and-password") }}',
    data: { 
		_token: function() {
            return "{{csrf_token()}}"
        },
		email,
		passWord
	},
        method: 'POST',
	    cache: false,
	    success: function (html){
	    // $('.registerLoading').hide();
	    window.location.href = "/preferences";
	    }
	    });
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