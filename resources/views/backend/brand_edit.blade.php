@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        


        {{-- start .col  --}}
        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Edit Brand</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('brand.update') }}' enctype="multipart/form-data" method="POST" >
                            @csrf
                            
                            <input type="hidden" name='id' value="{{ $brand->id }}">
                            <input type="hidden" name='oldImage' value="{{ $brand->brand_image }}">



                            <div class="form-group">
                                <h5>Brand Name En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" 
                                name="brand_name_en" 
                                class="form-control" 
                                value="{{ $brand ->brand_name_en }}"
                                ></div>
                            </div>

                            <div class="form-group">
                                <h5>Brand Name ar<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="brand_name_ar"
                                class="form-control"  
                                value="{{ $brand ->brand_name_ar }}"
                                ></div>
                            </div>

                                    <div class="form-group">
                                        <h5>Brand Image<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="file"
                                        name="brand_image"
                                        class="form-control" 
                                        
                                        ></div>
                                    </div>

                            
        
                                
                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Update Brand">
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
