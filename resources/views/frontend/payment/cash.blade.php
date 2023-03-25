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
				<li class='active'>Cash</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">

				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">


                    @if (Session::has('coupon'))
                                <strong>SubTotal : ${{ $cardTotal }}</strong>
                                <div>Total : ${{ session()->get('coupon')['total_amount'] }}</div>
                                
                            @else
                            <strong>SubTotal : ${{ $cardTotal }}</strong>
                            @endif


				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>

<div class="col-md-6">
	<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
<div class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="unicase-checkout-title">Payment Method</h4>
</div>


        <form action="{{ route('cash.store') }}" method="POST" >
            @csrf

            {{-- start information send  --}}
            <input type="hidden" name="name" value="{{ $data['shippin_name'] }}">
            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
            <input type="hidden" name="notes" value="{{ $data['note'] }}">
            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
			{{-- end information send  --}}

            <img src="{{ asset('upload/cash.jpg') }}"  style="width: 160px;">


        <br>
        <button class="btn btn-primary">Submit Payment</button>
        </form>

</div>

</div>
</div> 

<!-- checkout-progress-sidebar -->				</div>
</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->




@endsection


