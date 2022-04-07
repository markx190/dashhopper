<div id="updateProfile" class="container">
	<header class="section-header">
        <h2 style="text-align: center; font-size: 22px;">Update your Profile<br>
        <br>
    <img src="/uploads/avatars/{{ $userData->avatar }}" style="width:145px; height:138px; image-align:center; border-radius:50%"></h2>
</header>
<div class="row">
	<div class="col-md-4">
	    <div class="form-group">
	        <div class="icon" style="background: #BFBFBF;"><i class="ion-ios-speedometer-outline icon-margin" style="color: #FFFFFF; font-size: 28px; text-align:center;"></i><b><a id="goToUsernamePassword" style="cursor: pointer;" style="text-decoration: none;"> Update Username and Password</a></b></div>
        </div>	
    </div>
</div>
<b> Complete your Personal Information</b>
<br />

<form id="register-form">
<div class="row">
	<div class="col-md-3">
		<label for="firstname">Firstname:</label>
	        <input id="spock_id_no" type="hidden" class="form-control" name="spock_id_no" value="{{ $userData->spock_id_no }}">
	        <input id="user_id_no" type="hidden" class="form-control" name="user_id_no" value="{{ $userData->user_id_no }}">
	    <input id="firstname" type="text" class="form-control" name="firstName" value="{{ $userData->firstname }}">
    <span id="firstname-text"></span>
</div>
<div class="col-md-3">
    <label for="lastname">Lastname:</label>                          
        <input id="lastname" type="text" class="form-control" name="lastName" value="{{ $userData->lastname }}">
    <span id="lastname-text"></span>
</div>
<div class="col-md-3">
    <label for="middlename">Middlename:</label>                          
        <input id="middlename" type="text" class="form-control" name="middleName" value="{{ $userData->middlename }}">
</div>
<div class="col-md-3">
    <label for="suffix">Suffix: (Name extension)</label>                          
		<input id="userStatus" type="hidden" class="form-control" name="user_status" value="New Applicant">
			<input id="userLevel" type="hidden" class="form-control" name="user_level" value="Bt Personnel">
		<input id="suffix" type="text" class="form-control" name="suffix" value="{{ $userData->suffix }}">
	</div>
</div>
<div class="row">
    <div id="divGender" class="col-md-3">
		<label for="gender">Gender:</label><br>
		    <input class="radio" id="male" type="radio" value="Male" name="gender" {{ $userData->gender == 'Male' ? 'checked' : '' }}> Male
	        <input class="radio" id="female" type="radio" value="Female" name="gender" {{ $userData->gender == 'Female' ? 'checkedd' : '' }}> Female
		<br>
	<span id="genderText"></span>
</div>
<div class="col-md-3">
    <label for="age">Age</label>                
        <input id="age" type="number" class="form-control" name="age" maxlength="2" value="{{ $userData->age }}">
        <span id="age-text"></span>        
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
        <label for="date_of_birth"><b>Date of Birth</b></label>                
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<label for="birthmonth">Month:</label>                          
			<select id="month" name="birthmonth" class="form-control select-month">
				<option value="{{ $userData->birthmonth }}">{{ $userData->birthmonth }}</option>
					<option value="January">January</option>
						<option value="February">February</option>
						    <option value="March">March</option>
						        <option value="April">April</option>
						            <option value="May">May</option>
						            <option value="June">June</option>
						        <option value="July">July</option>
						    <option value="August">August</option>
					    <option value="September">September</option>
				    <option value="October">October</option>
			    <option value="November">November</option>
		    <option value="December">December</option>
        </select>
	<span id="s-month-text"></span>
</div>
<div class="col-md-3">
    <label for="day">Day</label>                
        <input id="day" type="number" class="form-control" name="birthday" value="{{ $userData->birthday }}">
    <span id="day-text"></span>
</div>
<div class="col-md-3">
    <label for="year">Year</label>                         
        <input id="year" type="number" class="form-control" name="birthyear" value="{{ $userData->birthyear }}">
    <span id="year-text"></span>
</div>
<div class="col-md-3">
    <label for="mobile_no">Mobile Number:</label>                          
        <input id="mobileno" type="number" class="form-control" name="mobile_no" maxlength="11" value="{{ $userData->mobile_no }}">
        <span id="mobile-text"></span>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
        <label for="personal_address"><b>Address</b></label>                
	</div>
</div>
<div class="row">
    <div class="col-md-3">
        <label for="street">Street (Bldg. No. Optional)</label>                
        <input id="street" type="text" class="form-control" name="street" value="{{ $userData->street }}">
    <span id="street-text"></span>
</div>
<div class="col-md-3">
    <label for="village">Village (Barangay)</label>                
        <input id="village" type="text" class="form-control" name="village" value="{{ $userData->village }}">
    <span id="village-text"></span>
</div>
<div class="col-md-3">
    <label for="city">Municipality / City</label>                         
        <input id="city" type="text" class="form-control" name="city" value="{{ $userData->city }}">
    <span id="city-text"></span>
</div>
<div class="col-md-3">
    <label for="province">Province</label>                         
        <input id="province" type="text" class="form-control" name="province" value="{{ $userData->province }}">
        <span id="province-text"></span>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
	    <label for="account_type">Account Type</label>
		    <select id="accountType" name="account_type" class="form-control select2">
                <option value="{{ $userData->account_type }}">{{ $userData->account_type }}</option>
				<option></option>
			    <option value="Single">Single</option>
	        <option value="Company">Company</option>
	    </select>
	<span id="account-text"></span>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="company_name">Company Name:</label>                          
		    <input id="companyName" type="text" class="form-control" name="company_name">
            <span id="company-text"></span>
	    </div>
    </div>
</div>
<div class="row">
<div class="col-md-3">
	<label for="industry">Industry</label>
	    <select id="industry" name="industry" class="form-control select-industry industry-select2">
            <option value="{{ $userData->industry }}">{{ $userData->industry }}</option>
			    <option></option>
				    <option value="Accommodation Services">Accommodation</option>
				        <option value="Travel and Tours">Travel and Tours</option>
				            <option value="Movers / Forwarding / Delivery">Movers / Delivery</option>
				                <option value="Mechanical">Mechanical / Welding</option>
				                    <option value="Electronics">Electronics</option>
						            <option value="IT and Computers Support">IT and Computers</option>
				 		        <option value="Carpentry">Carpentry</option>
						    <option value="Painting / Coating">Painting</option>	
						<option value="Plumbing">Plumbing</option>		 
			        <option value="Online Variety Selling">Online Variety Selling</option>
			    <option value="Online Food Selling">Online Food Selling</option>	 
			<option value="General Cleaning">General Cleaning</option>
        </select>
	<span id="industry-text"></span>
</div>
<div class="col-md-6">
    <div class="form-group">
	    <label for="skills">Service Offered</label>
	        <select id="skillTrans" name="skills" class="form-control select-skills">
                <option value="{{ $userData->skills }}">{{ $userData->skills }}</option>
            </select>
	    <span id="service-text"></span>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
	<label for="point_of_origin">Service Origin</label>
	    <select id="origin" name="point_of_origin" class="form-control location-select">
            <option value="{{ $userData->point_of_origin }}">{{ $userData->point_of_origin }}</option>
			    <option value=""></option>
				    <option value="Aurora">Aurora</option>
				    <option value="Leyte">Leyte</option>    
                </select>
		    <span id="location-text"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button id="submit-button" type="button" class="btn btn-primary pull-right" onclick="toUpdateProfile(event)">Submit</button>                      
	</div>
</div>
</form>
    </section>
		<p id="updateProfileInit"><p>
    </main>
</div>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>
<script type="text/javascript">
    
    $('#goToUsernamePassword').on('click', function(){
        $.ajax({
            url: '/goToUsernamePassword',
            method: 'get',
            cache: false,
            success: function(html){
                $('#updateProfile').hide();
                $('#updateProfile').after('<section id="updateUsernamePassword"></section>');
                $('#updateUsernamePassword').html(html);
            }
        })
    });

$('.select2').on('change', function(){
	getAccountType(this.value);
});

function getAccountType(typeValue){
    if (typeValue == 'Single'){
		$('#companyName').attr('disabled', true);
	} else {
		$('#companyName').attr('disabled', false);
	}
}
    
    $('#accountType').bind('click', function(){
        $('#account-text').text('');
        $('#submit-button').attr('disabled', false);
	});

    $('.industry-select2').bind('click', function(){
        $('#industry-text').text('');
        $('#submit-button').attr('disabled', false);
	});

	$('.select-skills').bind('click', function(){
        $('#service-text').text('');
        $('#submit-button').attr('disabled', false);
	});

    $('.location-select').bind('click', function(){
        $('#location-text').text('');
        $('#submit-button').attr('disabled', false);
    });

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
                const skills = response;
                var roles = {
                    skills
                }
                // console.log(roles);
                var dropDownField = roles;
                var html = '';
                if (typeof(dropDownField) === "object" && Object.keys(dropDownField).length) {
                    $.each(dropDownField.skills, function(key, data) {
                    html += `<option value="${data.title}">${data.title}</option>`;
                    });
                }
                $('#skillTrans').html(html); 
            }
        });
    }

</script>


