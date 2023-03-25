<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function returnOrderApprove() {
        $orders = Order::where('return_order', 1)->orderBy('id','ASC')->get();
        return view('backend.return_order.return_approve',compact('orders'));

    }

    public function returnUpdate($id) {
        Order::find($id)->update(['return_order'=> 2]);

        $notfication =  array(
            'message' => 'Return Approved Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notfication);
    }

    public function allReturnOrder() {
        $orders = Order::where('return_order', 2)->orderBy('id','ASC')->get();
        return view('backend.return_order.approved_order',compact('orders'));
    }
}
