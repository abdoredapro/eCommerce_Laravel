<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class invoiceController extends Controller
{
    public function downloadInvoice($id) {
        $order = Order::where('id',$id)->where('user_id',Auth::user()->id)->first();
        $orderItem = OrderItem::where('order_id',$id)->get();
        // $product = Product::where('id', )

        $pdf = PDF::loadView('frontend.orders.invoice', compact('order','orderItem'))
        ->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

    }
}
