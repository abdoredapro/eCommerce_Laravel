<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{
    public function categoryView() {
        $category = Category::latest()->get();
        return view('backend.category.category_show',compact('category'));
    }

    public function categoryStore(Request $request) {

        $request->validate([
            'cat_name_en' => 'required',
            'cat_name_ar' => 'required',
        ]);


        Category::insert([
            'category_name_en' => $request->cat_name_en,
            'category_name_ar' => $request->cat_name_ar,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->cat_name_en)),
            'category_slug_ar' => str_replace(' ','-',$request->cat_name_ar),
            'category_icon' => $request->cat_icon,
        ]);
        $notfication =  array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notfication);



    }


    public function catEdit($catId) {
        $cat = Category::findOrFail($catId);

        return view('backend.category.category_edit',compact('cat'));
    }

    public function catUpdate(Request $request) {
        $catId = $request->cat_id;


        Category::find($catId)->update([
            'category_name_en' => $request ->cat_name_en,
            'category_name_ar' => $request ->cat_name_ar,
            'category_slug_en' => strtolower(str_replace(' ','-',$request ->cat_name_en)),
            'category_slug_ar' => str_replace(' ','-',$request ->cat_name_ar),
            'category_icon' => $request ->cat_icon,
        ]);

        $notfication =  array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.category.view')->with($notfication);

    }

    public function catDelete($catId) {

        Category::findOrFail($catId)->delete();
        
        $notfication =  array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notfication);

    }
}
