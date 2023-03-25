<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Multi_Image;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class indexController extends Controller
{
    public function index() {
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();

        $featured = Product::where('status',1)->where('featured',1)->orderBy('id','DESC')->limit(6)->get();

        $hotProducts = Product::where('status',1)->where('hot_deals',1)->
        where('discount_price','!=',null)->orderBy('id','DESC')->limit(6)->get();

        $speacial = Product::where('status',1)->where('speacial_offer',1)->orderBy('id','DESC')->limit(6)->get();

        $speacialDeal = Product::where('status',1)->where('speacial_deals',1)->orderBy('id','DESC')->limit(6)->get();

        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();

        $categories = Category::latest()->orderBy('category_name_en','ASC')->get();

        $skip_category_0 = Category::skip(0)->first();

        $skip_product_0 = Product::where('status','1')
        ->where('category_id',$skip_category_0->id)
        ->orderBy('id','DESC')->limit(6)->get();


        $skip_category_1= Category::skip(1)->first();

        $skip_product_1 = Product::where('status','1')
        ->where('category_id',$skip_category_1->id)
        ->orderBy('id','DESC')->limit(6)->get();

        $best_seller = OrderItem::groupBy('product_id')->select('product_id')->get();

        return view('frontend.index',
        compact('categories','sliders','products','featured','hotProducts','speacial',
        'speacialDeal','skip_category_0','skip_product_0','skip_category_1','skip_product_1',
        'best_seller'
        )
    );
    }
    public function userLogout() {
        Auth::logout();
        return redirect() -> route('login');
        
    }
    public function userEditProfile() {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.edit_profile',compact('user'));
    }
    public function userProfileUpdate(Request $request) {
        
        $data = User::find(Auth::user()->id);
        $data ->name = $request ->name;
        $data ->email = $request ->email;
        $data ->phone = $request ->email;
        if($request->file('image')) {
            // get file from request
            $file = $request->file('image');
            if(!empty($data->profile_photo_path)) {
                unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            }
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
            // dd($filename);
        }
        $data->save();
        $notfication =  array(
            'message' => 'Done Edit',
            'alert-type' => 'Admin Profile Update Successfully'
        );
        return redirect() ->route('profile')->with($notfication);
    }

    public function userChangePass() {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password',compact('user'));
    }
    public function userPassStore(Request $request) {

        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $userOldPass = User::find(Auth::user()->id)->password;

        if(Hash::check($request->current_password, $userOldPass)) {
            $userData = User::find(Auth::user()->id);
            $userData->password = Hash::make($request ->password);
            $userData->save();
            Auth::logout();
            return redirect() ->route('profile');
        } else {
            return 'wrong';
        }
    }

    public function details($id,$slug) {
        $product = Product::findOrFail($id);
        $Images = Multi_Image::where('product_id',$id)->get();
        $review = Review::where('product_id',$id)->where('status', 1)->get();
        if($product->product_size_en !== null) {
            $size = explode(',',$product->product_size_en);
            
        } else {
            $size = '';
        }
        if($product->product_color_en !== null) {
            $color = explode(',',$product->product_color_en);

        } else {
            $color = '';
        }

        $cate = $product->category_id;
        $relatedProduct = Product::where('category_id',$cate)
        ->where('id','!=',$id)->where('status',1)->orderBy('product_name_en','ASC')->get();



        return view('frontend.detail',
        compact('product','Images','size','color','relatedProduct', 'review'));

    }



    public function getProductByTag($tag)  {

        $productInfo = Product::where('status',1)->where('product_tags_en',$tag)
        ->orderBy('product_name_en','ASC')->paginate(5);

        $categories = Category::latest()->orderBy('category_name_en','ASC')->get();

        return view('frontend.tags.tag_view',compact('productInfo','tag','categories'));



    }


    public function getProductSub($id,$sub_slug) {

        $productInfo = Product::where('status',1)->where('Subcategory_id',$id)
        ->orderBy('product_name_en','ASC')->paginate(1);

        $tag = 'Product';

        $categories = Category::latest()->orderBy('category_name_en','ASC')->get();

        return view('frontend.tags.tag_view',compact('productInfo','tag','categories'));

    }

    public function getSubSub($id,$sub_slug) {
        $productInfo = Product::where('status',1)->where('SubSubCategory_id',$id)
        ->orderBy('product_name_en','ASC')->paginate(5);

        $tag = 'Product';

        $categories = Category::latest()->orderBy('category_name_en','ASC')->get();

        return view('frontend.tags.tag_view',compact('productInfo','tag','categories'));

    }

    public function getProductAjax($id) {

        $product = Product::with('category','brand')->findOrFail($id);


        // if($product->product_size_en !== null) {
                //     $size = explode(',',$product->product_size_en);
                    
                // } else {
                //     $size = '';
        // }
        $size =  explode(',',$product->product_size_en);
        $color =  explode(',',$product->product_color_en);
    
        return response()->json(array(
            'product'=> $product,
            'size'=> $size,
            'color'=> $color,

        ));

    }



}
