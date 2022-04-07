@extends('layouts.admin_app')
	@section('content')
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">Tasks</div>
					<div class="panel-body">
					
					@include('partials._messages')
					@include('partials._messages_updated')
						<form action="/search_list" method="POST" role="search">
						{{ csrf_field() }}
						<div class="input-group">
						<input type="text" class="form-control" name="q"
						placeholder="Search Task"> <span class="input-group-btn">
						<button type="submit" class="btn btn-default">
						<span class="fa fa-btn fa-search"></span>
						</button>
					</span>
				</div>
			</form>
			<br>
			
			@if(isset($details))
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Title</th>
							<th>Description</th>
							<th>Host</th>
							<th>Posted Since</th>
							<th>Details</th>
							<th>Delete</th>
						</tr>
					</thead>
				<tbody>
                @foreach($details as $sparejob)
						<tr>
							<td>{{ $sparejob->title }}</td>
							<td>{{ $sparejob->content }}</td>
							<td>{{ $sparejob->tasker_name }}</td>
							<td>{{ $sparejob->created_at->diffForHumans() }}</td>
							<td><a href="/sparejobs/{{ $sparejob->id }}"> <i class="fa fa-btn fa-file"></i></a>&nbsp; | &nbsp;<a href="/sparejobs/{{ $sparejob->id }}/edit"> <i class="fa fa-btn fa-pencil"></i>
						    </a> &nbsp;|
							</td>
							<td><button class="btn btn-xs btn-danger" data-id="{{ $sparejob->id }}" data-toggle="modal" data-target="#jobdelete">Delete</button></td>
						
						</td>
					</tr>
				@endforeach
				</tbody>
				</table>
				{!! $details->render() !!}
				@elseif(isset($message))
				<p>{{ $message }}</p>
				@endif
			<h5><a href="{{ url('/manage_sparejobs') }}"> More Posts </a></h5>
		</div>	
	</section>		
	
	<div class="modal modal-danger fade" id="jobdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="MymodalLabel">Delete Confirmation</h4>
						</div>
					
						<form action="/manage_sparejobs/{{ $sparejob->id }}" method="post">
						{{ method_field('DELETE') }}
						{{ csrf_field() }}
						<div class="modal-body">
						<p class="text-center">Are you sure you want to delete the task?</p>
						<input type="hidden" name="id" id="id" value="{{ $sparejob->id }}">
						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-primary">Yes Delete</button>
				</div>
			</form>
		</div>
	</div>		

	
@endsection