<script>

function submitUpdatedProfile(event){
    event.preventDefault();
    $('#update-profile-btn').attr('disabled', true);
    
    const uHicIdNo = $('#update-profile-form input[name="hic_id_no"]');
    const u_hic_id_no = uHicIdNo.val();
    const u_user_firstname = $('.u-user-firstname').val();
    const u_user_lastname = $('.u-user-lastname').val();
    const u_user_middlename = $('.u-user-middlename').val();
    const u_user_suffix = $('.u-user-suffix').val();
    const u_civil_status = $('.u-civil-status').val();
    const u_religion = $('.u-religion').val();
    const u_user_age = $('.u-user-age').val();
    const u_birth_month = $('.u-birth-month').val();
    const u_birth_day = $('.u-birth-day').val();
    const u_birth_year = $('.u-birth-year').val();
    const u_birthplace = $('.u-birthplace').val();

    const u_hic_contact_no = $('.u-contact-no').val();
	var contactNoLength = $('#hic-admin-contact-no').val().length;
    
    const u_hic_name = $('.u-hic-name').val();
    const u_position = $('.u-position').val();
    const u_user_account_type = $('.u-user-account-type').val();
    
    if(!u_user_firstname){
        $('#update-hic-firstname-text').text('Firstname is Required').css('color', '#D24D57');
    }

    $('.u-user-firstname').bind('click', function(){
        $('#update-hic-firstname-text').text('');
        $('#update-profile-btn').attr('disabled', false);
    });

    if(!u_user_lastname){
        $('#update-hic-lastname-text').text('Lastname is Required').css('color', '#D24D57');
    }

    $('#user-lastname-input').bind('click', function(){
        $('#update-hic-lastname-text').text('');
        $('#update-profile-btn').attr('disabled', false);
    });

    if(!u_hic_name){
        $('#update-hic-name-text').text('Company is Required').css('color', '#D24D57');
    }

    $('#u-hic-name-input').bind('click', function(){
        $('#update-hic-name-text').text('');
        $('#update-profile-btn').attr('disabled', false);
    });

    if(!u_position){
        $('#update-position-text').text('Position is Required').css('color', '#D24D57');
    }

    $('#hic-position-input').bind('click', function(){
        $('#update-position-text').text('');
        $('#update-profile-btn').attr('disabled', false);
    });

    if(!u_user_account_type){
        $('#u-user-account-type-text').text('User Account Type is Required').css('color', '#D24D57');
    }

    $('#u-user-account-type-input').bind('click', function(){
        $('#update-user-account-type-text').text('');
        $('#update-profile-btn').attr('disabled', false);
    });

    if(!u_user_age){
        $('#update-user-age-text').text('Age is Required').css('color', '#D24D57');
    }

    $('.u-user-age').bind('click', function(){
        $('#update-user-age-text').text('');
        $('#update-profile-btn').attr('disabled', false);
    });

    const checkMale = $('#male:input:radio').is(':checked');
	const checkFemale = $('#female:input:radio').is(':checked');
    
    var gender = '';
    if (checkMale == true){
        var inputGender = $('#male:input[name="user_gender"]');
		gender = inputGender.val();

    } else if (checkFemale == true){
		var inputGender = $('#female:input[name="user_gender"]');
		gender = inputGender.val();
		
	} else {
	    $('#genderText').text('This field is required').css('color', '#D24D57');
	}

    $('.c-male').on('click', function(){
        var inputGender = $('#male:input[name="user_gender"]');
		gender = inputGender.val();
        $('#genderText').text('');
    });

    $('.c-female').on('click', function(){
        var inputGender = $('#female:input[name="user_gender"]');
		gender = inputGender.val();
        $('#genderText').text('');
    });

    if(!u_hic_contact_no){
        $('#update-contact-no-text').text('Contact No. is Required').css('color', '#D24D57');
    }

    $('.u-contact-no').bind('click', function(){
        $('#update-contact-no-text').text('');
        $('#update-profile-btn').attr('disabled', false);
    });

    if(!u_hic_contact_no){
		$('#update-hic-contact-no-text').text('Mobile number is Required').css('color', '#D24D57');
	} else if (isMobile(u_hic_contact_no) == false){
        $('#update-contact-no-text').text('Mobile Number is Invalid').css('color', '#D24D57');  
		return false;
	} else if (contactNoLength > 11){
        $('#update-contact-no-text').text('Mobile Number should not exceed 11 digits').css('color', '#D24D57');  
		return false;     
	} else {
		var u_get_hic_contact_no = u_hic_contact_no;
	}

    if(!u_hic_name){
        $('#update-hic-name-text').text('Name of Company is Required').css('color', '#D24D57');
    }

    $('.u-hic-name').bind('click', function(){
        $('#update-hic-name-text').text('');
        $('#update-profile-btn').attr('disabled', false);
    });

    if(!u_position){
        $('#update-position-text').text('Position is Required').css('color', '#D24D57');
    }

    $('.u-position').bind('click', function(){
        $('#update-position-text').text('');
        $('#update-profile-btn').attr('disabled', false);
    });

    if(!u_user_account_type){
        $('#update-user-account-type-text').text('User Account Type is Required').css('color', '#D24D57');
    }

    $('.u-user-account-type').bind('click', function(){
        $('#update-user-account-type-text').text('');
        $('#update-profile-btn').attr('disabled', false);
    });
    
    if(u_hic_name && u_user_firstname && u_user_lastname && u_user_age && u_get_hic_contact_no){
        saveUpdatedProfile();
    }   
    
    function saveUpdatedProfile() {
        $.ajax({
            url: "{{ url('/save-updated-profile') }}",
            method:"POST",
            data: { 
		        _token: function() {
                    return "{{ csrf_token() }}"
                },
            u_hic_id_no,
            u_hic_name,
            u_user_firstname,
            u_user_middlename,
            u_user_lastname,
            u_user_suffix,
            gender,
            u_civil_status,
            u_religion,
            u_user_age,
            u_birth_month,
            u_birth_day,
            u_birth_year,
            u_birthplace,
            u_get_hic_contact_no,
            u_position,
            u_user_account_type
	        },
            cache: false,
            dataType: 'JSON',
            success:function(response)
            {
                if (response.errorStatus == 1){
                    $('.profile-img').html('<div class="row update-alert"><div class="col-md-12 alert-margin"><div class="alert alert-danger"><div class="fa fa-spinner fa-spin"></div> An error was found upon updating your profile.</div></div>'); 
                } else {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $(".main-profile").offset().top
                    }, 1000);
                    $('#update-profile-btn').attr('disabled', false);

                    $('.alert-space').html('<div class="row"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Your Profile was updated.</div></div>'); 
                    setTimeout(viewProfile, 3000);
                }
            }
        });
    }

    function viewProfile(){
        $('.update-alert').hide();
        $.ajax({
            url: "{{ url('/view-profile') }}",
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-profile').html(html);
            }
        });
    }
}

function isMobile(u_hic_contact_no){
	var phone_pattern = /^([0-9]{11})|(\([0-9]{0}\))/;
	 
    if(phone_pattern.test(u_hic_contact_no)){
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
	            // checkEmail();	   
                callSaveUpdateUsernamePassword();
	        }
	    }
	}

	function checkEmail(){
		$.ajax({
			url: '{{ url("/check-email") }}',
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
            $([document.documentElement, document.body]).animate({
                scrollTop: $(".section-header").offset().top
            }, 1000);
            $('.up-alert-div').html('<div class="alert alert-success uname-pass-alert"><div class="fa fa-spinner fa-spin"></div> Username and Password was Updated'); 
                setTimeout(removeUpAlert, 3000);
	        }
	    });
    }
}

function removeUpAlert(){
    $('.uname-pass-alert').hide();
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