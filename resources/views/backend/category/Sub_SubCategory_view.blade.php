@extends('admin.master')
@section('admin_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
    <div class="row">
        
        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">All Sub Sub-Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Sub Sub-Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                                @foreach ($SubSubCat as $item)
                                <tr>
                                
                                    <td>{{ $item ->category->category_name_en }}</td>
                                    <td>{{ $item ->SubCategory->subCategory_name_en }}</td>
                                    <td>{{ $item ->SubSubCategory_name_en }}</td>
                                    <td>
                                        <a href="{{ route('sub_subCategory.edit',$item->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('sub_subCategory.delete',$item->id) }}" id='delete' class="btn btn-danger">
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
                <h3 class="box-title">Add Sub Sub-Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('sub_subCategory.store')}}' method="POST">
                            @csrf
                            

                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="select_cat"  required="" class="form-control">
										<option value="" disabled selected>Select Your Category</option>
                                        
                                        @foreach ($getAllCategory as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name_en}}</option>
                                        @endforeach

									</select>
                                
							    </div>
                            </div>




                            <div class="form-group">
								<h5>Sub Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="Sub_cat_select"  required="" class="form-control">
										<option value="" disabled selected>Select Your Sub Category</option>
                                        
                            
									</select>
                                
							    </div>
                            </div>






                            <div class="form-group">
                                <h5>Sub Sub-Category Name en<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="SubSub_name_en"
                                class="form-control" 
                                required="" 
                                ></div>
                            </div>


                            <div class="form-group">
                                <h5>Sub Sub-Category Name ar<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="SubSub_name_ar"
                                class="form-control" 
                                required="" 
                                ></div>
                            </div>

                            


                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Add Sub Sub-Category">
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

<script type='text/javascript'>

    $(document).ready(function() {
        $('select[name="select_cat"]').on('change', function() {
            
            var category_id = $(this).val();
            console.log(category_id)
            if(category_id) {
                $.ajax({
                    url: "{{ url('/category/subCat/get') }}/" + category_id ,
                    type:'GET', 
                    dataType:'json',
                    success:function(data) {
                        var SubElement = $('select[name="Sub_cat_select"]').empty();
                        $.each(data, function(key,val) {
                            $('select[name="Sub_cat_select"]').append(`<option 
                            value="${val.id}" >${val.subCategory_name_en}</option>`);
                        }); 
                    },
                });
            } else {

            }
        });
    });



</script>

@endsection