<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Front\CompareController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\ProductsController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\WishlistController;
use App\Models\Section;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Route;

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

//Route::get('/user', function () {
//    $sections=Section::with('categories')->where('status',1)->get();
//
//    return view('front.user.register',compact('sections'));
//});



Route::namespace('Front')->group(function (){
    //Home Page Route
    Route::get('/',[IndexController::class,'index']);
    //Listing Categories  Product Route
    //Get Category Url's **this ways Prevent url which is not defined and send undefined url to 404 page
    //in productcontrooler should route with this ways
    $catUrls=\App\Models\Category::select('url','status')->where('status',1)->get()->pluck('url');
    foreach ($catUrls as $url){
        Route::get('/'.$url,[ProductsController::class,'listing']);
    }
    Route::get('/shop',[ProductsController::class,'shop'])->name('shop');
    Route::post( '/checkout-store', [ProductsController::class,'checkout']);
    //Comment
    Route::post('/comment-store/{id}',[ProductsController::class,'comment']);
    //Search
    Route::get('/search',[ProductsController::class,'search'])->name('search');
    //Brand
    Route::get('/brand/{brand}',[ProductsController::class,'brand']);
    //Detail Product Route
    Route::get('/product/{product}',[ProductsController::class,'detail']);
    //Get Product Price
    Route::post('/get-product-price',[ProductsController::class,'productPrice']);
    //Add To Cart
    Route::post('/add_to_cart',[ProductsController::class,'addToCart']);
    //Shopping Cart
    Route::get('/cart',[ProductsController::class,'Cart']);
    //Update Cart Item Quantity
    Route::post('/update-cart-item-qty',[ProductsController::class,'updateCartQty']);
    //Delete Cart Item
    Route::get('/delete-cart/{cart}',[ProductsController::class,'deleteCartItem']);
    //Register page Route
    Route::middleware('guest')->get('/register',[UserController::class,'register']);
    Route::middleware('guest')->post('/register-store',[UserController::class,'registerUser']);
    //Check email if already exist by jquery validate
    Route::match(['get','post'],'/check-email',[UserController::class,'checkEmail']);
    //Login page Route
    Route::middleware('guest')->get('/login',[UserController::class,'login'])->name('login');
    Route::middleware('guest')->post('/login-store',[UserController::class,'loginUser']);
    //Log Out Route
    Route::get('/logout',[UserController::class,'logout']);
    //Compare Route
    Route::get('/compare',[CompareController::class,'compare']);
    Route::post('/product/compare',[CompareController::class,'compareStore']);
    Route::get('/delete-compare/{compare}',[CompareController::class,'deleteCompareItem']);
    //Compare Route
    Route::get('/wishlist',[WishlistController::class,'wishlist']);
    Route::post('/product/wishlist',[WishlistController::class,'wishlistStore']);
    Route::get('/delete-wishlist/{wishlist}',[WishlistController::class,'deleteWishlistItem']);
    //Confirm Account
    Route::match(['get','post'],'/confirm/{code}',[UserController::class,'confirmAccount']);
    //Password Forgot
    Route::match(['get','post'],'/forgot-password',[UserController::class,'forgotPassword']);

    //Account Route
    Route::prefix('/account')->namespace('Dashboard')->group(function () {
        Route::middleware('auth')->group(function (){
            Route::get('/', [UserController::class, 'dashboard'])->name('account');
            Route::match(['get','post'],'/information', [UserController::class, 'InfoUser'])->name('information');
            Route::get('/user-comment', [UserController::class, 'userComment'])->name('userComment');
        });
    });
});

Route::prefix('/admin')->namespace('Admin')->group(function (){
         Route::match(['get','post'],'/login',[AdminController::class,'login']);
     Route::group(['middleware'=>['admin']],function () {
        Route::get('/dashboard', [AdminController::class,'dashboard']);
         Route::get('/logout', [AdminController::class,'logout']);
         Route::get('/setting', [AdminController::class,'setting']);
         //check admin pwd
         Route::post('/check-current-pwd', [AdminController::class,'checkCurrentPwd']);
         Route::post('/update-psw', [AdminController::class,'update_psw']);
         Route::match(['get','post'],'/update-admin', [AdminController::class,'update_admin']);
         //Section Route
         Route::get('/section', [SectionController::class,'index']);
         Route::post('/update-section-status', [SectionController::class,'updateSectionStatus']);
         //Brand Route
         Route::get('/brand', [BrandController::class,'index']);
         Route::post('/update-brand-status', [BrandController::class,'updateBrandStatus']);
         Route::match(['get','post'],'/add-edit-brand/{brand?}', [BrandController::class,'addEditBrand']);
         Route::get('/delete-brand/{brand}', [BrandController::class,'deleteBrand']);
         //Coupon Route
         Route::get('/coupon', [CouponController::class,'index']);
         Route::post('/update-coupon-status', [CouponController::class,'updateCouponStatus']);
         Route::match(['get','post'],'/add-edit-coupon/{coupon?}', [CouponController::class,'addEditCoupon']);
         Route::get('/delete-coupon/{coupon}', [CouponController::class,'deleteCoupon']);
         //Category Route
         Route::get('/category', [CategoryController::class,'index']);
         Route::post('/update-category-status', [CategoryController::class,'updateCategoryStatus']);
         Route::match(['get','post'],'/add-edit-category/{category?}', [CategoryController::class,'addEditCategory']);
         Route::post('/category-level', [CategoryController::class,'appendCategoryLevel']);
         Route::get('/delete-category-image/{category}', [CategoryController::class,'deleteCategoryImage']);
         Route::get('/delete-category/{category}', [CategoryController::class,'deleteCategory']);
         //Product Route
         Route::get('/product', [ProductController::class,'index']);
         Route::post('/update-product-status', [ProductController::class,'updateProductStatus']);
         Route::get('/delete-product/{product}', [ProductController::class,'deleteProduct']);
         Route::match(['get','post'],'/add-edit-product/{product?}', [ProductController::class,'addEditProduct']);
         Route::get('/delete-product-video/{product}', [ProductController::class,'deleteProductVideo']);
         //Attribute Route
         Route::match(['get','post'],'/add-attributes/{product}', [ProductController::class,'addAttribute']);
         Route::post('/edit-attributes/{product}', [ProductController::class,'editAttributes']);
         Route::post('/update-attribute-status', [ProductController::class,'updateAttributeStatus']);
         Route::get('/delete-attribute/{id}', [ProductController::class,'deleteAttribute']);
         //images
         Route::match(['get','post'],'/add-images/{id}', [ProductController::class,'addImages']);
         Route::post('/update-image-status', [ProductController::class,'updateImageStatus']);
         Route::get('/delete-image/{id}', [ProductController::class,'deleteImage']);
         //General
         Route::get('/general', [SettingController::class,'general']);
         Route::post('general/update/{id}', [SettingController::class,'updateGeneral']);
         //Banner
         Route::get('/banner', [BannerController::class,'banner']);
         Route::post('/update-banner-status', [BannerController::class,'updateBannerStatus']);
         Route::match(['get','post'],'/add-edit-banner/{banner?}', [BannerController::class,'addEditBanner']);
         Route::get('/delete-banner/{banner}', [BannerController::class,'deleteBanner']);




     });
});
