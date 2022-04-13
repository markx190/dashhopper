<script type="text/javascript">

function showRegistrationForm(event){
        $('#userRegisterModal').modal('show');   
        $('.reg-pad').hide();
        $('#reg-btn').attr('disabled', true); 
        $('.s-space').html('<div class="spinner-dash" style="text-align: center;"><img class="displayed" src="/bookhivez/images/ajax-loader-circle.gif" /></div>');  
        setTimeout(hideSpinner, 1000);  
    }    

    function hideSpinner(){
        $('.spinner-dash').hide();
        $('.reg-pad').show();
        $('#reg-btn').attr('disabled', false);
    }  

    function submitRegisterUser(event){
        $('#reg-btn').attr('disabled', true);
        
        const hicName = $('.select-hic-name').val();

        const hicAdminContactNoVal = $('#rd-register-form input[name="hic_contact_no"]');
        const hicAdminContactNo = hicAdminContactNoVal.val(); 

        const hicTerminalNetwork = $('.select-terminal-network').val();
        const userAccountType = $('.select-user-account-type').val(); 

        const hicRegion = $('.select-region').val();
        const hicPosition = $('.select-position').val();

        const userFirstnameVal = $('#rd-register-form input[name="user_firstname"]');
        const userFirstname = userFirstnameVal.val();

        const userLastnameVal = $('#rd-register-form input[name="user_lastname"]');
        const userLastname = userLastnameVal.val();

        const hicUserStatusVal = $('#rd-register-form input[name="hic_user_status"]');
        const hic_user_status = hicUserStatusVal.val();

        const hicUserLevelVal = $('#rd-register-form input[name="hic_user_level"]');
        const hic_user_level = hicUserLevelVal.val();

        const hicEmailVal = $('#rd-register-form input[name="email"]');
        const email = hicEmailVal.val();

        const hicPassWordVal = $('#rd-register-form input[name="password"]');
        const hicPassWord = hicPassWordVal.val();
	    var hicPassWordL = hicPassWordVal.val().length;

        const hicPassWordConVal = $('#rd-register-form input[name="passwordCon"]');
        const hicPassWordCon = hicPassWordConVal.val(); 
        
        if (!hicName){
            $('#hic-name-text').text('* Company Name is Required').css('color', '#DC3545');
        } else {
            var hic_name = hicName;
        }

        $('.select-hic-name').bind('click', function(){
            $('#hic-name-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!hicTerminalNetwork){
            $('#hic-terminal-network-text').text('* Terminal is Required').css('color', '#DC3545');
        } else {
            var hic_terminal_network = hicTerminalNetwork;
        }

        $('.select-terminal-network').bind('click', function(){
            $('#hic-terminal-network-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!hicPosition){
            $('#hic-position-text').text('* Position is Required').css('color', '#DC3545');
        } else {
            var hic_position = hicPosition;
        }

        $('.select-position').bind('click', function(){
            $('#hic-position-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!hicAdminContactNo){
            $('#hic-admin-contact-no-text').text('* Contact Number is Required').css('color', '#DC3545');
        } else {
            var hic_admin_contact_no = hicAdminContactNo;
        }

        $('#hic-admin-contact-no').bind('click', function(){
            $('#hic-admin-contact-no-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!userAccountType){
            $('#hic-account-type-text').text('* Account Type is Required').css('color', '#DC3545');
        } else {
            var user_account_type = userAccountType;
        }

        $('.select-user-account-type').bind('click', function(){
            $('#hic-account-type-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!userFirstname){
            $('#hic-firstname-text').text('* Firstname is Required').css('color', '#DC3545');
        } else {
            var user_firstname = userFirstname;
        }

        $('#hic-firstname').bind('click', function(){
            $('#hic-firstname-text').text('');
            $('#reg-btn').attr('disabled', false);
        });

        if (!userLastname){
            $('#hic-lastname-text').text('* Lastname is Required').css('color', '#DC3545');
        } else {
            var user_lastname = userLastname;
        }

        $('#hic-lastname').bind('click', function(){
            $('#hic-lastname-text').text('');
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
        if (hic_name && hic_terminal_network && user_account_type && hic_admin_contact_no && user_firstname && user_lastname && hic_email && hic_password && hic_password_con){
            callRegisterUser();
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

function callRegisterUser(){
    $.ajax({
    url: "{{ url('/register-user') }}",
    method: 'POST',
    data: { 
        _token: function() {
            return "{{csrf_token()}}"
        },
        hic_name,
        user_account_type,
        hic_terminal_network,
        user_firstname,
        user_lastname,
        hic_admin_contact_no,
        hic_position,
        hic_user_status,
        hic_user_level,
        hic_email,
        hic_password
    },
    cache: false,
        success: function (html){
        $('.s-space').after('<div style="margin-top: 15px;" class="col-md-12"><div id="alert-text" style="margin-left: 11px;" class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> A new user was created</div></div>');
        setTimeout(goToListOfUsers, 3000);
        }
    });
}

function removeRegisterUserModal(){
    $('#alert-text').hide();
    $('#registerModal').modal('hide');
    setTimeout(redirectToUserDashboard, 1000);
}

function redirectToUserDashboard(){
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

function goToListOfUsers(event){
    $('.fil-alert-margin').remove();
    $('.msg-alert').remove();
    $('#editUsersModal').modal('hide');
    $('#userRegisterModal').modal('hide');
    $.ajax({
        url: '{{ url("/manage-users") }}',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.main-d').html(html);
            $('.docs-body').hide();
            $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/bookhivez/images/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadUsersDataTable, 1000);
        }
    });   
}

</script>