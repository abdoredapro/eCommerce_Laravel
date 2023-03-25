<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserOrderController extends Controller
{
    public function myOrderView() {

        $orders = Order::where('user_id',Auth::user()->id)->orderBy('id','ASC')->get();
        
        return view('frontend.orders.order',compact('orders'));

    }

    public function orderDetails($id) {
        $order = Order::where('id',$id)->where('user_id',Auth::user()->id)->first();
        $orderItem = OrderItem::where('order_id',$id)->get();

        return view('frontend.orders.order_details',compact('order','orderItem'));
    }

    public function userReturnOrder(Request $request,$order_id) {
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_order' => 1,
            'return_reason' =>$request->return_reason,
        ]);
        $notfication =  array(
            'message' => 'The request Applied Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('my.order')->with($notfication);
    }

    public function myReturnOrder() {
        $orders = Order::where('return_reason','!=',null)->where('user_id',Auth::user()->id)->get();

        return view('frontend.orders.return_order',compact('orders'));
    }

    public function myCancelOrder() {
        $orders = Order::where('status','cancel')->where('user_id',Auth::user()->id)->get();

        return view('frontend.orders.cancel_order',compact('orders')); 
    }
}
