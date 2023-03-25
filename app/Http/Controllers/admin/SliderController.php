<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function sliderManage() {
        $sliders = Slider::latest()->get();

        return view('backend.slider.slider_manage', compact('sliders'));
    }
    public function sliderStore(Request $request) {
        $request->validate([
            'slider_image' => 'required',
        ]);

        $img = $request->file('slider_image');
        $imgName = rand(1,2500) .'_' . $img->getClientOriginalName();
        Image::make($img)->resize(870,370)->save('upload/slider/'.$imgName);
        Slider::insert([
            'slider_image' => $imgName,
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $notfication =  array(
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notfication);
    }

    public function sliderInActive($id) {
        Slider::findOrFail($id)->update(['status'=>0]);

        $notfication =  array(
            'message' => 'Slider Not Active Now!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notfication);
    }

    public function SliderActive($id) {
        Slider::findOrFail($id)->update(['status'=>1]);

        $notfication =  array(
            'message' => 'Slider Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notfication);
    }
}