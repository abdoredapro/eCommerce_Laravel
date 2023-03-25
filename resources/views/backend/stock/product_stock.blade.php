@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        
        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Manage Product</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name En</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Discount</th>
                                <th>Status</th>
                               
                            </tr>
                        </thead>
                        <tbody>

                    @foreach ($allProduct as $product)
                    <tr>
                        <td><img src="{{ asset('upload/product/'.$product->product_thambnail) }}" style="width:100px;height:90px"></td>
                        <td>{{ $product ->product_name_en }}</td>
                        <td>${{ $product ->selling_price }} </td>
                        <td>{{ $product ->product_amount }} Pic</td>
                        <td>
                            @if ($product ->discount_price !== null)
                                @php
                                    $discount = $product ->selling_price - $product ->discount_price;
                                    $percentage  = ($discount /$product ->selling_price ) * 100;
                                    
                                @endphp
                                <span class="badge badge-pill bg-primary">{{ round($percentage) }}%</span>
                            @else
                            <span class="badge badge-pill bg-danger">No Discount</span>
                            @endif
                        </td>
                        <td>
                            
                            @if ($product ->status == 1)
                            <span class="badge badge-pill bg-success">Active</span>
                            @else
                            <span class="badge badge-pill bg-danger">Not Active</span>
                            @endif
                            
                        </td>
                        
                    </tr>
                    @endforeach
    
                        <tbody>
                    </table>
                    </div>              
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->          
            </div>
            <!-- /.col -->

        {{-- start .col  --}}


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