@if (Session::has('success'))
	
	<div class="alert alert-success" role="alert alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>

@endif