<div class="modal" id="registerModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
    <div class="modal-header-new reg-label"><b><p id="register-label"><i class="fa fa-pencil-square"></i> Register</p></b></div>
<form id="rd-register-form">    
{{ csrf_field() }}
<section id="login">
    <div class="row s-space">
</div>    
<div class="container register-con reg-pad">
    <div class="row">
        <div class="col-md-6">
        <label><b>Please Complete the following</b></label>
    </div>
</div>
<div class="row first-row">
	<div class="col-md-3">
        <div class="form-group">        
		    <label>Category</label>
                <select id="jobType" class="form-control rd-inputs industry-select2 job-type" name="job_type">
                    <option></option>
                    <option value="Administrative">Administrative</option>
                    <option value="Clinical">Clinical</option>
                <option value="Nursing">Nursing</option>
            </select>
        <span id="r-job-type-text"></span>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
	    <label for="skills">Position you are applying for</label>
	        <select id="skillTrans" name="position_applied" class="form-control select-skills pos-applied">
		        <option value="">Select</option>
            </select>
	    <span id="r-job-applied-text"></span>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Area of Specialty</label>
            <input id="areaOfSpecialty" class="form-control r-area-of-specialty" type="text" name="area_of_specialty" />                                      
        <span id="r-area-of-specialty-text"></span>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Years of Experience</label>
            <select id="select-years-of-exp" class="form-control years-of-exp" name="years_of_exp">
                <option></option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                <option value="10">10</option>
            </select>                                          
        <span id="r-years-of-exp-text"></span>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Company</label>
            <input id="hicName" class="form-control r-hic-name" type="text" value="King Abdulaziz Medical Cities" name="country" readonly />                                      
        <span id="r-country-text"></span>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Region</label>
            <select id="select-region" class="form-control r-region" name="region">
            <option></option>
            <option value="Al Ahsa">Al Ahsa</option>
            <option value="Dammam">Dammam</option>
            <option value="Jeddah">Jeddah</option>
            <option value="Riyadh">Riyadh</option>
            </select>                     
            <span id="r-region-text"></span>
        </div>
    </div>
<div class="col-md-3">
    <div class="form-group">
        <label>Country</label>
            <input id="hic-network" class="form-control r-country" type="text" value="Kingdom of Saudi Arabia" name="country" readonly />                                      
        <span id="r-country-text"></span>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-6">
        <label><b>Personal Details</b></label>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Firstname</label>                          
            <input id="hic-firstname" type="text" class="form-control rd-inputs r-firstname" name="user_firstname">
        <span id="r-firstname-text"></span>
    </div>    
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Middlename</label>                          
            <input id="hic-middlename" type="text" class="form-control r-middlename" name="user_middlename">
        <span id="r-middlename-text"></span>
    </div>    
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Lastname</label>                          
            <input id="hic-lastname" type="text" class="form-control r-lastname" name="user_lastname">
        <span id="r-lastname-text"></span>
    </div>    
</div>
<div class="col-md-3">
    <div class="form-group">
	    <label>Suffix</label>
	        <input id="hic-suffix" type="text" class="form-control rd-inputs r-suffix" name="user_suffix">
            <input id="account-type" type="hidden" class="form-control rd-inputs r-account-type" value="Applicant" name="user_acount_type">
            <input id="hic-position" type="hidden" class="form-control rd-inputs r-account-type" value="Admnistrator" name="hic_position">
	        <input id="hic-user-status" type="hidden" class="form-control rd-inputs r-user-status" value="New Account" name="hic_user_status">
	        <input id="hic-user-level" type="hidden" class="form-control rd-inputs r-user-level" value="Client" name="hic_user_level">
            <span id="r-suffix-text"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label><b>Contact and Login Credentials</b></label>
    </div>
</div>
<div class="row second-row">
<div class="col-md-3">
    <div class="form-group">
	    <label>Contact Number</label>
	        <input id="hic-admin-contact-no" type="text" class="form-control rd-inputs r-contact-no" name="hic_contact_no">
        <span id="r-contact-no-text"></span>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Email</label>                          
            <input id="hic-email" type="text" class="form-control rd-inputs" name="email">
            <span id="hic-email-text"></span>
        <span id="hic-email-valid-text"></span>
    </div>    
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Password</label>                          
            <input id="hic-password" type="password" class="form-control rd-inputs" name="password">
        <span id="hic-password-text"></span>
    </div>    
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Confirm Password</label>                          
            <input id="hic-password-con" type="password" name="passwordCon" class="form-control rd-inputs">    
                <span id="hic-password-con-text"></span>
            </div>    
        </div>
    </div>
</section>
<div class="modal-footer">
    <button id="reg-btn" type="button" value="Save" class="btn btn-success btn-sm pull-right" onclick="submitRegister(event)">Save</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</form>