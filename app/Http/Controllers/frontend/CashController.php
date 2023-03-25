<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CashController extends Controller
{
    public function cashStore(Request $request) {
          


        if(Session::has('coupon')) {
            $total = Session()->get('coupon')['total_amount'];
        } else {
            $total = Cart::total();
        } 

        $order_id = Order::insertGetId([
            'user_id'=> Auth::user()->id,
            'division_id'=> $request->division_id,
            'district_id'=> $request->district_id,
            'state_id'=> $request->state_id,
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'post_code'=> $request->post_code,
            'notes'=> $request->notes,
            'payment_type'=> 'Cash',
            'payment_method'=> 'Cash',
            'payment_type'=> 'Cash On Delivery',
            'transaction_id'=> rand(1,3125).'EN',
            'currency'=> 'usd',
            'amount'=>  $total,
            'order_number'=> rand(1,10000),
            'invoice_no'=> 'Nemr'. rand(1,100000000),
            'order_date'=> Carbon::now()->format('d F Y'),
            'order_month'=> Carbon::now()->format('F'),
            'order_year'=> Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at'=> Carbon::now(),
        ]);
        $order = Order::findOrFail($order_id);
        $data = [
            'invoice' =>$order->invoice_no,
            'amount' => $order->amount,
            'name' => $order->name,
            'email' => $order->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        $cartContent = Cart::content();

        foreach($cartContent as $cart) {
            if($cart->options->color == null || $cart->options->size == null ) {
                OrderItem::insert([
                    'order_id'=>$order_id,
                    'product_id'=>$cart->id,
                    'qty'=> $cart->qty,
                    'price' => $cart->price,
                    'created_at' => Carbon::now(),
                ]);
            } else {
                OrderItem::insert([
                    'order_id'=>$order_id,
                    'product_id'=>$cart->id,
                    'color'=> $cart->options->color,
                    'size' => $cart->options->size,
                    'qty'=> $cart->qty,
                    'price' => $cart->price,
                    'created_at' => Carbon::now(),
                ]);
            }
            
        }

        if(Session::has('coupon')) {
            session()->forget('coupon');
        }

        Cart::destroy();

        $notfication =  array(
            'message' => 'Payment Addedd Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('profile')->with($notfication);
    }
}
