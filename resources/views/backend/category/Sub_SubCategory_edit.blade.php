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
                <h3 class="box-title">Edit Sub Sub-Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action='{{ route('sub_subCate.store')}}' method="POST">
                            @csrf
                            
                            <input type="hidden" name="sub_sub_id" value="{{ $getSubSub->id }}">
                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="select_cat"  required="" class="form-control">
                                        
                                        @foreach ($getCategory as $category)
                                            <option value="{{ $category->id }}"
                                                {{ ($getSubSub->category_id == $category->id ) ? 'selected' : ''}}
                                                >{{ $category->category_name_en}}</option>
                                        @endforeach

									</select>
                                
							    </div>
                            </div>




                            <div class="form-group">
								<h5>Sub Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="Sub_cat_select"  required="" class="form-control">

                                        @foreach ($getSubCategory as $sub)
                                            <option value="{{ $sub->id }}"
                                                {{ ($getSubSub->SubCategory_id == $sub->id ) ? 'selected' : ''}}
                                                >{{ $sub->subCategory_name_en}}</option>
                                        @endforeach
                            
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
                                value="{{ $getSubSub->SubSubCategory_name_en }}"
                                ></div>
                            </div>


                            <div class="form-group">
                                <h5>Sub Sub-Category Name ar<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text"
                                name="SubSub_name_ar"
                                class="form-control" 
                                required="" 
                                value="{{ $getSubSub->SubSubCategory_name_ar }}"
                                ></div>
                            </div>

                            


                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Update">
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

