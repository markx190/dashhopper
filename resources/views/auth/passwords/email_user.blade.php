@include('fil_views.layouts.fil_header')
<section id="about" >
	<div class="container">
		<br>
			<header class="section-header">
        <h2 style="text-align: center; font-size: 22px;">Reset Password</h2>
	</header>

<form class="form-horizontal" method="POST" action="{{ route('password.email_reset') }}">
<div class="row">
@if (session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
@endif
</div>
{{ csrf_field() }}

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <div class="row">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>  
</div>
<div class="row">
    <div class="col-md-6">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Send Password Reset Link
                    </button>
                    <h3 style="height: 320px;"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </form>
</section>
@extends('fil_views.layouts.fil_footer')