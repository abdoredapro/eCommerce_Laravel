<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\State;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CheckoutController extends Controller
{
    public function getDistrict($division_id) {
        $district = District::where('division_id',$division_id)->orderBy('id','DESC')->get();
        return json_decode($district);
    }

    public function getState($district) {
        $state = State::where('district_id',$district)->orderBy('id','DESC')->get();
        return json_decode($state);
    }

    public function checkoutStore(Request $request) {

        $request->validate([
            'payment_method'=> 'required', 
        ]);

        $data = array();
        $data['shippin_name'] = $request->shippin_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['note'] = $request->note;

    

        if($request->payment_method == 'card') {
            $cardTotal = Cart::total();
            return view('frontend.payment.stripe',compact('cardTotal','data'));
        }
        if($request->payment_method == 'cash') {
            $cardTotal = Cart::total();
            return view('frontend.payment.cash',compact('cardTotal','data'));
        }
    }
}
