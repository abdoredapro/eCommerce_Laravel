@extends('frontend.master')
@section('content')
<div class="body-content" style="padding:40px 0">
    <div class="container">
        <div class="row">
            <div class="col-md-2">

                @include('frontend.common.user_sidebar')

            </div>

            <div class="col-md-10 table-responsive">
                {{-- <h2 class="text-center">My Order</h2> --}}
                <table class="table" style="margin: 10px 0; ">
                    <thead>
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Total</th>
                        <th scope="col">Payment</th>
                        <th scope="col">invoice</th>
                        <th scope="col">Status</th>

                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->order_date }}</th>
                            <td>${{ $order->amount }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->invoice_no }}</td>
                            <td>
                              <span style="background: red" class="badge badge-pill badge-danger">Cancel Requested</span>
                            </td>
                            
                        </tr>
                        @empty
                        <tr>
                          <td>You Don't Have Canceld Product .</td>
                        </tr>
                      @endforelse
                      
                    </tbody>
                  </table>
            </div>

            
            
        </div>
    </div>
</div>
@endsection