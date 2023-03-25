@extends('frontend.master')
@section('content')
<div class="body-content" style="padding:20px 0">
    <div class="container">
        <div class="row">
            <div class="col-md-2">

                @include('frontend.common.user_sidebar')

            </div>

            <div class="col-md-4 " style="background-color:#cccccc1f">
                <div class="h3 text-danger">Shipping Information</div>
                <table class="table">
       
                    <tbody>
                      <tr>
                        <th >Name :</th>
                        <th >{{ $order->name }}</th>
                      </tr>
                      <tr>
                        <th >Email :</th>
                        <th >{{ $order->email }}</th>
                      </tr>
                      <tr>
                        <th >phone :</th>
                        <th >{{ $order->phone }}</th>
                      </tr>
                      <tr>
                        <th >Division :</th>
                        <th >{{ $order->Division->division_name	 }}</th>
                      </tr>
                      <tr>
                        <th >District :</th>
                        <th >{{ $order->district->district_name }}</th>
                      </tr>
                      <tr>
                        <th >State :</th>
                        <th >{{ $order->state->state_name }}</th>
                      </tr>
                      <tr>
                        <th >Post Code :</th>
                        <th >{{ $order->post_code }}</th>
                      </tr>
                      <tr>
                        <th >Order Date :</th>
                        <th >{{ $order->order_date}}</th>
                      </tr>
        
                    </tbody>
                  </table>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-5" style="background-color:#cccccc1f">
                <div class="h3">Order <span class="text-danger">Invoice : {{ $order->invoice_no }}</span></div>
                <table class="table">
       
                    <tbody>
                      <tr>
                        <th >Payment Type :</th>
                        <th >{{ $order->payment_method }}</th>
                      </tr>
                      <tr>
                        <th >Transaction ID :</th>
                        <th >{{ $order->transaction_id }}</th>
                      </tr>
                      <tr>
                        <th >Invoice :</th>
                        <th >{{ $order->invoice_no }}</th>
                      </tr>
                      <tr>
                        <th >Order Total :</th>
                        <th >${{ $order->amount	}}</th>
                      </tr>
                      
                      <tr>
                        <th >status:</th>
                        <th ><span class="badge badge-pill badge-primary">{{ $order->status}}</span></th>
                      </tr>
        
                    </tbody>
                  </table>
            </div>

            
            
        </div>

        {{-- start item in the order  --}}
        <div class="row">
            <h2 class="text-center">Products</h2>
            <div class="col-md-12 table-responsive">
                <table class="table" style="margin: 10px 0; ">
                    <thead>
                      <tr>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Color</th>
                        <th scope="col">Product Size</th>
                        <th scope="col">Quntity</th>
                        <th scope="col">price</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orderItem as $item)
                        <tr>
                            <th scope="row">
                                <img src="{{ asset('upload/product/'.$item->Product->product_thambnail) }}" style="width: 90px;" >
                            </th>
                            <td>${{ $item->Product->product_name_en }}</td>
                            <td>{{ $item->color }}</td>
                            <td>{{ $item->size }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>${{ $item->price }}</td>
                        </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>

        {{-- end item in the order  --}}

        @if ($order->status == 'delivered')
          @if ($order->return_reason == null)
              
          
            <form action="{{ route('user.return.order',$order->id) }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="return_reason" class="form-label">If you want to return order <span>*</span></label>
                <textarea name="return_reason" class="form-control" id="return_reason" cols="10" rows="5">
                  why you want to return it?
                </textarea>
              </div>
              <button type="submit" class="btn btn-danger">Return order</button>
            </form>
            @else
            <span style="background: red" class="badge badge-pill badge-danger">The Return Request Applied Successfully</span>
            @endif

            
        @endif
    </div>
</div>
@endsection