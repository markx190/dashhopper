@extends('layouts.admin_app')

@section('content')

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">{{ $user->firstname }} {{ $user->lastname }}'s Profile</div>
			<div class="panel-body">
					
					@if(count($errors) > 0)
						<ul>
							@foreach($errors->all() as $error)
							<li class="alert alert-danger">{{ $error }}</li>
						@endforeach
						</ul>
					@endif
					
					<form enctype="multipart/form-data" action="/admin_profile" method="post">
						<div class="form-group">			
							<img src="/uploads/avatars/{{ $user->avatar }}" style="width: 150px; height: 150px; float-left; border-radius:50%; margin-right: 25px;">
						</div>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<hr></hr>
						<div class="form-group">
							<label for="avatar">Upload Profile Image</label>
							<input type="file" name="avatar" class="form-control" size="90">
							<br>
						<div class="form-group">
							<input type="submit" class="btn btn-primary">
							<br>
							<hr></hr>
							<span style="float: left;">Position: {{ $user->job_title }} </span><br>
							<span style="float: left;">Member since: {{ $user->created_at }} </span>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection