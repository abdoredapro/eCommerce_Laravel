<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhishlistController extends Controller
{
    public function addToWishlist($product_id) {
        // if user is authanticate add product to wishlist
        if(Auth::check()) {

            $check = Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->latest()->first();
            if($check == NULL) {

                Wishlist::insert([
                    'user_id'=> Auth::id(),
                    'product_id'=> $product_id,
                    'created_at'=> Carbon::now(),
                ]);
                return response()->json([
                    'success'=> 'The Product Added To Wishlist',
                ]);

            } else {

                return response()->json([
                    'message'=> 'The Product Is Already Adedd!',
                ]);
            

            }


        } else {
            return response()->json([
                'message'=> 'You must Login First!',
            ]);
        }
    }

    public function showWishList() {
        return view('frontend.wishlist.wishlist_view');
    }
    public function getWishList() {
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();

        return response()->json($wishlist);
    }

    public function removeWishlist($product_id) {
        $info = Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->latest()->first();

        if($info !== null) {
            Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->delete();
            return response()->json([
                'message'=> 'The Product Deleted Successfully',
            ]);

        } else {

            return response()->json([
                'error'=> 'Error, Please Try Again',
            ]);

        }
        
    }

}

