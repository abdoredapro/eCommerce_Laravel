@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        
        <div class="col-8">

        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">All Brands</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Bran En</th>
                            <th>Brand ar</th>
                            <th>Brand Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand ->brand_name_en }}</td>
                                <td>{{ $brand ->brand_name_ar }}</td>
                                <td>
                                    <img src="{{asset('upload/brand_image/'.$brand -> brand_image)}}" style="width:70px;height:50px">
                                </td>
                                <td>
                                    <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{ route('brand.delete', $brand->id) }}" id='delete' class="btn btn-danger">
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
                <h3 class="box-title">Add Brand</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('admin.brand.store')}}' method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Brand Name En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" 
                                name="brand_name_en" 
                                class="form-control" 
                                required="" 
                                ></div>
                            </div>

                            <div class="form-group">
                                <h5>Brand Name ar<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="brand_name_ar"
                                class="form-control" 
                                required="" 
                                ></div>
                            </div>

                                    <div class="form-group">
                                        <h5>Brand Image<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="file"
                                        name="brand_image"
                                        class="form-control" 
                                        required="" 
                                        ></div>
                                    </div>

                            
        
                                
                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Add Brand">
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