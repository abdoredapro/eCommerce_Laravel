@extends('frontend.master')
@section('title')
    Checkout
@endsection
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->

    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login -->			
				<div class="col-md-6 col-sm-6 already-registered-login">
					<form class="register-form" action="{{ route('checkout.store') }}" method="POST">
						@csrf
						


						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Shipping Name<span>*</span></label>
					    <input type="text" name="shippin_name"  value="{{Auth::user()->name}}" class="form-control unicase-form-control text-input"  placeholder="Name" required>
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Email Address <span>*</span></label>
					    <input type="email" name="shipping_email" value="{{Auth::user()->email}}" class="form-control unicase-form-control text-input" required placeholder="Email Address">
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Phone<span>*</span></label>
					    <input type="text" name="shipping_phone" value="{{Auth::user()->phone}}" class="form-control unicase-form-control text-input" required placeholder="Phone">
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Zip Code<span>*</span></label>
					    <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputPassword1" required placeholder="Zip code">
					  </div>


				</div>	
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">

					<div class="form-group">
						<h5>Division Select<span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="division_id" class="form-control" required>
								<option value="" disabled selected>Select Your Division</option>
								
								@foreach ($division as $item)
									<option value="{{ $item -> id }}" >{{ $item ->division_name }}</option>
								@endforeach
							
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<h5>District Select<span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="district_id" class="form-control" required>
								<option value="" disabled selected>Select Your District</option>
								
								
							</select>
						</div>
					</div>

					<div class="form-group">
						<h5>State Select<span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="state_id" class="form-control" >
								<option value="" disabled selected>Select Your State</option>
								
								
							</select>
						</div>
					</div>

					<div class="form-group">
						<h5>Add Note<span class="text-danger">*</span></h5>
						<div class="controls">
							<textarea name="note" na placeholder="Note" class='form-control' cols="30" rows="5"></textarea>
						</div>
						
					</div>

					
					 

				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->


		

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					    
					  	
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">

                    @foreach ($cartItem as $item)
                    <li>
                        <img src="{{asset('upload/product/'.$item->options->img)}}" style="width:70px;">
                        <span>{{ $item->name }}</span>
                        <div>
                            
                        <strong>Item Price</strong>
                            <strong class="text-danger"> ${{ $item->price }}</strong>
                        </div>
                    </li>
                    @endforeach

                    @if (Session::has('coupon'))
                                <strong>SubTotal : ${{ $totalAmount }}</strong>
                                <div>Total : ${{ session()->get('coupon')['total_amount'] }}</div>
                                
                            @else
                            <strong>SubTotal : ${{ $totalAmount }}</strong>
                            @endif


				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>

<div class="col-md-4">
	<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
<div class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="unicase-checkout-title">Select Payment Method</h4>
</div>
	<div class="row">
		<div class="col-md-6 col-xs-6">
			<img src="{{ asset('upload/4.png') }}" alt="">
			<div>
				<input type="radio" id="creadit" name="payment_method" value="card">
				<label for="creadit">Credit Card</label>
			</div>
		</div>
		<div class="col-md-6 col-xs-6">
			<img src="{{ asset('upload/cash.jpg') }}"  style="width: 46px;height:28px">
			<div>
				<input type="radio" id="cash" name="payment_method" value="cash">
				<label for="cash">Cash on Delivery</label>
			</div>
			
		</div>
		@error('payment_method')
				<span class="text-danger">{{ $message }}</span>
		@enderror
	</div>
</div>
</div>
</div> 
<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Pay Now</button>
<!-- checkout-progress-sidebar -->				</div>
</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
	

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->



@endsection


