@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-btn fa-desktop"></i> You are logged in! {{Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
			<div class="panel-body">
            @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
            @endif
			
					@include('partials._messages')
					@include('partials._messages_updated')
			
			<div class="panel-body">
				<div class="row">
					<div class="col-xl-6 col-sm-3 mb-3">
						<div class="card text-white bg-success o-hidden h-100">
						<div class="card-body">
						<div class="card-body-icon">
						<i class="fa fa-fw fa-wrench"></i>
					</div>
				<div class="mr-5" align="center"><p style="font-size: 25px;">You have {{ $sparejobs->count() }} Tasks</p></div>
			</div>
            <a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-right"> View Details</span>
					<span class="float-right">
						<i class="fa fa-angle-right"></i>
						</span>
						</a>
						</div>
					</div>
				</div>
			</div>
			
			@forelse($sparejobs as $sparejob)
			<div class="col-md-3 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span>{{ $sparejob->title }}</span>
								</div>
					<div class="panel-body">
						<img src="/uploads/job_avatars/{{ $sparejob->avatar }}" style="width: 220px; height: 150px; float-left; margin-right: 25px;">
                    </div>
					<div class="panel-body">			
							<!--{{ $sparejob->ShortContent }}-->
							{{ $sparejob->Category }}
					<span class="pull-left">
							{{ $sparejob->created_at->diffForHumans() }}
					</span>
							<!--<a href="/sparejobs/{{ $sparejob->id }}">{{ $sparejob->count() }}</a>-->
						</div>	
					
					<div class="panel-footer clearfix">
					<a href="/sparejobs/{{ $sparejob->id }}/edit"><i class="fa fa-btn fa-clone pull-right"></i> </a>
							@if($sparejob->user_id == Auth::id())
								<form action="/sparejobs/{{ $sparejob->id }}" method="POST" class="pull-right" style="margin-left: 25px;">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
								<!--<button class="btn-btn-danger">Delete</button>-->
								&nbsp;<input type="button" class="btn btn-xs btn-danger pull-right" data-id="{{ $sparejob->id }}" data-toggle="modal" data-target="#jobdelete" value="Delete">
						</div>
					</div>
				@endif
			<!--<i class="fa fa-file pull-right"></i>-->
		</div>
        @empty 
		No Jobs Found
		@endforelse
		<div class="form-group">	
			<div class="row">
			
				<div class="col-md4 col-md-offset-4">
		</div>
		<div class="modal modal-danger fade" id="jobdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="MymodalLabel">Delete Confirmation</h4>
						</div>
					
						<form action="/sparejobs/{{ $sparejob->id }}" method="post">
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