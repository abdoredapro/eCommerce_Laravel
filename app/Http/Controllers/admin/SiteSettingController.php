<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function siteSetting()
    {
        $site = SiteSetting::find(1);
        
        return view('backend.site.site_setting',compact('site'));
    }

    public function siteSettingUpdate(Request $request,$id) {
     

        if($request->file('logo')) {
         
            $img = $request->file('logo');
            $imgName = rand(1,10000) .'_' . $img->getClientOriginalName();
            Image::make($img)->resize(139,36)->save('upload/logo/'.$imgName);
            SiteSetting::find($id)->update([
                'logo' => $imgName,
                'website_name' => $request->website_name,
                'website_address' => $request->website_address,
                'phone' => $request->phone,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
        
            ]);

        } else {

            SiteSetting::find($id)->update([
                'website_name' => $request->website_name,
                'website_address' => $request->website_address,
                'phone' => $request->phone,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
        
            ]);

        } 


        $notfication =  array(
            'message' => 'Setting Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notfication);
    }   
}
