<?php

namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Division;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request,$id) {

        $product = Product::findOrFail($id);

        // Cart::add([
        //     'id' => '293ad',
        //     'name' => 'Product 1',
        //     'qty' => 1,
        //     'price' => 9.99,
        //     'weight' => 550,
        //     'options' => ['size' => 'large']
        // ]);


        if($product->discount_price == null) {

            if(Session::has('coupon')) {
                Session::forget('coupon');
            }

            Cart::add([
            'id' => $id,
            'name' => $product->product_name_en,
            'qty' => $request->amount,
            'price' => $product->selling_price,
            'weight' => 1,
            'options' => ['size' =>$request->size,'color'=> $request->color,'img'=>$product->product_thambnail]
        ]);

            return response()->json(['success'=> 'Item Added Successfully']);
            

        } else {

            Cart::add([
                'id' => $id,
                'name' => $product->product_name_en,
                'qty' => $request->amount,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => ['size' =>$request->size,'color'=> $request->color,'img'=>$product->product_thambnail]
            ]);

            return response()->json(['success'=> 'Item Added Successfully']);

        }

        return response()->json(['success'=> 'Item Added Successfully']);


                

    }

    public function miniCart() {
        $content = Cart::content();
        $total = Cart::total();
        $count = Cart::count();
        $subtotal = Cart::subtotal();
        return response()->json([
            'content'=> $content,
            'total'=>round($total),
            'count'=>$count,
            'subtotal'=>$subtotal
        ]);
    }

    public function removeItem($id) {
        Cart::remove($id);
        return response()->json([
            'message' => 'Item Deleted Successfully',
        ]);
    }

    public function showCartPage() {
        return view('frontend.cart.cart_page_view');
    }

    public function myCartItem() {

        $cartItem = Cart::content();
        $totalAmount = Cart::total();
        $cartCount = Cart::count();
        $subtotal = Cart::subtotal();

        return response()->json([
            'content'=> $cartItem,
            'total'=>round($totalAmount),
            'count'=>$cartCount,
            'subtotal'=>$subtotal
        ]);

    }

    public function removingItem($product_id) {
        Cart::remove($product_id);
        if(Session::has('coupon')) {
            Session::forget('coupon');
        }
        return response()->json([
            'message' => 'Item Deleted Successfully',
        ]);
    }

    public function decrementAmount($rowId) {
        $row = Cart::get($rowId);
        if($row->qty == 1) {

        } else {
            if(Session::has('coupon')) {
                $coupon_name = session()->get('coupon')['coupon_name'];
                $coupon = Coupon::where('coupon_name',$coupon_name)->first();
                Session::forget('coupon');
                Session::put('coupon',[
                    'coupon_name' => $coupon->coupon_name,
                    'coupon_discount' => $coupon->coupon_discount,
                    'discount_amount' => Cart::total() * $coupon->coupon_discount/100,
                    'total_amount' => Cart::total() - Cart::total() * $coupon->coupon_discount/100,  
                ]);
            
            }

            $update = Cart::update($rowId, $row->qty - 1);
            return response()->json('success');
        }
    }
    public function incrementCart($rowId) {
        $row = Cart::get($rowId);

        if(Session::has('coupon')) {

            $coupon_name = session()->get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => Cart::total() * $coupon->coupon_discount/100,
                'total_amount' => Cart::total() - Cart::total() * $coupon->coupon_discount/100,  
            ]);
        
        }

    
    $update = Cart::update($rowId, $row->qty + 1);
    return response()->json('success');
    
    }

    public function applyCoupon(Request $request) {
      
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => Cart::total() * $coupon->coupon_discount/100,
                'total_amount' => Cart::total() - Cart::total() * $coupon->coupon_discount/100,  
            ]);
            return response()->json(array(
                'validity' => true,
                'success' => 'The Coupon Addedd Successfully',
            ));
            
        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }

    }


    public function calcCoupon() {
        if(Session::has('coupon')) {
            return response()->json([
                'subtotal' => Cart::total(),
                'coupon_name'=> Session()->get('coupon')['coupon_name'],
                'discount_amount'=>Session()->get('coupon')['discount_amount'],
                'total_amount'=> Session()->get('coupon')['total_amount'],
            ]);
        } else {
            return response()->json([
                'total' => Cart::total(),
            ]);

        }
    }

    public function checkView() {

        if(Auth::check()) {


            if(Cart::total() > 0) {
                $cartItem = Cart::content();
                $totalAmount = Cart::total();
                $cartCount = Cart::count();
                $division =  Division::orderBy('id','DESC')->get();

                return view('frontend.checkout.checkout_view',
                compact('cartItem','totalAmount','cartCount','division')
            );

            } else {

                $notfication =  array(
                    'message' => 'Your Cart Is empty',
                    'alert-type' => 'info'
                );
                return redirect()->to('/')->with($notfication);

            }

        } else {


            $notfication =  array(
                'message' => 'You must login first',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notfication);
            
        } // end first if



    } //  end method







}


