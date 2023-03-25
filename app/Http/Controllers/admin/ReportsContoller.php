<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsContoller extends Controller
{
    public function reportsView() {

        return view('backend.reports.reports_view');
    }
    public function searchResult(Request $request) {
        $date = Carbon::parse($request->order_date)->format('d F Y');

        $orders = Order::where('order_date',$date)->orderBy('id','DESC')->get();

        return view('backend.reports.report_date_search',compact('orders'));

    }

    public function searchMonthYear(Request $request) {

        $orders = Order::where('order_month',$request->order_month)
        ->where('order_year',$request->order_year)->orderBy('id','DESC')->get();

        return view('backend.reports.report_date_search',compact('orders'));
    }

    public function searchYear(Request $request) {

        $orders = Order::where('order_year',$request->order_year)->orderBy('id','DESC')->get();

        return view('backend.reports.report_date_search',compact('orders'));
    }
}
