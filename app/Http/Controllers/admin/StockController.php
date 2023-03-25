<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function StockView() {
        $allProduct = Product::latest()->get();

        return view('backend.stock.product_stock', compact('allProduct'));
    }
}
