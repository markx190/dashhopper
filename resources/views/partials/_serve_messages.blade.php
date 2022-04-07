@if (Session::has('serve_success'))
	
	<div class="alert alert-success" role="alert">
		<strong>Success:</strong> {{ Session::get('serve_success') }} and you will received some notification once the host accepted your offer.
	</div>

@endif