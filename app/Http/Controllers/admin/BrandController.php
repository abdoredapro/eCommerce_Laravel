<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function brandView() {
        $brands = Brand::latest()->get();
        return view('backend.brand_show',compact('brands'));
    }
    public function brandStore(Request $request) {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_ar' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_ar.required' => 'هذا الحقل مطلوب',
        ]);

        $img = $request->file('brand_image');
        $imgName = rand(1,2500) .'_' . $img->getClientOriginalName();
        Image::make($img)->resize(300,300)->save('upload/brand_image/'.$imgName);
        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_ar' => $request->brand_name_ar,
            'brand_slug_en' => strtolower(str_replace(' ','-',$request ->brand_name_en)),
            'brand_slug_ar' => str_replace(' ','-',$request ->brand_name_ar),
            'brand_image' => $imgName,
        ]);
        $notfication =  array(
            'message' => 'Brand Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notfication);

    }

    public function brandEdit($brandId) {

        $brand = Brand::findOrFail($brandId);

        return view('backend.brand_edit', compact('brand'));
    }

    public function brandUpdate(Request $request) {
        
        $myBrand = $request ->id;
        $brandImage = $request->oldImage;

        if($request->file('brand_image')) {
            unlink('upload/brand_image/'.$brandImage);
            $img = $request->file('brand_image');
            $imgName = rand(1,10000) .'_' . $img->getClientOriginalName();
            Image::make($img)->resize(300,300)->save('upload/brand_image/'.$imgName);
            Brand::find($myBrand)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request ->brand_name_en)),
                'brand_slug_ar' => str_replace(' ','-',$request ->brand_name_ar),
                'brand_image' => $imgName,
            ]);

        } else {

            Brand::find($myBrand)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request ->brand_name_en)),
                'brand_slug_ar' => str_replace(' ','-',$request ->brand_name_ar),
            ]);

        } 


        $notfication =  array(
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('brand.view')->with($notfication);

    }

    
    public function brandDelete($brandId) {
        $brand = Brand::findOrFail($brandId);
        unlink('upload/brand_image/'.$brand->brand_image);
        Brand::find($brandId)->delete();

        $notfication =  array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notfication);


    }
    
}
