<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function seoSetting() {
        $seo = Seo::find(1);
        return view('backend.seo.seo_update',compact('seo'));
    }

    public function seoSettingUpdate(Request $request,$id) {


        Seo::find($id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
    
        ]);

    


        $notfication =  array(
            'message' => 'Seo Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notfication);


    }


}
