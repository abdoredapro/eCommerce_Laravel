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
                <h3 class="box-title">Edit Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('cat.update')}}' method="POST">
                            @csrf

                            <input type="hidden" name='cat_id' value="{{ $cat ->id }}">
                            <div class="form-group">
                                <h5>Category Name en<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="cat_name_en"
                                class="form-control" 
                                required="" 
                                value="{{ $cat ->category_name_en }}"
                                ></div>
                            </div>


                            <div class="form-group">
                                <h5>Category Name ar<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="cat_name_ar"
                                class="form-control" 
                                required="" 
                                value="{{ $cat ->category_name_ar }}"
                                ></div>
                            </div>

                            <div class="form-group">
                                <h5>Category Icon<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" 
                                name="cat_icon" 
                                class="form-control" 
                                value="{{ $cat ->category_icon }}"
                                ></div>
                            </div>


                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Update Category">
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