@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        
        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Manage Coupon</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Coupon Name</th>
                                <th>Coupon discount</th>
                                <th>Coupon Validity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>



                    @foreach ($coupon as $item)
                    <tr>
        
                        <td>{{ $item ->coupon_name }}</td>
                        <td>{{ $item ->coupon_discount }}</td>
                        <td>{{ Carbon\Carbon::parse($item ->coupon_validity)->format('D, d F Y')   }}</td>

                        
                        <td>
                            @if ($item ->coupon_validity >=  Carbon\Carbon::now()->format('Y-m-d'))
                            <span class="badge badge-pill bg-success">Valid</span>
                            @else
                            <span class="badge badge-pill bg-danger">Not Valid</span>
                            @endif

                        </td>
                        <td style="width: 30%">
                            <a href="{{ route('coupon.edit',$item->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="{{ route('coupon.delete',$item->id) }}" id='delete' class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
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
        <div class="col-4">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Add Coupon</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('coupon.store')}}' method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <h5>Coupon Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="coupon_name"
                                class="form-control" 
                                
                                ></div>

                                @error('coupon_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>


                            <div class="form-group">
                                <h5>Coupon Discount(%)<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="coupon_discount"
                                class="form-control" 
                                
                                ></div>
                                @error('coupon_discount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h5>Coupon Valid<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="date" 
                                name="coupon_validity" 
                                class="form-control"
                                min="{{ Carbon\Carbon::now()->format('Y-m-d')}}" 
                                ></div>
                                @error('coupon_validity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Add Coupon">
                            </div>
                            
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->          
            </div>
        {{-- end .col  --}}

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