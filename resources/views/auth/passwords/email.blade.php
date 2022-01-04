@extends('layouts.frontend-master')

@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Forget Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->
<div class="col-md-8 col-sm-8 sign-in">
	<h4 class="">Forget Password</h4>

	<form class="register-form outer-top-xs" role="form" action="{{ route('login') }}" method="POST">
        @csrf
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="email" value="{{ old('email') }}" placeholder="Enter Email Address">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __('Send Password Reset Link') }}</button>
          <a href="{{route('login') }}" class="forgot-password pull-right">Return To Login?</a>
	</form>
</div>
<!-- Sign-in -->
		</div><!-- /.row -->

		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.inc.brand')
@endsection
