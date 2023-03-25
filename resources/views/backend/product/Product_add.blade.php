@extends('admin.master')
@section('admin_content')

<!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      	  
      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Add Product</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                <form action='{{ route('product.store')}}' method="POST" enctype="multipart/form-data">
                    @csrf
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
                <option value="{{ $brand -> id }}" >{{ $brand ->brand_name_en }}</option>
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
            <option value="{{ $category -> id }}" >{{ $category ->category_name_en }}</option>
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
            
            {{-- @foreach ($getCategory as $category)
                <option value="{{ $category -> id }}" {{ ($category->id == $getSubData->category_id) ? 'selected' : '' }}>{{ $category ->category_name_en }}</option>
            @endforeach --}}
        
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
        <input type="text" name="product_name_en" class="form-control" required > </div>
</div>
    {{-- start form group   --}}

                            </div>
                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Name ar<span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_name_ar" class="form-control" required > </div>
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
        <input type="text" name="product_code" class="form-control" required > </div>
</div>
    {{-- start form group   --}}
                            </div>  


                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Quantity<span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="product_amount" class="form-control" required > </div>
</div>
    {{-- start form group   --}}

                            </div>

                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Tags En<span class="text-danger">*</span></h5>
    <div class="controls">
        <div class="tags-default">
            <input type="text" value="" name="product_tags_en" data-role="tagsinput" placeholder="add tags"  />
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
            <input type="text"  value="" name="product_tags_ar"  data-role="tagsinput" placeholder="add tags" />
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
            <input type="text" value="" name="product_size_en"  data-role="tagsinput" placeholder="add tags" />
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
            <input type="text" value=""  name="product_size_ar" data-role="tagsinput" placeholder="add tags" />
        </div>
    </div>
        
</div>
    {{-- start form group   --}}

                            </div>
                        </div>

                        {{-- end 4 row  --}}


                           {{-- start 5 row  --}}

                           <div class="row">
                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Color En<span class="text-danger">*</span></h5>
    <div class="controls">
        <div class="tags-default">
            <input type="text" value="" name="product_color_en"  data-role="tagsinput" placeholder="add tags" />
        </div>
    </div>
        
</div>
    {{-- start form group   --}}
                            </div>  


                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Color ar<span class="text-danger">*</span></h5>
    <div class="controls">
        <div class="tags-default">
            <input type="text" value=""  name="product_color_ar" data-role="tagsinput" placeholder="add tags" />
        </div>
    </div>
        
</div>
    {{-- start form group   --}}

                            </div>

                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Selling Price<span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="selling_price"  class="form-control" required > </div>
</div>
    {{-- start form group   --}}

                            </div>
                        </div>

                        {{-- end 5 row  --}}


                         {{-- start 6 row  --}}

                         <div class="row">
                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">
    <h5>Product Discount Price<span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="discount_price" class="form-control" > </div>
</div>
    {{-- start form group   --}}
                            </div>  


                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">

   <h5>Main Image<span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="file" name="product_thambnail" class="single form-control"  required>
    </div>
    <img src="" id="singleImage" >

</div>
    {{-- start form group   --}}

                            </div>

                            <div class="col-md-4">
{{-- start form group   --}}
<div class="form-group">

    <h5>Multi Image<span class="text-danger">*</span></h5>
     <div class="controls">
         <input type="file" name="multi_image[]" class="form-control"  multiple>
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
        <textarea  name="short_des_en"  class="form-control" required placeholder="Textarea text" required></textarea>
    </div>
</div>
    {{-- start form group   --}}
                            </div>  


                            <div class="col-md-6">
{{-- start form group   --}}
<div class="form-group">
    <h5>Short Description ar <span class="text-danger">*</span></h5>
    <div class="controls">
        <textarea  name="short_des_ar"  class="form-control" required placeholder="Textarea text" required></textarea>
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
            <input type="checkbox" name="hot_deals" id="checkbox_2"  value="1">
            <label for="checkbox_2">Hot Deals</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" name="featured" id="checkbox_3" value="1">
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
            <input type="checkbox" name="speacial_offer" id="checkbox_4"  value="1">
            <label for="checkbox_4">Speacial Offer</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" name="speacial_deals" id="checkbox_5" value="1">
            <label for="checkbox_5">Special Deal</label>
        </fieldset>
    </div>
</div>
    {{-- start form group   --}}

                            </div>

                        
                        </div>

                        {{-- end 9 row  --}}

           
                    <div class="text-xs-right">
                        <input type="submit" class='btn btn-rounded btn-primary' value="Add Product">
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
    </div>

<!-- /.content-wrapper -->

<script type='text/javascript'>

    $(document).ready(function() {
        
        $('select[name="category_id"]').on('change', function() {
            
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{ url('/category/subCat/get') }}/" + category_id ,
                    type:'GET', 
                    dataType:'json',
                    success:function(data) {
                        $('select[name="SubSubCategory_id"]').html('');
                        var SubElement = $('select[name="Subcategory_id"]').empty();
                        $.each(data, function(key,val) {
                            $('select[name="Subcategory_id"]').append(`<option 
                            value="${val.id}" >${val.subCategory_name_en}</option>`);
                        }); 
                    },
                });
            } else {

            }
        });



        $('select[name="Subcategory_id"]').on('change', function() {
            
            var sub_cat = $(this).val();

            if(sub_cat) {
                $.ajax({
                    url: "{{ url('/category/sub/sub/get') }}/" + sub_cat ,
                    type:'GET', 
                    dataType:'json',
                    success:function(data) {
                        
                        var myelel = $('select[name="SubSubCategory_id"]').empty();
                      
                        $.each(data, function(key,val) {
                            $('select[name="SubSubCategory_id"]').append(`<option 
                            value="${val.id}" >${val.SubSubCategory_name_en}</option>`);
                        }); 

                    
                    },
                });
            } else {

            }
        });







    });

    // start upload single image preview  single
    let input = document.querySelector('.single')
let previewImage = document.querySelector('#singleImage')

input.addEventListener('change', function (e) {
    previewImage.src = ''
    let reader = new FileReader();
    reader.onload = () => {
        previewImage.src = reader.result
        previewImage.style.width = '100px'
        previewImage.style.height = '90px'
    }
    reader.readAsDataURL(input.files[0])
})
    
    


//     let input = document.querySelector('input')
// let imagesContinaer = document.querySelector('.images')

// function preview() {
//     imagesContinaer.innerHTML = ''
//     for(i of input.files) {
//         let reader = new FileReader()
//         reader .onload = function () {
//             let img = document.createElement('img')
//             img.src = reader.result
//             imagesContinaer.appendChild(img)
//         }
//         reader.readAsDataURL(i)
//     }
// }
// input.addEventListener('change' , preview)




</script>

@endsection