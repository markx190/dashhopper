@extends('layouts.app')
@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">Your Sparetimer is </a> {{ $user->firstname }} {{ $user->lastname }} </div>
			<div class="panel-body">
				<img src="/uploads/avatars/{{ $user->avatar }}" style="width: 150px; height: 150px; float-left; border-radius:50%; margin-right: 25px;"><br /><br />
					Special Skills: {{ $user->special_skills }} <br>
					Home Address: {{ $user->Home_address }} <br>
					Phone Number: {{ $user->phone_number }} <br>
					<hr></hr>
						Validated National ID Presented
					<div class="panel-body">
						<img src="/uploads/credentials/{{ $user->national_id }}" style="width: 150px; height: 150px; float-left; margin-right: 25px;">
                    </div>
					Member Since: {{ date('F d, Y', strtotime($user->created_at)) }} at {{ date('g:ia', strtotime($user->created_at)) }}<br>
					<hr></hr>
					<div class="panel-body">
				</div>
            </div>
        </div>
    </div>
</div>
@endsection