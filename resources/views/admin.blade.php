@include('layouts.app_up')
<section id="testimonials">
	<div class="container">
	<header class="section-header">
<h3>Profile</h3>
<div class="row">
	<div class="col-lg-8">
            <div class="testimonial-item">
                <img src="/uploads/avatars/{{ $user->avatar }}" class="testimonial-img" alt="">
					<br>
						<h3>{{ Auth::user()->firstname . " " . Auth::user()->lastname }}</h3>
							<h2>{{ Auth::user()->job_applied }}</h2><br>
								<p>{{ Auth::user()->career_motto }}</p>
									</div>
										<br />
											<br />
											<br />
											<b><a style="color: #264348;" href="{{ url('/tokenreadyfullprofile') }}">Profile</a></b> &nbsp;&nbsp;&nbsp;
											<b><a style="color: #264348;" href="{{ url('/editusernameandpassword') }}">Edit Username and Password</a></b> &nbsp;&nbsp;&nbsp;
											<b><a style="color: #264348;" href="{{ url('/profile') }}">Edit Avatar</a></b>
											<div class="panel-body">
										@if(count($errors) > 0)
									<ul>
								@foreach($errors->all() as $error)
							<li class="alert alert-danger">{{ $error }}</li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>
	</div>
	
	<hr>
	<!-- <i class="ion-ios-bookmarks-outline" style="color: #003171;"></i><b> Basic Information</b>
	<br /> -->
	<div class="row">
		<div class="col-md-3">
			<label for="account_type"><b>Type of Account:</b></label><br>
			<input type="radio" value="Job Applicant" name="account_type" {{ $user->account_type == 'Job Applicant' ? 'checked' : '' }}> Job Applicant
		<input type="radio" value="Employer" name="account_type" {{ $user->account_type == 'Employer' ? 'checked' : '' }}> Employer
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label for="prev_job"><b>Previous or Current Job:</b></label>
			<input id="prev_job" type="text" class="form-control" name="prev_job" value="{{ $user->prev_job }}" placeholder="" required autofocus>
		</div>
	</div>

	<div class="col-md-8">
		<div class="form-group">
			<label for="pPreferredLocation"><b>Preferred Location for Employment:</b></label><br>
				<input type="checkbox" value="Riyadh" name="riyadh" {{ Auth::user()->riyadh == 'Riyadh' ? 'checked' : '' }}> Riyadh
					<input type="checkbox" value="Jeddah" name="jeddah" {{ Auth::user()->jeddah == 'Jeddah' ? 'checked' : '' }}> Jeddah
						<input type="checkbox" value="Madinah" name="madinah" {{ Auth::user()->madinah == 'Madinah' ? 'checked' : '' }}> Madinah
						<input type="checkbox" value="Al Ahsa" name="alahsa" {{ Auth::user()->alahsa == 'Al Ahsa' ? 'checked' : '' }}> Al Ahsa
					<input type="checkbox" value="Dammam" name="dammam" {{ Auth::user()->pDammam == 'Riyadh' ? 'checked' : '' }}> Dammam
				<input type="checkbox" value="PHCs" name="PHCs" {{ Auth::user()->PHCs == 'PHCs' ? 'checked' : '' }}> PHCs
			<input type="checkbox" value="No Preference" name="nopref" {{ Auth::user()->nopref == 'No Preference' ? 'checked' : '' }}> No Preference
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label for="job_applied"><b>Job you are interested to apply:</b></label><!--Job that matches your profession, skills, and experience-->
				<select name="job_applied" class="form-control">
					<option value="{{ $user->job_applied }}">{{ $user->job_applied }}</option>
					<option value="Staff Nurse I">Staff Nurse I</option>
					<option value="Staff Nurse II">Staff Nurse II</option>
					<option value="Medical Technologist I">Medical Technologist I</option>
					<option value="Medical Technologist II">Medical Technologist II</option>
					<option value="Phlebotomist">Phlebotomist</option>
					<option value="Pharmacist">Pharmacist</option>
					<option value="Civil Engineer I">Civil Engineer I</option>
					<option value="Civil Engineer II">Civil Engineer II</option>
					<option value="Electrical Engineer I">Electrical Engineer I</option>
					<option value="Electrical Engineer II">Electrical Engineer II</option>
					<option value="Tradesman">Tradesman</option>
					<option value="Carpenter">Carpenter</option>
					<option value="Admin Assistant I">Admin Assistant I</option>
					<option value="Admin Assistant II">Admin Assistant II</option>
					<option value="Software Developer">Software Developer</option>
					<option value="Web Developer">Web Developer</option>
					<option value="System Analyst">System Analyst</option>
					<option value="Project Manager">Project Manager</option>
				</select>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-3">
			<label for="firstname">Firstname:</label><br>
				<input type="hidden" name="user_id_no" value="{{ $user->user_id_no }}" class="form-control">
					<input type="hidden" name="hopper_id_no" value="{{ $user->hopper_id_no }}" class="form-control">
				<input type="text" name="firstname" value="{{ $user->firstname }}" class="form-control">
			<input type="hidden" name="account_type" value="{{ $user->account_type }}" class="form-control">
		<input type="hidden" name="user_level" value="{{ $user->user_level }}" class="form-control">
	</div>
	<div class="col-md-3">
		<label for="lastname">Lastname:</label><br>
			<input type="text" name="lastname" value="{{ $user->lastname }}" class="form-control">
	</div>
	<div class="col-md-3">
		<label for="middlename">Middlename:</label><br>
			<input type="text" name="middlename" value="{{ $user->middlename }}" class="form-control">
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="suffix">Suffix:</label><br>
				<input type="text" name="suffix" value="{{ $user->suffix }}" class="form-control">
		</div>
	</div>
	
	<div class="col-md-3">
		<label for="gender"><b>Gender:</b></label><br>
			<input type="radio" value="Male" name="gender" {{ $user->gender == 'Male' ? 'checked' : '' }}> Male
		<input type="radio" value="Female" name="gender" {{ $user->gender == 'Female' ? 'checked' : '' }}> Female
	</div>
	<div class="col-md-4">
		<label for="marital_status"><b>Marital Status:</b></label><br>
			<input type="radio" value="Single" name="marital_status" {{ $user->marital_status == 'Single' ? 'checked' : '' }}> Single
				<input type="radio" value="Married" name="marital_status" {{ $user->marital_status == 'Married' ? 'checked' : '' }}> Married
				<input type="radio" value="Separated" name="marital_status" {{ $user->marital_status == 'Separated' ? 'checked' : '' }}> Separated
			<input type="radio" value="Widow" name="marital_status" {{ $user->marital_status == 'Widow' ? 'checked' : '' }}> Widow
		</div>
	</div>
	
	<hr>
	<b>Spouse Name (Maiden, Applicable only for married)</b>
	<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label for="spouse_firstname"><b>Firstname</b></label>
				<input type="text" name="spouse_firstname" value="{{ $user->spouse_firstname }}" class="form-control">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="spouse_lastname"><b>Lastname</b></label>
				<input type="text" name="spouse_lastname" value="{{ $user->spouse_lastname }}" class="form-control">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="spouse_middlename"><b>Middlename</b></label>
				<input type="text" name="spouse_middlename" value="{{ $user->spouse_middlename }}" class="form-control">
			</div>
		</div>
	</div>
	
	<hr>

	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label for="age"><b>Age:</b></label><br>
			<input type="number" name="age" value="{{ $user->age }}" class="form-control">
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('birthmonth') ? ' has-error' : '' }}">
            <label for="birthmonth"><b>Date of Birth:</b></label>                          
				<select name="birthmonth" class="form-control">
					<option value="{{ $user->birthmonth }}">{{ $user->birthmonth }}</option>
						<option value=""></option>
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
	    </div>
    </div>

	<div class="col-md-3">
		<div class="form-group">
			<label for="birthday"><b>Day:</b></label><br>
			<input type="number" name="birthday" value="{{ $user->birthday }}" class="form-control">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="birthyear"><b>Birthyear:</b></label><br>
				<input type="number" name="birthyear" value="{{ $user->birthyear }}" class="form-control">
			</div>
		</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label for="height"><b>Height:</b>(Ft. and Inches)</label><br>
			<input type="text" name="height" value="{{ $user->height }}" class="form-control">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="weight"><b>Weight:</b>(Kilograms)</label><br>
			<input type="number" name="weight" value="{{ $user->weight }}" class="form-control">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="citizenship"><b>Citizenship:</b></label><br>
			<input type="text" name="citizenship" value="Filiino" class="form-control">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="religion"><b>Religion:</b></label><br>
				<select name="religion" class="form-control">
				<option value="{{ $user->religion }}">{{ $user->religion }}</option>
					<option value="Christian">Christian</option>
					<option value="Roman Catholic">Roman Catholic</option>
					<option value="Islam">Islam</option>
					<option value="Budhism">Budhism</option>
				</select>
			</div>
		</div>
	</div>
	
	<hr>
	<i class="ion-ios-bookmarks-outline" style="color: #003171;"></i> <b>Contacts</b>
	
	<div class="row">
		<div class="col-md-3">
			<label for="tel_no"><b>Telephone No.</b> (Home)</label><br>
		<input type="text" name="tel_no" value="{{ $user->tel_no }}" class="form-control">
	</div>	
	<div class="col-md-3">
		<label for="mobile_no"><b>Mobile No.</b></label><br>
			<input type="text" name="mobile_no" value="{{ $user->mobile_no }}" class="form-control">
		</div>	
	</div>
	
	<hr>
	<i class="ion-ios-bookmarks-outline" style="color: #003171;"></i><b> Address</b>
	<div class="row">
		<div class="col-md-6">
			<label for="street"><b>Street and Bldg.No.</b></label><br>
		<input type="text" name="street" value="{{ $user->street }}" class="form-control">
	</div>	
	<div class="col-md-3">
		<label for="village"><b>Village (Barangay)</b>:</label><br>
			<input type="text" name="village" value="{{ $user->village }}" class="form-control">
	</div>	
	<div class="col-md-3">
		<div class="form-group">
			<label for="city"><b>City / Municipality</b>:</label><br>
			<input type="text" name="city" value="{{ $user->city }}" class="form-control">
		</div>	
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label for="province"><b>Province</b>:</label><br>
				<select name="province" class="form-control">
					<option value="{{ $user->province }}">{{ $user->province }}</option>
						<option name="ref_province" value="Abra">Abra</option>
							<option name="ref_province" value="Agusan Del Norte">Agusan Del Norte</option>
								<option name="province" value="Agusan Del Sur">Agusan Del Sur</option>
								<option name="province" value="Aklan">Aklan</option>
								<option name="province" value="Albay">Albay</option>
								<option name="province" value="Antique">Antique</option>
								<option name="province" value="Apayao">Apayao</option>
								<option name="province" value="Aurora">Aurora</option>
								<option name="province" value="Basilan">Basilan</option>
								<option name="province" value="Bataan">Bataan</option>
								<option name="province" value="Batanes">Batanes</option>
								<option name="province" value="Batangas">Batangas</option>
								<option name="province" value="Benguet">Benguet</option>
								<option name="province" value="Biliran">Biliran</option>
								<option name="province" value="Bohol">Bohol</option>
								<option name="province" value="Bukidnon">Bukidnon</option>
								<option name="province" value="Bulacan">Bulacan</option>
								<option name="province" value="Cagayan">Cagayan</option>
								<option name="province" value="Camarines Norte">Camarines Norte</option>
								<option name="province" value="Camarines Sur">Camarines Sur</option>
								<option name="province" value="Camiguin">Camiguin</option>
								<option name="province" value="Capiz">Capiz</option>
								<option name="province" value="Catanduanes">Catanduanes</option>
								<option name="province" value="Cavite">Cavite</option>
								<option name="province" value="Cebu">Cebu</option>
								<option name="province" value="Aurora">Aurora</option>
								<option name="province" value="Basilan">Basilan</option>
								<option name="province" value="Compostela Valley">Compostela Valley</option>
								<option name="province" value="Cotabato">Cotabato</option>
								<option name="province" value="Davao Del Norte">Davao Del Norte</option>
								<option name="province" value="Davao Del Sur">Davao Del Sur</option>
								<option name="province" value="Davao Occidental">Davao Occidental</option>
								<option name="province" value="Davao Oriental">Davao Oriental</option>
								<option name="province" value="Dinagat Islands">Dinagat Island</option>
								<option name="province" value="Eastern Samar">Eastern Samar</option>
								<option name="province" value="Guimaras">Guimaras</option>
								<option name="province" value="Ifugao">Ifugao</option>
								<option name="province" value="Ilocos Norte">Ilocos Norte</option>
								<option name="province" value="ILOCOS SUR">ILOCOS SUR</option>
								<option name="province" value="ILOILO">ILOILO</option>
								<option name="province" value="ISABELA">ISABELA</option>
								<option name="province" value="KALINGA">KALINGA</option>
								<option name="province" value="LA UNION">LA UNION</option>
								<option name="province" value="LAGUNA">LAGUNA</option>
								<option name="province" value="LANAO DEL NORTE">LANAO DEL NORTE</option>
								<option name="province" value="LANAO DEL SUR">LANAO DEL SUR</option>
								<option name="province" value="LEYTE">LEYTE</option>
								<option name="province" value="ALBAY">ALBAY</option>
								<option name="province" value="MAGUINDANAO">MAGUINDANAO</option>
								<option name="province" value="MARINDUQUE">MARINDUQUE</option>
								<option name="province" value="MASBATE">MASBATE</option>
								<option name="province" value="MISAMIS OCCIDENTAL">MISAMIS OCCIDENTAL</option>
								<option name="province" value="MISAMIS ORIENTAL">MISAMIS ORIENTAL</option>
								<option name="province" value="MOUNTAIN PROVINCE">MOUNTAIN PROVINCE</option>
								<option name="province" value="NEGROS OCCIDENTAL">NEGROS OCCIDENTAL</option>
								<option name="province" value="NEGROS ORIENTAL">NEGROS ORIENTAL</option>
								<option name="province" value="NORTHERN SAMAR">NORTHERN SAMAR</option>
								<option name="province" value="NUEVA ECIJA">NUEVA ECIJA</option>
								<option name="province" value="NUEVA VIZCAYA">NUEVA VIZCAYA</option>
								<option name="province" value="OCCIDENTAL MINDORO">OCCIDENTAL MINDORO</option>
								<option name="province" value="ORIENTAL MINDORO">ORIENTAL MINDORO</option>
								<option name="province" value="PALAWAN">PALAWAN</option>
								<option name="province" value="PAMPANGA">PAMPANGA</option>
								<option name="province" value="PANGASINAN">PANGASINAN</option>
								<option name="province" value="QUEZON">QUEZON</option>
								<option name="province" value="QUIRINO">QUIRINO</option>
								<option name="province" value="RIZAL">RIZAL</option>
								<option name="province" value="ROMBLON">ROMBLON</option>
								<option name="province" value="SAMAR">SAMAR</option>
								<option name="province" value="SARANGANI">SARANGANI</option>
								<option name="province" value="SIQUIJOR">SIQUIJOR</option>
								<option name="province" value="SORSOGON">SORSOGON</option>
								<option name="province" value="SOUTH COTABATO">SOUTH COTABATO</option>
								<option name="province" value="SOUTHERN LEYTE">SOUTHERN LEYTE</option>
								<option name="province" value="SULTAN KUDARAT">SULTAN KUDARAT</option>
								<option name="province" value="SULO">SULO</option>
								<option name="province" value="SURIGAO DEL NORTE">SURIGAO DEL NORTE</option>
								<option name="province" value="SURIGAO DEL SUR">SURIGAO DEL SUR</option>
								<option name="province" value="TARLAC">TARLAC</option>
								<option name="province" value="TAWI-TAWI">TAWI-TAWI</option>
								<option name="province" value="ZAMBALES">ZAMBALES</option>
							<option name="province" value="Zamboanga Del Norte">Zamboanga Del Norte</option>
						<option name="province" value="Zamboanga Del Sur">Zamboanga Del Sur</option>
					<option name="province" value="Metro Manila">Metro Manila</option>
				<option name="province" value="NCR">NCR</option>
			</select>
		</div>	
	</div>	
	
	<div class="col-md-3">
		<div class="form-group">
			<label for="place_of_birth"><b>Place of Birth:</b></label><br>
				<input type="text" name="place_of_birth" value="{{ $user->place_of_birth }}" class="form-control">
			</div>
		</div>
	</div>
	<hr>
	
	<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label for="career_motto"><b>Career Goals:</b></label><br>
				<input type="text" name="career_motto" value="{{ $user->career_motto }}" class="form-control">
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<input type="submit" value="Save" class="btn btn-success pull-right">
				</div>	
					<div>
			</div>
		</section>
	@extends('layouts.footer')
	</body>
</html>