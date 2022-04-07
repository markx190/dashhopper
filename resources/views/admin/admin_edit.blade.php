@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Post</div>
					<div class="panel-body">
					<form action="/delete_sparejobs/{{ $sparejob->id }}" method="post">
						{{ method_field('PUT') }}
						{{ csrf_field() }}
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
						<div class="form-group">
							<label for="title">Title</label>
						<input type="text" name="title" value="{{ $sparejob->title }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="content">Task Description</label>
						<textarea name="content" class="form-control">{{ $sparejob->content }}</textarea>
						</div>
						<div class="form-group">
							<label for="post_location">Location</label>
						<input type="text" name="post_location" value="{{ $sparejob->post_location }}" class="form-control">
						</div>
						<hr></hr>
						<div class="form-group">
							<label for="post_status">Post Status</label>
						<select name="post_status" class="form-control">
				<option value="">{{ $sparejob->post_status }}</option>
				<option value=""></option>
				<option value="Suspended">Supended</option>
			<option value="Pending">Pending</option>
			<option value="Validated">Validated</option>
		</select>
						</div>
						<hr></hr>
							<input type="submit" class="btn btn-success pull-right">
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection