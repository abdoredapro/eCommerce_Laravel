<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CouponController extends Controller
{
    public function couponManage() {
        $coupon =  Coupon::orderBy('id','DESC')->latest()->get();
        return view('backend.coupon.coupon_view',compact('coupon'));

    }
    public function couponStore(Request $request) {
        $request->validate([
            'coupon_name'=>'required',
            'coupon_discount'=>'required',
            'coupon_validity'=>'required',
        ]);

        Coupon::insert([
            'coupon_name'=> strtoupper($request->coupon_name),
            'coupon_discount'=> $request->coupon_discount,
            'coupon_validity'=> $request->coupon_validity,
            'created_at'=> Carbon::now(),
        ]);

        $notfication =  array(
            'message' => 'Coupon Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notfication);

    }

    public function couponEdit($id) {
        $coupon = Coupon::findOrFail($id);

        return view('backend.coupon.coupon_edit',compact('coupon'));
    }

    public function couponUpdate(Request $request,$id) {
        Coupon::findOrFail($id)->update([
            'coupon_name'=> strtoupper($request->coupon_name),
            'coupon_discount'=> $request->coupon_discount,
            'coupon_validity'=> $request->coupon_validity,
            'created_at'=> Carbon::now(),
        ]);

        $notfication =  array(
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.coupon')->with($notfication);

    }

    public function couponDelete($id) {
        Coupon::findOrFail($id)->delete();
        $notfication =  array(
            'message' => 'Coupon deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notfication);
    }
}
