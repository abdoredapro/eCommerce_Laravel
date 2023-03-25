@extends('frontend.master')
@section('content')
<style>
    .card {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-orient: vertical;
     -webkit-box-direction: normal;
     -ms-flex-direction: column;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(0, 0, 0, 0.1);
     border-radius: 0.10rem
 }

 .card-header:first-child {
     border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
 }

 .card-header {
     padding: 0.75rem 1.25rem;
     margin-bottom: 0;
     background-color: #fff;
     border-bottom: 1px solid rgba(0, 0, 0, 0.1)
 }

 .track {
     position: relative;
     background-color: #ddd;
     height: 7px;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     margin-bottom: 60px;
     margin-top: 50px
 }

 .track .step {
     -webkit-box-flex: 1;
     -ms-flex-positive: 1;
     flex-grow: 1;
     width: 25%;
     margin-top: -18px;
     text-align: center;
     position: relative
 }

 .track .step.active:before {
     background: #3498db
 }

 .track .step::before {
     height: 7px;
     position: absolute;
     content: "";
     width: 100%;
     left: 0;
     top: 18px
 }

 .track .step.active .icon {
     background: #3498db;
     color: #fff
 }

 .track .icon {
     display: inline-block;
     width: 40px;
     height: 40px;
     line-height: 40px;
     position: relative;
     border-radius: 100%;
     background: #ddd
 }

 .track .step.active .text {
     font-weight: 400;
     color: #000
 }

 .track .text {
     display: block;
     margin-top: 7px
 }

 .itemside {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     width: 100%
 }

 .itemside .aside {
     position: relative;
     -ms-flex-negative: 0;
     flex-shrink: 0
 }

 .img-sm {
     width: 80px;
     height: 80px;
     padding: 7px
 }

 ul.row,
 ul.row-sm {
     list-style: none;
     padding: 0
 }

 .itemside .info {
     padding-left: 15px;
     padding-right: 7px
 }

 .itemside .title {
     display: block;
     margin-bottom: 5px;
     color: #212529
 }

 p {
     margin-top: 0;
     margin-bottom: 1rem
 }

 .btn-test {
     color: #ffffff;
     background-color: #3498db;
     border-color: #3498db;
     border-radius: 1px;
     margin: 0 0 10px 10px
 }

 .btn-test:hover {
     color: #ffffff;
     background-color: #3498db;
     border-color: #3498db;
     border-radius: 1px
 }

 .btn-test:active {
    background-color: #3498db !important;
    color: #ffffff;
 }


</style>
<div class="body-content" style="padding:40px 0">
    <div class="container">
        <article class="card">
            <header class="card-header"> My Orders / Tracking </header>
            <div class="card-body">

                @php
                    $level = array('Pending', 'confirmed', 'processing', 'picked', 'shipped', 'delivered');
                    // echo $order->status;
                @endphp


                <div class="track">

                    @if ($order->status == 'Pending')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order confirmed</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Ready for pickup</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">shipped</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">delivered</span> </div>
                    @endif


                    @if ($order->status == $level[1])
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order confirmed</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Ready for pickup</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">shipped</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">delivered</span> </div>
                    @endif

                    @if ($order->status == $level[2])
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Ready for pickup</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">shipped</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">delivered</span> </div>
                    @endif

                    @if ($order->status == $level[3])
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Ready for pickup</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">shipped</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">delivered</span> </div>
                    @endif

                    @if ($order->status == $level[4])
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Ready for pickup</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">shipped</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">delivered</span> </div>
                    @endif

                    @if ($order->status == $level[5])
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pending</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Ready for pickup</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">shipped</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">delivered</span> </div>
                    @endif 
                    
                    

                 
                </div>

          
                
                <hr>
                <a href="{{ route('my.order') }}" class="btn btn-test" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
            </div>
        </article>
    </div>
</div>
@endsection