<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function pendingOrder() {
        $pendingOrder = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending_order',compact('pendingOrder'));
    }
    public function pendingOrderView($id) {
        $order = Order::where('id',$id)->first();
        $orderItem = OrderItem::where('order_id',$id)->get();

        return view('backend.orders.pending_order_details',compact('order','orderItem'));
    }

    public function confirmedOrder() {
        $confirmed = Order::where('status','confirmed')->orderBy('id','DESC')->get();
        return view('backend.orders.confirmed_order',compact('confirmed'));
    }

    public function processingOrder() {
        $processing = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing_order',compact('processing'));
    }

    public function pickedOrder() {
        $picked = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('backend.orders.picked_order',compact('picked'));
    }

    public function shippedOrder() {
        $shipped = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('backend.orders.shipped_order',compact('shipped'));
    }

    public function deliveredOrder() {
        $delivered = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered_order',compact('delivered'));
    }
    public function cancelOrder() {
        $cancel = Order::where('status','cancel')->orderBy('id','DESC')->get();
        return view('backend.orders.cancel_order',compact('cancel'));
    }

    // start confirm order 
    public function confirmMyOrder($id) {
        Order::findOrFail($id)->update(['status'=> 'confirmed']);

        $notfication =  array(
            'message' => 'Order Confirmed Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('pending.order')->with($notfication);

    } 

    public function processingMyOrder($id) {
        Order::findOrFail($id)->update(['status'=> 'processing']);

        $notfication =  array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('confirmed.order')->with($notfication);
    }

    public function pickedMyOrder($id) {
        Order::findOrFail($id)->update(['status'=> 'picked']);

        $notfication =  array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('processing.order')->with($notfication);
    }

    public function shippedMyOrder($id) {

        Order::findOrFail($id)->update(['status'=> 'shipped']);

        $notfication =  array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('picked.order')->with($notfication);
    }

    public function delivedMyOrder($id) {

        $orderItem = OrderItem::Where('order_id', $id)->get();
        
        foreach($orderItem as $item) {
            $product = Product::findOrFail($item->product_id);
            Product::findOrFail($item->product_id)->update([
                'product_amount' => $product->product_amount - $item->qty,
            ]);
        }
        
        
        Order::findOrFail($id)->update(['status'=> 'delivered']);

        $notfication =  array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('shipped.order')->with($notfication);
    }

    public function downloadInvoice($id) {
        $order = Order::where('id',$id)->first();
        $orderItem = OrderItem::where('order_id',$id)->get();

        
        $pdf = PDF::loadView('frontend.orders.invoice', compact('order','orderItem'))
        ->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

    // track order for users

    public function trackOrder($order_id) {
        $order = Order::where('id',$order_id)->where('user_id', Auth::user()->id)->first();
        if(empty($order)) {
            abort(404);
        }
        return view('frontend.track.track_order', compact('order')); 
    }
} 
