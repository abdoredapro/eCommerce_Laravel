@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        

        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Edit Coupon</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('coupon.update',$coupon->id)}}' method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <h5>Coupon Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="coupon_name"
                                class="form-control" 
                                required
                                value="{{ $coupon-> coupon_name}}"
                                ></div>

                        

                            </div>


                            <div class="form-group">
                                <h5>Coupon Discount(%)<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="coupon_discount"
                                class="form-control"
                                required
                                value="{{ $coupon-> coupon_discount}}"
                                ></div>
                                
                            </div>

                            <div class="form-group">
                                <h5>Coupon Valid<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="date" 
                                name="coupon_validity" 
                                class="form-control"
                                min="{{ Carbon\Carbon::now()->format('Y-m-d')}}"
                                required
                                value="{{ $coupon-> coupon_validity}}"
                                ></div>
                                
                            </div>


                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Update Coupon">
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