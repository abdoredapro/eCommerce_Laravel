@extends('frontend.master')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Register</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page" style="margin-bottom: 34px;">
			<div class="row">


<!-- create a new account -->
	<div class="col-md-6 col-sm-6 create-new-account">
		<h4 class="checkout-subtitle">Create a new account</h4>
		<p class="text title-tag-line">Create your new account.</p>
		<form method="POST" action="{{ route('register') }}">
			@csrf
			<div class="form-group">
				<label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
				<input type="text" id="name" name='name' class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
				@error('name')
					<span class="invalid-feedback">
						{{ $message }}
					</span>
				@enderror
			</div>

			<div class="form-group">
				<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
				<input type="email" id="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" >
				@error('email')
					<span class="invalid-feedback">
						{{ $message }}
					</span>
				@enderror
			</div>
			
			<div class="form-group">
				<label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
				<input type="text" name="phone" id='phone' class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
				@error('phone')
					<span class="invalid-feedback">
						{{ $message }}
					</span>
				@enderror
			</div>
			<div class="form-group">
				<label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
				<input type="password" id="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
				@error('password')
					<span class="invalid-feedback">
						{{ $message }}
					</span>
				@enderror
			</div>
			<div class="form-group">
				<label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
				<input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
				@error('password_confirmation')
					<span class="invalid-feedback">
						{{ $message }}
					</span>
				@enderror
			</div>
			<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
			<a href="{{ url('/login') }}" class="forgot-password pull-right">Do you have account? login</a>		
		</form>
		
		
	</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection