<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>
<script>
    function showRegisterForm(event){
        
        $('#registerModal').modal('show');   
        $('.reg-pad').hide();
        $('#reg-btn').attr('disabled', true); 
        $('.s-space').html('<div class="row spinner-red-login"><div class="col-md-12"><img class="displayed" src="/profilecake/images/ajax-loader-circle.gif" /></div>');  
        setTimeout(hideSpinner, 1000);  
    }    

    function hideSpinner(){
        $('.spinner-red-login').hide();
        $('.reg-pad').show();
        $('#reg-btn').attr('disabled', false);
    }  

    $('#jobType').on('change', function(){
		getJobSelectValue(this.value);
	});

    function getJobSelectValue(industryValue){
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
                console.log(roles);
                var dropDownField = roles;
                var html = '<option value=""></option>';
                if (typeof(dropDownField) === "object" && Object.keys(dropDownField).length) {
                    $.each(dropDownField.skills, function(key, data) {
                        html += `<option value="${data.position_name}">${data.position_name}</option>`;
                    });
                }
                $('#skillTrans').html(html); 
            }
        });
    }

    function submitRegister(event){
        $('#reg-btn').attr('disabled', true);
        
        var rJobType = $('.job-type').val();
        var rPositionApplied = $('.pos-applied').val();
        var rAreaOfSpecialty = $('.r-area-of-specialty').val();
        console.log('area: ', rAreaOfSpecialty);
        var rYearsOfExp = $('.years-of-exp').val();
        var rCountry = $('.r-country').val();
        var rRegion = $('.r-region').val();
        var rHicName = $('.r-hic-name').val();
        var rFirstname = $('.r-firstname').val();
        var rMiddlename = $('.r-middlename').val();
        var rLastname = $('.r-lastname').val();
        var rSuffix = $('.r-suffix').val();
        var rAccountType = $('.r-account-type').val();
        var rUserStatus = $('.r-user-status').val();
        var rUserLevel = $('.r-user-level').val();
        var rAccountType = $('.r-account-type').val();
        var rContactNo = $('.r-contact-no').val();

        const mobileNumber = $('.r-contact-no').val();
	    var mobileLength = $(".r-contact-no").val().length;
        
        const hicEmailVal = $('#rd-register-form input[name="email"]');
        const email = hicEmailVal.val();

        const hicPassWordVal = $('#rd-register-form input[name="password"]');
        const hicPassWord = hicPassWordVal.val();
	    var hicPassWordL = hicPassWordVal.val().length;

        const hicPassWordConVal = $('#rd-register-form input[name="passwordCon"]');
        const hicPassWordCon = hicPassWordConVal.val(); 
        
        if (!rJobType){
            $('#r-job-type-text').text('* Job Type is Required').css('color', '#DC3545');
        }

        $('.job-type').bind('click', function(){
            $('#r-job-type-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!rPositionApplied){
            $('#r-job-applied-text').text('* Job Title is Required').css('color', '#DC3545');
        }

        $('.pos-applied').bind('click', function(){
            $('#r-job-applied-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!rYearsOfExp){
            $('#r-years-of-exp-text').text('* Years of Experience is Required').css('color', '#DC3545');
        }

        $('.years-of-exp').bind('click', function(){
            $('#r-years-of-exp-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!rAreaOfSpecialty){
            $('#r-area-of-specialty-text').text('* Area of Specialty is Required').css('color', '#DC3545');
        }

        $('.r-area-of-specialty').bind('click', function(){
            $('#r-area-of-specialty-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!rCountry){
            $('#r-country-text').text('* Country is Required').css('color', '#DC3545');
        }

        $('.r-country').bind('click', function(){
            $('#r-country-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!rRegion){
            $('#r-region-text').text('* Region is Required').css('color', '#DC3545');
        }

        $('.r-region').bind('click', function(){
            $('#r-region-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!rFirstname){
            $('#r-firstname-text').text('* Firstname is Required').css('color', '#DC3545');
        }

        $('.r-firstname').bind('click', function(){
            $('#r-firstname-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!rLastname){
            $('#r-lastname-text').text('* Lastname is Required').css('color', '#DC3545');
        }

        $('.r-lastname').bind('click', function(){
            $('#r-lastname-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!rContactNo){
            $('#r-contact-no-text').text('* Contact Number is Required').css('color', '#DC3545');
        }

        $('.r-contact-no').bind('click', function(){
            $('#r-contact-no-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!email){
            $('#hic-email-text').text('* Email is Required').css('color', '#DC3545');
        } else if (IsEmail(email) == false) {
            $('#hic-email-valid-text').text('* This is not a valid email').css('color', '#D24D57');
            return false;
        } else {
            var hic_email = email;
        }

        $('#hic-email').bind('click', function(){
            $('#hic-email-text').text('');
            $('#hic-email-valid-text').text('');
            $('#email-exist').text('');
            $('#reg-btn').attr('disabled', false);
        });

    
        if (!hicPassWord){
            $('#hic-password-text').text('* Password is Required').css('color', '#DC3545');
        } else if (hicPassWordL < 6) {
            $('#hic-password-text').text('Password is too weak').css('color', '#DC3545');
        } else {
            var hic_password = hicPassWord;
        }

        $('#hic-password').bind('click', function(){
            $('#hic-password-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!hicPassWordCon){
            $('#hic-password-con-text').text('* Password Confirm is Required').css('color', '#DC3545');
        } else if (hicPassWordCon !== hicPassWord){
            $('#hic-password-con-text').text('* Password Confirm did not match').css('color', '#DC3545');              
        } else {
            var hic_password_con = hicPassWordCon;
        }

        $('#hic-password-con').bind('click', function(){
            $('#hic-password-con-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

    if (email){
		checkEmail();
	} 
    
    function validateEntry() {
        if (rJobType && rPositionApplied && rCountry && rRegion && rFirstname && rLastname && rContactNo && hic_email && hic_password && hic_password_con){
            callRegisterHic();
        }
    }

    function checkEmail(){
        $.ajax({
            url: "{{ url('/check-email') }}",
            method: 'POST',
            data: {
                _token: function(){
                    return "{{ csrf_token() }}"
                },
            email
            },
            dataType: 'JSON',
                success: function(response){
                if (response.error != null){
		            $('#hic-email').after('<span id="email-exist" class="input-email" style="color: #D24D57;">This email already exists</span>');             
				} else {
                    validateEntry();
                }
            }
        });  
    }


function callRegisterHic(){
	$.ajax({
    url: "{{ url('/register') }}",
    method: 'POST',
    data: { 
		_token: function() {
            return "{{csrf_token()}}"
        },
		rJobType,
        rPositionApplied,
        rAreaOfSpecialty,
        rYearsOfExp,
        rCountry,
        rHicName,
        rRegion,
        rFirstname,
        rMiddlename,
        rLastname,
        rSuffix,
        rContactNo,
        rAccountType,
        rUserStatus,
        rUserLevel,
        rAccountType,
		hic_email,
        hic_password
	},
	    cache: false,
	    success: function (html){
		$('.reg-label').after('<div class="col-md-12 rd-alert-margin"><div id="alert-text" class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Thank you for choosing Davis International Recruitment Agency</div></div>');
		setTimeout(removeRegisterModal, 3000);
	    }
	    });
    }

    function removeRegisterModal(){
        $('#alert-text').hide();
        $('#registerModal').modal('hide');
        setTimeout(redirectToDashboard, 1000);
    }

    function redirectToDashboard(){
        window.location.href = "{{ url('/dashboard') }}";
    }

    function isMobile(mobileNumber){
	    var phone_pattern = /^([0-9]{11})|(\([0-9]{0}\))/;
	 
        if(phone_pattern.test(mobileNumber)){
		    return true;
	    } else {
		    return false;
	    }
    }

    function IsEmail(email) {
    
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
            return false;
        } else {
            return true;
        }
    }
}

</script>