@extends('admin.master')
@section('admin_content')

<!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      	  
      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Edit Product</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                <form action='{{ route('product.update')}}' method="POST" >
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product ->id}}">
                    <div class="row">
                        <div class="col-12">	
                        {{-- start row  --}}
                        <div class="row">
                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Brand Select <span class="text-danger">*</span></h5>
    <div class="controls">
        <select name="brand_select" class="form-control" required>
            <option value="" disabled selected>Select Your Brand</option>
            
            @foreach ($brands as $brand)
                <option value="{{ $brand -> id }}" 
                    {{ ($brand -> id == $product->brand_id) ? 'selected' : '' }}
                    >{{ $brand ->brand_name_en }}</option>
            @endforeach
        
        </select>
    </div>
</div>
    {{-- start form group   --}}
                            </div>  


                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
<h5>Category Select <span class="text-danger">*</span></h5>
<div class="controls">
    <select name="category_id" class="form-control" required>
        <option value="" disabled selected>Select Your Category</option>
        
        @foreach ($categories as $category)
            <option value="{{ $category -> id }}" 
                {{ ($category -> id == $product->category_id) ? 'selected' : '' }}
                >{{ $category ->category_name_en }}</option>
        @endforeach
    
    </select>
</div>
</div>
    {{-- start form group   --}}

                            </div>
                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>SubCategory Select <span class="text-danger">*</span></h5>
    <div class="controls">
        <select name="Subcategory_id"  class="form-control" required>
            <option value="" disabled selected>Select Your Sub Category</option>
            
            @foreach ($subCategory as $sub)
                <option value="{{ $sub -> id }}"
                    {{ ($sub -> id == $product->Subcategory_id) ? 'selected' : '' }}
                    >{{ $sub ->subCategory_name_en }}</option>
            @endforeach
        
        </select>
    </div>
</div>
    
{{-- start form group   --}}

                            </div>
                        </div>

                        {{-- end row  --}}

                        {{-- start second row  --}}

                        <div class="row">
                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Sub Sub-Category<span class="text-danger">*</span></h5>
    <div class="controls">
        <select name="SubSubCategory_id"  class="form-control" required>
            <option value="" disabled selected>Select Your Sub Sub-Category</option>
            
            @foreach ($SubSubCategory as $subsub)
                <option value="{{ $subsub -> id }}"
                    {{ ($subsub -> id == $product->SubSubCategory_id) ? 'selected' : '' }}
                    >{{ $subsub ->SubSubCategory_name_en }}</option>
            @endforeach
        
        </select>
    </div>
</div>
    {{-- start form group   --}}
                            </div>  


                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Name En<span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_name_en" value="{{ $product ->product_name_en }}" class="form-control"  > </div>
</div>
    {{-- start form group   --}}

                            </div>
                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Name ar<span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_name_ar" value="{{ $product ->product_name_ar }}" class="form-control" > </div>
</div>
    {{-- start form group   --}}

                            </div>
                        </div>

                        {{-- end second row  --}}

                         {{-- start third row  --}}

                         <div class="row">
                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Code<span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_code" value="{{ $product ->product_code }}" class="form-control" required > </div>
</div>
    {{-- start form group   --}}
                            </div>  


                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Quantity<span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_amount" value="{{ $product ->product_amount }}" class="form-control" required > </div>
</div>
    {{-- start form group   --}}

                            </div>

                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Tags En<span class="text-danger">*</span></h5>
    <div class="controls">
        <div class="tags-default">
            <input type="text" value="{{ $product ->product_tags_en }}"  name="product_tags_en" data-role="tagsinput" placeholder="add tags"  />
        </div>
    </div>
        
</div>
    {{-- start form group   --}}

                            </div>
                        </div>

                        {{-- end third row  --}}

                        {{-- start 4 row  --}}

                        <div class="row">
                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Tags ar<span class="text-danger">*</span></h5>
    <div class="controls">
        <div class="tags-default">
            <input type="text"  value="{{ $product ->product_tags_ar }}" name="product_tags_ar"  data-role="tagsinput" placeholder="add tags" />
        </div>
    </div>
        
</div>
    {{-- start form group   --}}
                            </div>  


                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Size en<span class="text-danger">*</span></h5>
    <div class="controls">
        <div class="tags-default">
            <input type="text" value="{{ $product ->product_size_en }}" name="product_size_en"  data-role="tagsinput" placeholder="add tags" />
        </div>
    </div>
        
</div>
    {{-- start form group   --}}

                            </div>

                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Size ar<span class="text-danger">*</span></h5>
    <div class="controls">
        <div class="tags-default">
            <input type="text" value="{{ $product ->product_size_ar }}"  name="product_size_ar" data-role="tagsinput" placeholder="add tags" />
        </div>
    </div>
        
</div>
    {{-- start form group   --}}

                            </div>
                        </div>

                        {{-- end 4 row  --}}


                           {{-- start 5 row  --}}

                           <div class="row">
                            <div class="col-md-6">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Color En<span class="text-danger">*</span></h5>
    <div class="controls">
        <div class="tags-default">
            <input type="text" value="{{ $product ->product_color_en }}" name="product_color_en"  data-role="tagsinput" placeholder="add tags" />
        </div>
    </div>
        
</div>
    {{-- start form group   --}}
                            </div>  


                            <div class="col-md-6">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Color ar<span class="text-danger">*</span></h5>
    <div class="controls">
        <div class="tags-default">
            <input type="text" value="{{ $product ->product_color_ar }}" name="product_color_ar" data-role="tagsinput" placeholder="add tags" />
        </div>
    </div>
        
</div>
    {{-- start form group   --}}

                            </div>

                            
                        </div>

                        {{-- end 5 row  --}}


                         {{-- start 6 row  --}}

                         <div class="row">
                            <div class="col-md-6">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Discount Price<span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="discount_price" value="{{ $product ->discount_price }}" class="form-control"  > </div>
</div>
    {{-- start form group   --}}
                            </div>  


                            <div class="col-md-6">
                                {{-- start form group   --}}
<div class="form-group">
    <h5>Product Selling Price<span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="selling_price" value="{{ $product ->selling_price }}" class="form-control"  > 
    </div>
</div>
    {{-- start form group   --}}

                            </div>

                           
                        </div>

                        {{-- end 6 row  --}}

                        {{-- start 7 row  --}}

                        <div class="row">
                            <div class="col-md-6">
{{-- start form group   --}}
<div class="form-group">
    <h5>Short Description En <span class="text-danger">*</span></h5>
    <div class="controls">
        <textarea  name="short_des_en"   class="form-control" required placeholder="Textarea text" required>
            {{ $product ->short_des_en }}
        </textarea>
    </div>
</div>
    {{-- start form group   --}}
                            </div>  


                            <div class="col-md-6">
{{-- start form group   --}}
<div class="form-group">
    <h5>Short Description ar <span class="text-danger">*</span></h5>
    <div class="controls">
        <textarea  name="short_des_ar"  class="form-control" required placeholder="Textarea text" >
            {{ $product ->short_des_ar }}
        </textarea>
    </div>
</div>
    {{-- start form group   --}}

                            </div>

                        
                        </div>

                        {{-- end 7 row  --}}

                         {{-- start 8 row  --}}

                         <div class="row">
                            <div class="col-md-6">
{{-- start form group   --}}
<div class="form-group">
    <h5>Long Description En <span class="text-danger">*</span></h5>
    <div class="controls">
        <textarea id="editor1" name="long_des_en" rows="10" cols="80" required>
            {{ $product ->long_des_en }}
        </textarea>
    </div>
</div>
    {{-- start form group   --}}
                            </div>  


                            <div class="col-md-6">
{{-- start form group   --}}
<div class="form-group">
    <h5>Long Description ar <span class="text-danger">*</span></h5>
    <div class="controls">
        <textarea id="editor2" name="long_des_ar" rows="10" cols="80" required>
            {{ $product ->long_des_ar }}
        </textarea>
    </div>
</div>
    {{-- start form group   --}}

                            </div>

                        
                        </div>

                        {{-- end 8 row  --}}


                        {{-- start 9 row  --}}
<hr>
                        <div class="row">
                            <div class="col-md-6">
{{-- start form group   --}}
<div class="form-group">
    <div class="controls">
        <fieldset>
            <input type="checkbox" name="hot_deals" id="checkbox_2"  value="1" 
            {{ ($product ->hot_deals == 1) ? 'checked' : '' }}
            >
            <label for="checkbox_2">Hot Deals</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" name="featured" id="checkbox_3" 
            {{ ($product ->featured == 1) ? 'checked' : '' }}
            value="1">
            <label for="checkbox_3">Featured</label>
        </fieldset>
    </div>
</div>
    {{-- start form group   --}}
                            </div>  


                            <div class="col-md-6">
{{-- start form group   --}}
<div class="form-group">
    <div class="controls">
        <fieldset>
            <input type="checkbox" name="speacial_offer" id="checkbox_4"
            {{ ($product ->speacial_offer == 1) ? 'checked' : '' }}
            value="1">
            <label for="checkbox_4">Speacial Offer</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" name="speacial_deals" 
            {{ ($product ->speacial_deals == 1) ? 'checked' : '' }}
            id="checkbox_5" value="1">
            <label for="checkbox_5">Special Deal</label>
        </fieldset>
    </div>
</div>
    {{-- start form group   --}}

                            </div>

                        
                        </div>

                        {{-- end 9 row  --}}

           
                    <div class="text-xs-right">
                        <input type="submit" class='btn btn-rounded btn-primary' value="Update Product">
                    </div>


                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                          <h4 class="box-title">Multi <strong>Image</strong></h4>
                        </div>
      
                        <div class="box-body">
                        <form action="{{ route('multi_image_update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @foreach ($multiImage as $image)
                                    <div class="col-md-3">
                                        <div class="card">
                                    <img src="{{ asset('upload/multi_image/'.$image->image_name) }}"  class="card-img-top">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <a href="{{ route('multi_image_delete',$image->id) }}" id='delete' class="btn btn-md btn-danger"><i class="fa fa-trash"></i></a>
                                        </div>
                                        <div class="card-text">
                                            
    {{-- start form group   --}}
<div class="form-group">

    <h5>Multi Image<span class="text-danger">*</span></h5>
     <div class="controls">
         <input type="file" name="multi_image[{{ $image->id }}]" class="form-control"  multiple>
     </div>
 
 </div>
     {{-- start form group   --}}
                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class='btn btn-rounded btn-primary' value="Update Images">
                            </div>
                        </form>
                        </div>
                      </div>
                </div>
            </div>
        </section>


                                    {{-- start second section  --}}
                                    <section class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="box bt-3 border-info">
                                                    <div class="box-header">
                                                      <h4 class="box-title">Single <strong>Image</strong></h4>
                                                    </div>
                                  
                                                    <div class="box-body">
                                                    <form action="{{ route('single_image_update') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name='product_id' value="{{ $product->id }}">
                                                        <div class="row">
                                                          
                                                                <div class="col-md-3">
                                                                    <div class="card">
                                                                <img src="{{ asset('upload/product/'.$product->product_thambnail) }}"  class="card-img-top">
                                                                <div class="card-body">
                                                                    <div class="card-title">
                                                                        <a href="#" id='delete' class="btn btn-md btn-danger"><i class="fa fa-trash"></i></a>
                                                                    </div>
                                                                    <div class="card-text">
                                                                        
                                {{-- start form group   --}}
                            <div class="form-group">
                            
                                <h5>Upload Image<span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="file" name="single_image" class="form-control"  >
                                 </div>
                             
                             </div>
                                 {{-- start form group   --}}
                                                                    </div>
                                                                </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="text-xs-right">
                                                            <input type="submit" class='btn btn-rounded btn-primary' value="Update Images">
                                                        </div>
                                                    </form>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    </section>
                    
                                    {{-- end second section  --}}


    </div>

<!-- /.content-wrapper -->

<script type='text/javascript'>

    // $(document).ready(function() {
        
    //     $('select[name="category_id"]').on('change', function() {
            
    //         var category_id = $(this).val();
    //         if(category_id) {
    //             $.ajax({
    //                 url: "{{ url('/category/subCat/get') }}/" + category_id ,
    //                 type:'GET', 
    //                 dataType:'json',
    //                 success:function(data) {
    //                     $('select[name="SubSubCategory_id"]').html('');
    //                     var SubElement = $('select[name="Subcategory_id"]').empty();
    //                     $.each(data, function(key,val) {
    //                         $('select[name="Subcategory_id"]').append(`<option 
    //                         value="${val.id}" >${val.subCategory_name_en}</option>`);
    //                     }); 
    //                 },
    //             });
    //         } else {

    //         }
    //     });



    //     $('select[name="Subcategory_id"]').on('change', function() {
            
    //         var sub_cat = $(this).val();

    //         if(sub_cat) {
    //             $.ajax({
    //                 url: "{{ url('/category/sub/sub/get') }}/" + sub_cat ,
    //                 type:'GET', 
    //                 dataType:'json',
    //                 success:function(data) {
                        
    //                     var myelel = $('select[name="SubSubCategory_id"]').empty();
                      
    //                     $.each(data, function(key,val) {
    //                         $('select[name="SubSubCategory_id"]').append(`<option 
    //                         value="${val.id}" >${val.SubSubCategory_name_en}</option>`);
    //                     }); 

                    
    //                 },
    //             });
    //         } else {

    //         }
    //     });







    // });


// function getImage(img) {
//     let fileRead = new FileReader();
//     fileRead.onload = function () {

//         $('#singleImage').attr('src',fileRead.result)
//         fileRead.redAsDataUrl(input.files[0])
//     }
// } 




</script>

@endsection