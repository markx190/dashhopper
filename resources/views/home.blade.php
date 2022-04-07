@extends('layouts.master')

@section('title')
	SpareTime
@endsection
@section('label')
	SpareTime
@endsection

@section('search_task')
<form action="/search" method="POST" role="search">
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
	</div>

	<section id="team" class="wow fadeInUp">
	<div class="section-header">
		<div class="row">
	@if(isset($details))
    @forelse($details as $sparejob)
	<div class="col-lg-3 col-md-6">
        <div class="member">
			<div class="pic">
				<img src="/uploads/job_avatars/{{ $sparejob->avatar }}" style="width: 400px; height: 150px;">
				</div>
				<div class="details">
				<h6><a href="/servejobs/{{ $sparejob->id }}">{{ $sparejob->title }}</a></h6>
				<h6>$ {{ $sparejob->price }}</h6>
				<h7>{{ $sparejob->created_at->diffForHumans() }}</h7>
			</div>
		</div>
	</div>
    @empty
	@endforelse	
	</div>
	{!! $details->render() !!}
	@elseif(isset($message))
	</div>
	<h7>{{ $message }}</h7>
	@endif
		</div>
	</div>
	@endsection
		
	@section('footer')
	<footer id="footer">
		<div class="container">
			<div class="copyright">
			Copyright  &copy;  <strong>SpareTime </strong>. All Rights Reserved
			</div>
			<div class="credits">
			<!--
			All the links in the footer should remain intact.
			You can delete the links only if you purchased the pro version.
			Licensing information: https://bootstrapmade.com/license/
			Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
			-->       
		</div>
    </div>
</footer>
@endsection