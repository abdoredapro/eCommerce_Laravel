<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Multi_Image;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use PhpParser\Parser\Multiple;

class ProductController extends Controller
{
    public function addProduct() {
        $categories = Category::latest()->get();
        $brands     = Brand::latest()->get();

        return view('backend.product.Product_add',
        compact('categories','brands'));
    }

    public function productStore(Request $request) {

        $img = $request->file('product_thambnail');
        $imgName = rand(1,10000) .'_' . $img->getClientOriginalName();
        Image::make($img)->resize(900,1000)->save('upload/product/'.$imgName);
       $product_id =  Product::insertGetId([
            'brand_id' => $request ->brand_select,
            'category_id' => $request ->category_id,
            'Subcategory_id' => $request ->Subcategory_id,
            'SubSubCategory_id' => $request ->SubSubCategory_id,
            'product_name_en' => $request ->product_name_en,
            'product_name_ar' => $request ->product_name_ar,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_ar' => str_replace(' ','-',$request->product_name_ar),
            'product_code' => $request ->product_code,
            'product_amount' => $request ->product_amount,
            'product_tags_en' => $request ->product_tags_en,
            'product_tags_ar' => $request ->product_tags_ar,
            'product_size_en' => $request ->product_size_en,
            'product_size_ar' => $request ->product_size_ar,
            'product_color_en' => $request ->product_color_en,
            'product_color_ar' => $request ->product_color_ar,
            'selling_price' => $request ->selling_price,
            'discount_price' => $request ->discount_price,
            'short_des_en' => $request ->short_des_en,
            'short_des_ar' => $request ->short_des_ar,
            'long_des_en' => $request ->long_des_en,
            'long_des_ar' => $request ->long_des_ar,
            'product_thambnail' => $imgName,
            'hot_deals' => $request ->hot_deals,
            'featured' => $request ->featured,
            'speacial_offer' => $request ->speacial_offer,
            'speacial_deals' => $request ->speacial_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $images = $request ->file('multi_image');
        foreach($images as $image) {

        $name = rand(1,10000) .'_' . $image->getClientOriginalName();
        Image::make($image)->resize(900,1000)->save('upload/multi_image/'.$name);
            Multi_Image::insert([
                'product_id' => $product_id,
                'image_name' =>$name,
                'created_at' =>Carbon::now()
            ]);
        }
    
        $notfication =  array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notfication);

    }

    public function manageProduct() {
        $allProduct = Product::latest()->get();

        return view('backend.product.product_view',compact('allProduct'));
    }

    public function productEdit($id) {
        $multiImage = Multi_Image::where('product_id', $id)->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        $SubSubCategory = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id);

        return view('backend.product.product_edit',
        compact('categories','subCategory','SubSubCategory','product','brands','multiImage')
    );

    }

    public function productUpdate(Request $request) {

        $product_id = $request ->product_id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request ->brand_select,
            'category_id' => $request ->category_id,
            'Subcategory_id' => $request ->Subcategory_id,
            'SubSubCategory_id' => $request ->SubSubCategory_id,
            'product_name_en' => $request ->product_name_en,
            'product_name_ar' => $request ->product_name_ar,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_ar' => str_replace(' ','-',$request->product_name_ar),
            'product_code' => $request ->product_code,
            'product_amount' => $request ->product_amount,
            'product_tags_en' => $request ->product_tags_en,
            'product_tags_ar' => $request ->product_tags_ar,
            'product_size_en' => $request ->product_size_en,
            'product_size_ar' => $request ->product_size_ar,
            'product_color_en' => $request ->product_color_en,
            'product_color_ar' => $request ->product_color_ar,
            'selling_price' => $request ->selling_price,
            'discount_price' => $request ->discount_price,
            'short_des_en' => $request ->short_des_en,
            'short_des_ar' => $request ->short_des_ar,
            'long_des_en' => $request ->long_des_en,
            'long_des_ar' => $request ->long_des_ar,
            'hot_deals' => $request ->hot_deals,
            'featured' => $request ->featured,
            'speacial_offer' => $request ->speacial_offer,
            'speacial_deals' => $request ->speacial_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notfication =  array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('manage.product')->with($notfication);


    }

    // ========= start update multi Image =============

    public function multiImageUpdate(Request $request) {
        $images =$request ->multi_image; 

        // check array not empty 
        if(!empty($images)) {
            
            foreach($images as $id => $img) {
                $imgEl = Multi_Image::findOrFail($id);
                unlink('upload/multi_image/'.$imgEl->image_name);

                $imgName = rand(1,10000) .'_' . $img->getClientOriginalName();
                Image::make($img)->resize(900,1000)->save('upload/multi_image/'.$imgName);

                Multi_Image::where('id',$id)->update([

                    'image_name' =>$imgName,
                    'updated_at' =>Carbon::now()
                ]);

                $notfication =  array(
                    'message' => 'Image Updated Successfully',
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($notfication);


            }

        } else {

        }

    }

    public function singleImageUpdate(Request $request) {
        $pro_id = $request->product_id;
        if($request->file('single_image')) {
            $uploadedImage = $request->file('single_image');
            $info =   Product::findOrFail($pro_id);
            unlink('upload/product/'.$info->product_thambnail);

            $name = rand(1,10000) .'_' . $uploadedImage->getClientOriginalName();
                Image::make($uploadedImage)->resize(900,1000)->save('upload/product/'.$name);

                product::findOrFail($pro_id)->update([
                    'product_thambnail' => $name,
                    'updated_at' => Carbon::now()
                    
                ]);

                $notfication =  array(
                    'message' => 'Image Updated Successfully',
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($notfication);




        } 
    }


    public function multiImageDelete($id) {
        $getInfo = Multi_Image::findOrFail($id);

        unlink('upload/multi_image/'.$getInfo->image_name);

        Multi_Image::findOrFail($id)->delete();

        $notfication =  array(
            'message' => 'Image Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notfication);

    }

    public function productInActive($id) {
        Product::findOrFail($id)->update(['status'=>0]);

        $notfication =  array(
            'message' => 'product Not Active Now!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notfication);
    }

    public function productActive($id) {
        Product::findOrFail($id)->update(['status'=>1]);

        $notfication =  array(
            'message' => 'product Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notfication);
    }

    public function productDelete($id) {
        $productInfo = Product::findOrfail($id);
        if($productInfo->product_thambnail !== null) {
            unlink('upload/product/'.$productInfo->product_thambnail);
            
        }
        Product::findOrFail($id)->delete();

        $multi = Multi_Image::where('product_id',$id)->get();

        if($multi !== null) {
        
            

            foreach($multi as $el) {

                unlink('upload/multi_image/'.$el->image_name);

                Multi_Image::where('product_id',$id)->delete();



            }
            
            
        }

        $notfication =  array(
            'message' => 'product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notfication);


    }

    public function search(Request $request) {
        $mySearch = $request->search;
        $productInfo = Product::Where('product_name_en', 'LIKE', "%$mySearch%")->get();
        $categories = Category::latest()->orderBy('category_name_en','ASC')->get();
        return view('frontend.tags.product_search', compact('productInfo', 'categories'));
    }

    public function getProducts(Request $request) {
      
        $mySearch = $request->mySearch;
        $productInfo = Product::Where('product_name_en', 'LIKE', "%$mySearch%")->limit(5)->get();
        if(count($productInfo) == 0) {
            return ['type'=> 'error'];
        }
        return view('frontend.search.search_result', compact('productInfo'));

      
    

    }


}
