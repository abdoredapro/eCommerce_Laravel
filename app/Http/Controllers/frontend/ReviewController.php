<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function reviewStore(Request $request,$product_id) {
        $request->validate([
            'comment' => 'required',
            'quality' =>'required',
        ]);
        Review::insert([
            'product_id' => $product_id,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment,
            'star' => $request->quality,
            'created_at' => Carbon::now(),
        ]);
        $notfication =  array(
            'message' => 'Comment Is Pendding',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notfication);
    }

    public function  pendingreview() {
        $reviews = Review::where('status', 0)->get();
        return view('backend.review.pending_review' ,compact('reviews'));
    }

    public function approveRev($id) {
        Review::findOrFail($id)->update(['status'=> 1]);
        $notfication =  array(
            'message' => 'Comment Approved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notfication);
    }
}
