@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Returned Order</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Returned order</li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
    <div class="row">
        
        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">All return order</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Invoice</th>
                                <th>Amount</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>



                    @foreach ($orders as $order)
                    <tr>
        
                        <td>{{ $order ->order_date }}</td>
                        <td>{{ $order ->invoice_no }}</td>
                        <td>${{ $order ->amount }}</td>
                        <td>{{ $order ->payment_method }}</td>
                        <td>
                            @if ($order->return_order == 2)
                            <span class="badge badge-pill badge-success">Returned!</span>
                            
                            @endif
                            
                        </td>
                      

                        
                        <td >
                            <span class="badge badge-pill badge-success">Approved</span>
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