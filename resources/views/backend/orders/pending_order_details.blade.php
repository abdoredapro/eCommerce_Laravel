@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        
        <div class="col-md-6 col-12">
            <div class="box box-bordered border-primary">
              <div class="box-header with-border">
                <h4 class="box-title"><strong>Shipping</strong> Details</h4>
              </div>
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
          </div>


          <div class="col-md-6 col-12">
            <div class="box box-bordered border-primary">
              <div class="box-header with-border">
                <h4 class="box-title"><strong>Order</strong> Details 
                    <span class="text-danger">#{{ $order->invoice_no }}</span>
                </h4>
              </div>
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
                    <th>status:</th>
                    <th>
                      <span class="badge badge-pill badge-primary">{{ $order->status}}</span>
                    </th>
                  </tr>

                  {{-- <tr>
                    <th></th>
                    @if ($order->status == 'Pending')
                      
                      <th>
                        <a href="" class="btn btn-success">Confirm</a>
                      </th>
                    @endif
                  </tr> --}}
                  
                </tbody>
                
              </table>


              @if ($order->status == 'Pending')
              <a href="{{ route('confirm.order',$order->id) }}" id="confirm" style="margin-bottom: 10px" class="d-block btn btn-success">Confirm Order</a>
            
              @elseif ($order->status == 'confirmed')
              
                <a href="{{ route('make.process',$order->id) }}" id="confirm" style="margin-bottom: 10px" class="d-block btn btn-primary">Processing Order</a>
              
                @elseif ($order->status == 'processing')
                <a href="{{ route('make.picked',$order->id) }}" id="confirm" style="margin-bottom: 10px" class="d-block btn btn-primary">Picked Order</a>
                @elseif ($order->status == 'picked')
                <a href="{{ route('make.shipped',$order->id) }}" id="confirm" style="margin-bottom: 10px" class="d-block btn btn-primary">Shipped Order</a>
                @elseif ($order->status == 'shipped')
                <a href="{{ route('make.delivered',$order->id) }}" id="confirm" style="margin-bottom: 10px" class="d-block btn btn-primary">Delivered Order</a>
              @endif
      
              
            </div>
          </div>

          {{-- start product  --}}
          <div class="col-md-12 col-12">
            <div class="box box-bordered border-primary">
              <div class="box-header with-border">
                <h4 class="box-title"><strong>All </strong>Products</h4>
              </div>
              <table class="table" >
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
                        <td>{{ $item->Product->product_name_en }}</td>
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
          {{-- end product  --}}


    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

@endsection

@section('script')
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
@endsection