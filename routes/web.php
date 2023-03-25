<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\frontend\indexController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\DistrictController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ReportsContoller;
use App\Http\Controllers\admin\ReturnController;
use App\Http\Controllers\admin\SeoController;
use App\Http\Controllers\admin\ShippingDivisionController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\StockController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CashController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\invoiceController;
use App\Http\Controllers\frontend\ReviewController;
use App\Http\Controllers\frontend\StripeController;
use App\Http\Controllers\frontend\UserOrderController;
use App\Http\Controllers\User\WhishlistController;
use App\Models\District;
use App\Models\User;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

// ==================================================== Start Admin Auth ===============
// ==================================================== Start Admin Auth ===============    

Route::middleware(['auth:admin'])->group(function () { 

    // ============================= Start Reports =============================
Route::prefix('reports')->group(function () {
    
    Route::get('/view', 
    [ReportsContoller::class, 'reportsView'])->name('all.reports');

    Route::post('/search-store', 
    [ReportsContoller::class, 'searchResult'])->name('search-by-date');

    Route::post('/search-year-month', 
    [ReportsContoller::class, 'searchMonthYear'])->name('search-month-year');

    Route::post('/search-year', 
    [ReportsContoller::class, 'searchYear'])->name('search-year');
    
});
// ============================= end Reports ================================
    
    // ============================= start order ================================

Route::prefix('orders')->group(function () {

    Route::get('/pending/order', 
    [OrderController::class, 'pendingOrder'])->name('pending.order');

    Route::get('/pending/order/{id}', 
    [OrderController::class, 'pendingOrderView'])->name('pending.order.view');

    Route::get('/confirmed/order', 
    [OrderController::class, 'confirmedOrder'])->name('confirmed.order');

    Route::get('/processing/order', 
    [OrderController::class, 'processingOrder'])->name('processing.order');

    Route::get('/picked/order', 
    [OrderController::class, 'pickedOrder'])->name('picked.order');

    Route::get('/shipped/order', 
    [OrderController::class, 'shippedOrder'])->name('shipped.order');

    Route::get('/delivered/order', 
    [OrderController::class, 'deliveredOrder'])->name('delivered.order');

    Route::get('/cancel/order', 
    [OrderController::class, 'cancelOrder'])->name('cancel.order');

    // confirm order
    Route::get('/confirm/order/{id}', 
    [OrderController::class, 'confirmMyOrder'])->name('confirm.order');

    Route::get('/processing/order/{id}', 
    [OrderController::class, 'processingMyOrder'])->name('make.process');

    Route::get('/picked/order/{id}', 
    [OrderController::class, 'pickedMyOrder'])->name('make.picked');

    Route::get('/shipped/order/{id}', 
    [OrderController::class, 'shippedMyOrder'])->name('make.shipped');

    Route::get('/delivered/order/{id}', 
    [OrderController::class, 'delivedMyOrder'])->name('make.delivered');

    // invoice download 

    Route::get('/invoice/download/{id}', 
    [OrderController::class, 'downloadInvoice'])->name('invoice.down');
    
});

// ============================= end order =================================

Route::prefix('return')->group(function () {
    
    Route::get('/order', 
    [ReturnController::class, 'returnOrderApprove'])->name('manage.return_order');

    Route::get('/return/update/{id}', 
    [ReturnController::class, 'returnUpdate'])->name('return.approved');

    Route::get('/all', 
    [ReturnController::class, 'allReturnOrder'])->name('manage.all.order');

    
});



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth:admin');


    // admin route 

Route::get('admin/logout', 
[\App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.logout');
// admin route


Route::get('admin/profile', 
[AdminProfileController::class, 'profile'])->name('admin.profile');

Route::get('admin/profile/edit', 
[AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

Route::post('admin/profile/store', 
[AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

Route::get('admin/change/passowrd', 
[AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

Route::post('admin/password/update', 
[AdminProfileController::class, 'AdminUpdatePassword'])->name('admin.update.password');
// end admin route 
Route::prefix('users')->group(function () {
Route::get('/all', 
    [AdminProfileController::class, 'allUser'])->name('all.user');
});
// start brand route 
Route::prefix('brand')->group(function () {
    Route::get('/view', 
    [BrandController::class, 'brandView'])->name('brand.view');

    Route::post('/store', 
    [BrandController::class, 'brandStore'])->name('admin.brand.store');

    Route::get('/edit/{brandId}', 
    [BrandController::class, 'brandEdit'])->name('brand.edit');


    Route::post('/update/store', 
    [BrandController::class, 'brandUpdate'])->name('brand.updatee');

    Route::get('/brand/{brandId}/delete', 
    [BrandController::class, 'brandDelete'])->name('brand.delete');

});
// end brand route 
// start category 
Route::prefix('category')->group(function () {
    
    Route::get('/view', 
    [CategoryController::class, 'categoryView'])->name('admin.category.view');

    Route::post('/store', 
    [CategoryController::class, 'categoryStore'])->name('admin.category.store');

    Route::get('/edit/{catId}', 
    [CategoryController::class, 'catEdit'])->name('admin.cat.edit');

    Route::post('/update/category', 
    [CategoryController::class, 'catUpdate'])->name('cat.update');

    Route::get('/category/{catId}/delete', 
    [CategoryController::class, 'catDelete'])->name('cat.delete');


    // start sub categoory 
    Route::get('/sub/view', 
    [SubCategoryController::class, 'subView'])->name('admin.subCategory.view');

    Route::post('/sub/store', 
    [SubCategoryController::class, 'subCategoryStore'])->name('admin.subCategory.store');

    Route::get('/sub/{subId}/edit', 
    [SubCategoryController::class, 'subEdit'])->name('admin.subCategory.edit');

    Route::post('/sub/update', 
    [SubCategoryController::class, 'subCategoryUpdate'])->name('admin.subCategory.update');

    Route::get('/sub/{subId}/delete', 
    [SubCategoryController::class, 'subDelete'])->name('admin.sub.delete');

    // end sub categoory 


    // ------------------------ Sub Sub Category ----------------------------

    Route::get('/sub/sub/view', 
    [SubCategoryController::class, 'SubSubView'])->name('sub_subCategory.view');

    Route::get('/subCat/get/{category_id}', 
    [SubCategoryController::class, 'getSubCategory'])->name('get_Sub');

    Route::get('/sub/sub/get/{sub_cat}', 
    [SubCategoryController::class, 'getSubSub'])->name('get_sub_sb');



    Route::post('/sub/sub/store', 
    [SubCategoryController::class, 'SubSubStore'])->name('sub_subCategory.store');

    Route::get('/sub/sub/{subId}/', 
    [SubCategoryController::class, 'SubSubEdit'])->name('sub_subCategory.edit');

    Route::post('/sub/sub/update', 
    [SubCategoryController::class, 'SubSubUpdate'])->name('sub_subCate.store');

    Route::get('/sub/subDelete/{id}', 
    [SubCategoryController::class, 'SubSubDelete'])->name('sub_subCategory.delete');
});

// end category 

// ======================================= Start Products ==================================

Route::prefix('product')->group(function () {

    Route::get('/add', 
    [ProductController::class, 'addProduct'])->name('add.product');

    Route::post('/store', 
    [ProductController::class, 'productStore'])->name('product.store');

    Route::get('/manage', 
    [ProductController::class, 'manageProduct'])->name('manage.product');

    Route::get('/{id}/edit', 
    [ProductController::class, 'productEdit'])->name('product.edit');

    Route::post('/update', 
    [ProductController::class, 'productUpdate'])->name('product.update');

    Route::post('/multi/update', 
    [ProductController::class, 'multiImageUpdate'])->name('multi_image_update');

    Route::post('/single/update', 
    [ProductController::class, 'singleImageUpdate'])->name('single_image_update');

    Route::get('/multi/image/{id}', 
    [ProductController::class, 'multiImageDelete'])->name('multi_image_delete');

    Route::get('/product/inActive/{id}', 
    [ProductController::class, 'productInActive'])->name('product.in_active');

    Route::get('/product/active/{id}', 
    [ProductController::class, 'productActive'])->name('product.active');

    Route::get('/product/delete/{id}', 
    [ProductController::class, 'productDelete'])->name('product.delete');

});

// ======================================= End Products ==================================

// ======================================= Start Slider ==================================
Route::prefix('slider')->group(function () {

    Route::get('/manage', 
    [SliderController::class, 'sliderManage'])->name('manage.slider');

    Route::post('/slider/store', 
    [SliderController::class, 'sliderStore'])->name('slider.store');

    Route::get('/slider/{id}', 
    [SliderController::class, 'sliderInActive'])->name('slider.in_active');

    Route::get('/slider/active/{id}', 
    [SliderController::class, 'SliderActive'])->name('slider.active');

    Route::post('/update/store', //1
    [BrandController::class, 'brandUpdate'])->name('brand.update');

    Route::get('/brand/{brandId}/delete', 
    [BrandController::class, 'brandDelete'])->name('brand.deletee'); // end slider

});
// ======================================= End Slider ====================================
    Route::prefix('stock')->group(function () {
        Route::get('/product', 
        [StockController::class, 'StockView'])->name('product.stock');
    });


    Route::prefix('review')->group(function () {
    
        Route::get('/pending', 
        [ReviewController::class, 'pendingreview'])->name('manage.review');

        Route::get('/approve/{id}', 
        [ReviewController::class, 'approveRev'])->name('approve.rev');
        
    });


    // start coupon for admin 
Route::prefix('coupon')->group(function () {

    Route::get('/manage', 
    [CouponController::class, 'couponManage'])->name('manage.coupon');

    Route::post('/store', 
    [CouponController::class, 'couponStore'])->name('coupon.store');

    Route::get('/edit/{id}', 
    [CouponController::class, 'couponEdit'])->name('coupon.edit');

    Route::post('/update/{id}', 
    [CouponController::class, 'couponUpdate'])->name('coupon.update');

    Route::get('/delete/{id}', 
    [CouponController::class, 'couponDelete'])->name('coupon.delete');

});
// end coupon for admin


// start shipping area 
Route::prefix('shipping')->group(function () {

    Route::get('/manage', 
    [ShippingDivisionController::class, 'divisionManage'])->name('manage.division');

    Route::post('/store', 
    [ShippingDivisionController::class, 'divisionStore'])->name('division.store');

    Route::get('/edit/{id}', 
    [ShippingDivisionController::class, 'divisionEdit'])->name('division.edit');

    Route::post('/update/{id}', 
    [ShippingDivisionController::class, 'divisionUpdate'])->name('division.update');

    Route::get('/delete/{id}', 
    [ShippingDivisionController::class, 'divisionDelete'])->name('division.delete');

    // start district ====================================

    Route::get('/manage/district', 
    [ShippingDivisionController::class, 'districtManage'])->name('manage.district');

    Route::post('/district/store', 
    [ShippingDivisionController::class, 'districtStore'])->name('district.store');

    Route::get('/district/edit/{id}', 
    [ShippingDivisionController::class, 'districtEdit'])->name('district.edit');

    Route::post('/district/update/{id}', 
    [ShippingDivisionController::class, 'districtUpdate'])->name('district.update');

    Route::get('/district/delete/{id}', 
    [ShippingDivisionController::class, 'districtDelete'])->name('district.delete');
    // End district ======================================
    // =========================== Start State ===========================
    Route::get('/manage/state', 
    [ShippingDivisionController::class, 'stateManage'])->name('manage.state');

    Route::post('/state/store', 
    [ShippingDivisionController::class, 'stateStore'])->name('state.store');

    Route::get('/state/edit/{id}',
    [ShippingDivisionController::class, 'stateEdit'])->name('state.edit');

    Route::post('/state/update/{id}', 
    [ShippingDivisionController::class, 'stateUpdate'])->name('state.update');

    Route::get('/state/delete/{id}', 
    [ShippingDivisionController::class, 'stateDelete'])->name('state.delete');
    // ============================ End State ===========================
});
// end shipping area 




// ==================================================== Start Admin Auth ===============
// ==================================================== Start Admin Auth ===============  
}); // end auth






Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);

    return view('dashboard',compact('user'));
})->name('profile');


// start frontend route

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::get('/sad', function () {
        return 'sad';
    });

    
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
    
    Route::get('/', [indexController::class, 'index'])->name('home');
    
});


// end frontend route


// start product details 
Route::get('detail/{id}/{slug}', 
    [indexController::class, 'details'])->name('product.detail');

Route::get('product/tags/{tag}', 
[indexController::class, 'getProductByTag'])->name('product.tags');

Route::get('product/{id}/{sub_slug}', 
[indexController::class, 'getProductSub'])->name('show.product.subCategory');

Route::get('category/{id}/{sub_slug}', 
[indexController::class, 'getSubSub'])->name('show.product.subsub');

Route::get('/get/product/{id}', 
[indexController::class, 'getProductAjax'])->name('get.product.ajax');


Route::post('/product/cart/{id}', 
[CartController::class, 'addToCart']);


Route::get('/mini/cart/get', 
[CartController::class, 'miniCart']);

Route::get('/remove/item/cart/{id}', 
[CartController::class, 'removeItem']);




Route::post('/add-to-whishlist/{product_id}', 
[WhishlistController::class, 'addToWishlist']);


// start wish list 


Route::group(['prefix'=>'user','middleware'=>['user','auth']],function () {

    
Route::get('/user/logout', [indexController::class, 'userLogout'])->name('user.logout');

Route::get('/user/profile', [indexController::class, 'userEditProfile'])->name('user.profile');
Route::post('/user/update', [indexController::class, 'userProfileUpdate'])->name('user.profile.store');

Route::get('/user/password/change', [indexController::class, 'userChangePass'])->name('user.pass.change');
Route::post('/user/password/save', [indexController::class, 'userPassStore'])->name('user.pass.store');


    Route::get('/wishlist', 
    [WhishlistController::class, 'showWishList'])->name('wishlist');

    Route::get('/get-wish-list', 
    [WhishlistController::class, 'getWishList']);

    Route::get('/remove-wishlist/{product_id}', 
    [WhishlistController::class, 'removeWishlist']);

    // start show my cart page


    Route::get('/my-order', 
    [UserOrderController::class, 'myOrderView'])->name('my.order');    
    
    Route::get('/order/{id}/details', 
    [UserOrderController::class, 'orderDetails'])->name('order.view');   

    Route::get('/order/{id}/invoice', 
    [invoiceController::class, 'downloadInvoice'])->name('invoice.download');   

    Route::post('/return/order/{order_id}', 
    [UserOrderController::class, 'userReturnOrder'])->name('user.return.order');   
    

    Route::get('/order/return/all', 
    [UserOrderController::class, 'myReturnOrder'])->name('my.return_order');

    Route::get('/order/cancel/all', 
    [UserOrderController::class, 'myCancelOrder'])->name('my.canceld_order');


    
    Route::get('/order/track/{order_id}', 
    [OrderController::class, 'trackOrder'])->name('order.track');



        Route::get('/checkout', 
        [CartController::class, 'checkView'])->name('checkout');

        Route::get('/checkout/district/get/{division_id}', 
        [CheckoutController::class, 'getDistrict']);

        Route::get('/state/get/{district}', 
        [CheckoutController::class, 'getState']);

    Route::POST('/checkout/store', 
    [CheckoutController::class, 'checkoutStore'])->name('checkout.store');

    Route::post('/stripe/store', 
    [StripeController::class, 'StripeController'])->name('stripe.store');

    Route::post('/cash/store', 
    [CashController::class, 'cashStore'])->name('cash.store');



});

Route::get('/mycart', 
[CartController::class, 'showCartPage'])->name('my-cart');

Route::get('/get-cart-page', 
[CartController::class, 'myCartItem']);

Route::get('/remove-car-item/{product_id}', 
[CartController::class, 'removingItem']);

Route::get('/cart-decrement/{rowId}', 
[CartController::class, 'decrementAmount']);

Route::get('/cart-increment/{rowId}', 
[CartController::class, 'incrementCart']);



Route::post('/coupon/apply', 
    [CartController::class, 'applyCoupon'])->name('apply.coupon');

Route::get('/calc-coupon', 
[CartController::class, 'calcCoupon'])->name('cal.coupon');
// start apply coupon 


// ============================= Start Setting ================================

Route::prefix('setting')->group(function () {
    
    Route::get('/site', 
    [SiteSettingController::class, 'siteSetting'])->name('site.setting.manage');

    Route::post('/site/update/{id}', 
    [SiteSettingController::class, 'siteSettingUpdate'])->name('site.setting.update');

    Route::get('/seo', 
    [SeoController::class, 'seoSetting'])->name('seo.setting.manage');

    Route::post('/seo/update/{id}', 
    [SeoController::class, 'seoSettingUpdate'])->name('seo.setting.update');


    
});
// ============================= end Setting ================================




Route::post('/add/review/{product_id}', 
[ReviewController::class, 'reviewStore'])->name('review.store');


Route::post('/search', 
[ProductController::class, 'search'])->name('search.result');

Route::post('/advanced-search', 
[ProductController::class, 'getProducts'])->name('get-product');

Route::get('/get',function () {
    echo __DIR__;
});



