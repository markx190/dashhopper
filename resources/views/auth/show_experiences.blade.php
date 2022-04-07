<div class="row">
    <div class="col-md-3">
        <label><b>List of Experiences</b></label>
    </div>
</div>
@foreach($experiences as $exp)
<div class="row">
	<div class="col-md-2">
		<label for="Affiliaiton">{{ $exp->job_title }}</label>
</div>
<div class="col-md-3">
    <label for="job_title">{{ $exp->company_name }}</label>                                
</div>
<div class="col-md-2">
    <label for="year_from">{{ $exp->year_from }} - {{ $exp->year_to }}</label>                          
</div>
<div class="col-md-3">
    <label for="year_to">{{ $exp->product_handled }}</label>                          
</div>
<div class="col-md-2">
    <label for="delete">
        <button type="button" id="editButton" class="btn btn-primary fa fa-pencil" exp-id="{{ $exp->job_title }}" onclick="editExp(event)"></button>
            <!-- <input id="expId" type="hidden" value="{{ $exp->job_title }}"> -->
            <button class="btn btn-danger fa fa-trash"></button>
        </label>                          
    </div>
</div>
<hr>
@endforeach
    


