<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function subView() {
        $subCat = SubCategory::latest()->get();
        $allCategory = Category::OrderBy('id','ASC')->get();
        return view('backend.category.subCategory',compact('subCat','allCategory'));
    }


    public function subCategoryStore(Request $request) {
        $data = $request->validate([
            'sub_name_en' => 'required',
            'sub_name_ar' => 'required',
            'select_cat' => 'required',

        ]);

        SubCategory::insert([
            'category_id' => $request ->select_cat,
            'subCategory_name_en' => $request ->sub_name_en,
            'subCategory_name_ar' => $request ->sub_name_ar,
            'subCategory_slug_en' => strtolower(str_replace(' ','-',$request->sub_name_en)),
            'subCategory_slug_ar' => str_replace(' ','-',$request->sub_name_ar),
        ]);

        $notfication =  array(
            'message' => 'SubCategory Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notfication);

    }

    public function subEdit($subId) {
        $getCategory = Category::all();
        $getSubData = SubCategory::findOrFail($subId);

        return view('backend.category.subCategory_edit',compact('getSubData','getCategory'));
    }

    public function subCategoryUpdate(Request $request) {
        $subId = $request->sub_id;

        SubCategory::findOrFail($subId)->update([
            'category_id' => $request ->select_cat,
            'subCategory_name_en' => $request ->sub_name_en,
            'subCategory_name_ar' => $request ->sub_name_ar,
            'subCategory_slug_en' => strtolower(str_replace(' ','-',$request->sub_name_en)),
            'subCategory_slug_ar' => str_replace(' ','-',$request->sub_name_ar),
        ]);

        $notfication =  array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.subCategory.view')->with($notfication);
    }

    public function subDelete($subId) {

        SubCategory::findOrFail($subId)->delete();
        
        $notfication =  array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notfication);

    }

    // ======================== Sub Sub Category ========================


    public function SubSubView() {
        $getAllCategory = Category::orderBy('category_name_en','ASC')->get();

        $getSub = SubCategory::all();
        $SubSubCat = SubSubCategory::all();

        return view('backend.category.Sub_SubCategory_view',
            compact('getAllCategory','getSub','SubSubCat')
        );

    }
    
    public function getSubCategory($category_id) {
        $data = SubCategory::where('category_id',$category_id)->get();
        return json_encode($data);
    }

    public function getSubSub($sub_cat) {
        $subsub = SubSubCategory::where('SubCategory_id',$sub_cat)->get();
        return json_encode($subsub);
    }

    public function SubSubStore(Request $request) {
        
        $data = $request->validate([
            'select_cat' => 'required',
            'Sub_cat_select' => 'required',
            'SubSub_name_en' => 'required',
            'SubSub_name_ar' => 'required',

        ]);

        SubSubCategory::insert([
            'category_id' => $request ->select_cat,
            'SubCategory_id' => $request ->Sub_cat_select,
            'SubSubCategory_name_en' => $request ->SubSub_name_en,
            'SubSubCategory_name_ar' => $request ->SubSub_name_ar,
            'SubSubCategory_slug_en' => strtolower(str_replace(' ','-',$request->SubSub_name_en)),
            'SubSubCategory_slug_ar' => str_replace(' ','-',$request->SubSub_name_ar),
        ]);

        $notfication =  array(
            'message' => 'Sub Sub-Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notfication);
    }   


    public function SubSubEdit($subId) {
        $getSubSub = SubSubCategory::findOrFail($subId);
        // get all category
        $getCategory = Category::orderBy('category_name_en','ASC')->get();

        // get All Sub Category

        $getSubCategory = SubCategory::orderBy('subCategory_name_en','ASC')->get();

        return view('backend.category.Sub_SubCategory_edit',
        compact('getSubSub','getCategory','getSubCategory')
    );

    }

    public function SubSubUpdate(Request $request) {
        $SubSubId = $request->sub_sub_id;

        SubSubCategory::findOrFail($SubSubId)->update([
            'category_id' => $request ->select_cat,
            'SubCategory_id' => $request ->Sub_cat_select,
            'SubSubCategory_name_en' => $request ->SubSub_name_en,
            'SubSubCategory_name_ar' => $request ->SubSub_name_ar,
            'SubSubCategory_slug_en' => strtolower(str_replace(' ','-',$request->SubSub_name_en)),
            'SubSubCategory_slug_ar' => str_replace(' ','-',$request->SubSub_name_ar),
        ]);

        $notfication =  array(
            'message' => 'Sub SubCategory Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('sub_subCategory.view')->with($notfication);
    }


    public function SubSubDelete($id) {
        SubSubCategory::findOrFail($id)->delete();

        $notfication =  array(
            'message' => 'Sub SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notfication);

    }
}


