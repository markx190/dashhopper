<div id="affi-exp" class="container">
	<header class="section-header">
        <h2 style="text-align: center; font-size: 22px;">Affiliation and Experience<br>
        <br>
    <img src="/uploads/avatars/{{ $userData->avatar }}" style="width:145px; height:138px; image-align:center; border-radius:50%"></h2>
</header>
<hr>
<form id="exp-form">
<div class="row">
	<div class="col-md-3">
		<label for="Affiliaiton">Affiliation:</label>
	        <input id="spock_id_no" type="hidden" class="form-control" name="spock_id_no" value="{{ $userData->spock_id_no }}">
	    <input id="exp_id_no" type="hidden" class="form-control" name="exp_id_no" value="{{ $userData->user_id_no }}">
	<input id="affil" type="text" class="form-control" name="affiliation">
</div>
<div class="col-md-3">
    <label for="job_title">Job Title:</label>                          
        <input id="job_title" type="text" class="form-control" name="job_title">
</div>
<div class="col-md-3">
    <label for="year_from">Year From:</label>                          
        <input id="year_from" type="number" class="form-control" name="year_from">
</div>
<div class="col-md-3">
    <label for="year_to">Year To:</label>                          
		<input id="year_to" type="number" class="form-control" name="year_to">
</div>
<div class="col-md-3">
    <label for="company_name">Company Name:</label>                          
		<input id="company_name" type="text" class="form-control" name="company_name">
</div>
<div class="col-md-3">
    <label for="product_handled">Product Handled:</label>                          
		<input id="product_handled" type="text" class="form-control" name="product_handled">
</div>
<div class="col-md-3">
    <label for="product_category">Product Category:</label>                          
		<input id="product_category" type="text" class="form-control" name="product_category">
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-secondary pull-right" id="submit-button" onclick="submitExperience(event)">Submit</button>                      
	        </div>
        </div>
    </form>
<hr>
<br />
<section id="expList">
    <div id="show-list-exp" class="row-md-12 exp-margin_Top">
        </div>
    </section>
</div>



