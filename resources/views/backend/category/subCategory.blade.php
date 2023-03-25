@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        
        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">All Sub Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Sub Category en</th>
                                <th>Sub Category ar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                                @foreach ($subCat as $sub)
                                <tr>
                                
                                    <td>{{ $sub ->category->category_name_en }}</td>
                                    <td>{{ $sub ->subCategory_name_en }}</td>
                                    <td>{{ $sub ->subCategory_name_ar }}</td>
                                    <td>
                                        <a href="{{ route('admin.subCategory.edit',$sub->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('admin.sub.delete',$sub->id) }}" id='delete' class="btn btn-danger">
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
                <h3 class="box-title">Add Sub Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('admin.subCategory.store')}}' method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <h5>Sub Category Name en<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="sub_name_en"
                                class="form-control" 
                                required="" 
                                ></div>
                            </div>


                            <div class="form-group">
                                <h5>Sub Category Name ar<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="sub_name_ar"
                                class="form-control" 
                                required="" 
                                ></div>
                            </div>

                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="select_cat"  required="" class="form-control">
										<option value="" disabled selected>Select Your Category</option>
										
                                        @foreach ($allCategory as $category)
                                            <option value="{{ $category -> id }}">{{ $category ->category_name_en }}</option>
                                        @endforeach
									
									</select>
							    </div>
                            </div>


                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Add Sub Category">
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