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
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->order_date }}</th>
                            <td>${{ $order->amount }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->invoice_no }}</td>
                            <td>
                                @if ($order ->status == 'Pending')
                                    <span style="background: #fdcb6e" class="badge badge-pill" >Pending</span>
                                @elseif($order ->status == 'confirmed')
                                <span style="background: #00b894" class="badge badge-pill" >Confirm</span>
                                @elseif($order ->status == 'processing')
                                <span style="background: #2d3436" class="badge badge-pill" >Processing</span>
                                @elseif($order ->status == 'picked')
                                <span style="background: #6c5ce7" class="badge badge-pill" >Picked</span>
                                @elseif($order ->status == 'shipped')
                                <span style="background: #e17055" class="badge badge-pill" >Shipped</span>
                                @elseif($order ->status == 'delivered')
                                @if ($order->return_order == 2)
                                @else
                                <span style="background: #3498db" class="badge badge-pill" >Delivered</span>
                                @endif
                                
                                @elseif($order ->status == 'cancel')
                                <span style="background: #e74c3c" class="badge badge-pill" >Canceld</span>
                                @endif

                              @if ($order->return_order == 1)
                              <span style="background: #d63031" class="badge badge-pill" >Return Requested</span>
                              @endif
                              @if ($order->return_order == 2)
                              <span style="background: #2ed573" class="badge badge-pill" >Returned</span>
                              @endif
                              </td>
                            <td>
                                <a href="{{ route('order.view',$order->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>
                                <a href="{{ route('invoice.download',$order->id) }}" target="_blank" class="btn btn-sm btn-danger">
                                    <i class="fa fa-download"></i> invoice</a>

                                    <a href="{{ route('order.track',$order->id) }}" class="btn btn-sm btn-primary"><i class="icon fa fa-check"></i> Track</a>
                            </td>
                        </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
            </div>

            
            
        </div>
    </div>
</div>
@endsection