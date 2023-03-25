@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        

        {{-- start .col  --}}
        <div class="col-6">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Edit Sub Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('admin.subCategory.update')}}' method="POST">
                            @csrf
                            <input type="hidden" name="sub_id" value="{{ $getSubData->id }}">
                            <div class="form-group">
                                <h5>Sub Category Name en<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="sub_name_en"
                                class="form-control" 
                                required="" 
                                value="{{ $getSubData->subCategory_name_en }}"
                                ></div>
                            </div>


                            <div class="form-group">
                                <h5>Sub Category Name ar<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="sub_name_ar"
                                class="form-control" 
                                required="" 
                                value="{{ $getSubData->subCategory_name_ar }}"
                                ></div>
                            </div>

                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="select_cat"  required="" class="form-control">
										<option value="" disabled selected>Select Your Category</option>
										
                                        @foreach ($getCategory as $category)
                                            <option value="{{ $category -> id }}" {{ ($category->id == $getSubData->category_id) ? 'selected' : '' }}>{{ $category ->category_name_en }}</option>
                                        @endforeach
									
									</select>
							    </div>
                            </div>


                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Update Sub Category">
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