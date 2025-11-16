<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Welcome\WelcomeController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Welcome\CartController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\MenusController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EcommerceController;
use App\Http\Controllers\Admin\OrdersController;


Route::get('/',[WelcomeController::class,'index'])->name('index');
Route::get('/image-view',[WelcomeController::class,'imageView'])->name('imageView');
Route::get('/image/{template?}/{image?}',[WelcomeController::class,'imageView2'])->name('imageView2');
Route::get('/sitemap.xml',[WelcomeController::class,'siteMapXml'])->name('siteMapXml');
Route::get('/search',[WelcomeController::class,'search'])->name('search');
Route::post('/contact-mail',[WelcomeController::class,'contactMail'])->name('contactMail');
Route::post('/subscribe',[WelcomeController::class,'subscribe'])->name('subscribe');
Route::get('/switch/{lang?}',[WelcomeController::class,'language'])->name('language');
Route::get('/geo/filter/{id}',[WelcomeController::class,'geo_filter'])->name('geo_filter');

Route::get('/product/category/{slug}',[WelcomeController::class,'productCategory'])->name('productCategory');
Route::get('/product/brand/{slug}',[WelcomeController::class,'productBrand'])->name('productBrand');
Route::get('/product/{slug}',[WelcomeController::class,'productView'])->name('productView');

Route::get('/blog/category/{slug}',[WelcomeController::class,'blogCategory'])->name('blogCategory');
Route::get('/blog/author/{id}/{slug}',[WelcomeController::class,'blogAuthor'])->name('blogAuthor');
Route::get('/blog/tag/{slug}',[WelcomeController::class,'blogTag'])->name('blogTag');
Route::get('/blog/archives/{slug}',[WelcomeController::class,'blogArchives'])->name('blogArchives');
Route::get('/blog/search',[WelcomeController::class,'blogSearch'])->name('blogSearch');
Route::get('/blog/{slug}',[WelcomeController::class,'blogView'])->name('blogView');
Route::post('/blog-comments/{slug}',[WelcomeController::class,'blogComments'])->name('blogComments');

Route::group(['middleware'=>['carts']], function(){
    //Cart Route Start
    Route::any('add-to-cart/{id}',[CartController::class,'addToCart'])->name('addToCart');
    Route::get('change-to-cart/{id}/{type}',[CartController::class,'changeToCart'])->name('changeToCart');
    Route::get('select-delivery-area/{id}',[CartController::class,'selectDeliveryArea'])->name('selectDeliveryArea');
    Route::get('carts',[CartController::class,'carts'])->name('carts');
    Route::any('checkout',[CartController::class,'checkout'])->name('checkout');
    Route::get('order-payment/{id}',[CartController::class,'orderPayment'])->name('orderPayment')->middleware('auth');
    Route::get('order-payment-send/{type}/{id}',[CartController::class,'orderPaymentSend'])->name('orderPaymentSend')->middleware('auth');
    Route::any('OrderTrack',[CartController::class,'OrderTrack'])->name('OrderTrack');
    Route::get('order-invoice/{invoice}',[CartController::class,'invoiceView'])->name('invoiceView');
    Route::get('wishlist-compare/update/{id}/{type}',[CartController::class,'wishlistCompareUpdate'])->name('wishlistCompareUpdate');
    Route::get('my-wishlist',[CartController::class,'myWishlist'])->name('myWishlist');
    Route::get('my-compare',[CartController::class,'myCompare'])->name('myCompare');
    Route::post('my-coupon-apply',[CartController::class,'couponApply'])->name('couponApply');
    Route::post('order-now/{id}',[CartController::class,'orderNow'])->name('orderNow');
});

//Auth Route Start
Route::group(['middleware'=>['authCheck']], function(){
    Route::any('/login',[AuthController::class,'login'])->name('login');
    Route::any('/forgot-password',[AuthController::class,'forgotPassword'])->name('forgotPassword');
    Route::get('/reset-password/{token}',[AuthController::class,'resetPassword'])->name('resetPassword');
    Route::post('/reset-password-check',[AuthController::class,'resetPasswordCheck'])->name('resetPasswordCheck');
    Route::any('/register',[AuthController::class,'register'])->name('register');
    Route::post('/log-out',[AuthController::class,'logout'])->name('logout');
});

Route::get('/{slug}',[WelcomeController::class,'pageView'])->name('pageView');

//Customer Route Group Start
Route::group(['prefix'=>'customer', 'as'=>'customer.','middleware'=>['auth','role:customer']], function(){
    Route::get('/dashboard',[CustomerController::class,'dashboard'])->name('dashboard');
    Route::get('/orders',[CustomerController::class,'orders'])->name('orders');
    Route::get('/reviews',[CustomerController::class,'reviews'])->name('reviews');
    Route::match(['get', 'post'], '/profile', [CustomerController::class, 'profile'])->name('profile');
    Route::match(['get', 'post'],'/change-password',[CustomerController::class,'changePassword'])->name('changePassword');
});


// Admin Route Group Start

Route::group(['prefix'=>'admin', 'as'=>'admin.','middleware'=>['auth','role:admin','permission']], function(){

Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::any('/my-profile',[AdminController::class,'myProfile'])->name('myProfile');

Route::get('/editor/{type}/{id}',[AdminController::class,'contentEditor'])->name('contentEditor');
Route::any('/editor-action/{action}/{id?}',[AdminController::class,'contentEditorAction'])->name('contentEditorAction');

// Medies Library Route
Route::get('/medies',[AdminController::class,'medies'])->name('medies');
Route::post('/medies-file-upload',[AdminController::class,'mediesFileUpload'])->name('mediesFileUpload');
Route::post('/medies/create',[AdminController::class,'mediesCreate'])->name('mediesCreate');
Route::match(['get','post'],'/medies/edit/{id}',[AdminController::class,'mediesEdit'])->name('mediesEdit');
Route::get('/medies/delete/{id}',[AdminController::class,'mediesDelete'])->name('mediesDelete');
// Medies Library Route End


//Page Management
Route::get('/pages',[AdminController::class,'pages'])->name('pages');
Route::any('/pages/{action}/{id?}',[AdminController::class,'pagesAction'])->name('pagesAction');
//Page Management End

// Posts Comments Route End
Route::get('/posts/comments/all',[PostsController::class,'postsCommentsAll'])->name('postsCommentsAll');
Route::get('/posts/comments/post/{id}',[PostsController::class,'postsComments'])->name('postsComments');
Route::any('/posts/comments/{action}/{id}',[PostsController::class,'postsCommentsAction'])->name('postsCommentsAction');
// Posts Comments Route End



// Posts Categories Route
Route::get('/posts/categories',[PostsController::class,'postsCategories'])->name('postsCategories');
Route::any('/posts/categories/{action}/{id?}',[PostsController::class,'postsCategoriesAction'])->name('postsCategoriesAction');
// Posts Categories Route End

// Posts Tags Route
Route::get('/posts/tags',[PostsController::class,'postsTags'])->name('postsTags');
Route::any('/posts/tags/{action}/{id?}',[PostsController::class,'postsTagsAction'])->name('postsTagsAction');
// Posts Tags Route End

// Posts Route
Route::get('/posts',[PostsController::class,'posts'])->name('posts');
Route::any('/posts/{action}/{id?}',[PostsController::class,'postsAction'])->name('postsAction');
// Posts Route End

// Ecommerce Setting Route
Route::get('/ecommerce/coupons',[EcommerceController::class,'ecommerceCoupons'])->name('ecommerceCoupons');
Route::any('/ecommerce/coupons/{action}/{id?}',[EcommerceController::class,'ecommerceCouponsAction'])->name('ecommerceCouponsAction');
Route::get('/ecommerce/setting',[EcommerceController::class,'ecommerceSetting'])->name('ecommerceSetting');
Route::any('/ecommerce/setting/{action}/{id?}',[EcommerceController::class,'ecommerceSettingAction'])->name('ecommerceSettingAction');
// Ecommerce Setting Route End

// Products Categories Route
Route::get('/products/categories',[EcommerceController::class,'productsCategories'])->name('productsCategories');
Route::any('/products/categories/{action}/{id?}',[EcommerceController::class,'productsCategoriesAction'])->name('productsCategoriesAction');
// Products Categories Route End

// Brands Route
Route::get('products/brands',[EcommerceController::class,'productsBrands'])->name('productsBrands');
Route::any('products/brands/{action}/{id?}',[EcommerceController::class,'productsBrandsAction'])->name('productsBrandsAction');
// Brands Route End

// Products Tags Route
Route::get('/products/tags',[EcommerceController::class,'productsTags'])->name('productsTags');
Route::any('/products/tags/{action}/{id?}',[EcommerceController::class,'productsTagsAction'])->name('productsTagsAction');
// Products Tags Route End

// Products Attributes Route
Route::get('/products/attributes',[EcommerceController::class,'productsAttributes'])->name('productsAttributes');
Route::any('/products/attributes/{action}/{id?}',[EcommerceController::class,'productsAttributesAction'])->name('productsAttributesAction');
Route::any('/products/attributes/item/{action}/{id}',[EcommerceController::class,'productsAttributesItemAction'])->name('productsAttributesItemAction');
// Products Attributes Route End

// Products Tags Route
Route::get('/products/reviews',[EcommerceController::class,'productsReview'])->name('productsReview');
Route::any('/products/reviews/{action}/{id?}',[EcommerceController::class,'productsReviewAction'])->name('productsReviewAction');
// Products Tags Route End

//Products Management
Route::get('/products',[EcommerceController::class,'products'])->name('products');
Route::any('/products/{action}/{id?}',[EcommerceController::class,'productsAction'])->name('productsAction');
Route::any('/products/update/ajax/{column}/{id}',[EcommerceController::class,'productsUpdateAjax'])->name('productsUpdateAjax');
//Products Management End


// Order Management Route End
Route::get('/orders/{status?}',[OrdersController::class,'orders'])->name('orders');
Route::any('/orders-manage/{action}/{id}',[OrdersController::class,'ordersAction'])->name('ordersAction');

Route::get('/pos-orders',[OrdersController::class,'posOrders'])->name('posOrders');
Route::any('/pos-orders/{action}/{id?}',[OrdersController::class,'posOrdersAction'])->name('posOrdersAction');

// Order Management Route End

// Posts Routes
Route::get('/clients',[AdminController::class,'clients'])->name('clients');
Route::any('/clients/{action}/{id?}',[AdminController::class,'clientsAction'])->name('clientsAction');
// Posts Route End

// Slider Route
Route::get('/sliders',[AdminController::class,'sliders'])->name('sliders');
Route::any('/sliders/{action}/{id?}',[AdminController::class,'slidersAction'])->name('slidersAction');
Route::any('/sliders/slide/{action}/{id}',[AdminController::class,'slideAction'])->name('slideAction');
// Slider Route End

// Gallery Route
Route::get('/galleries',[AdminController::class,'galleries'])->name('galleries');
Route::any('/galleries/{action}/{id?}',[AdminController::class,'galleriesAction'])->name('galleriesAction');
// Gallery Route End


// Theme Route
Route::get('/theme-setting',[AdminController::class,'themeSetting'])->name('themeSetting');
// Theme Route End

// Menus Route
Route::get('/menus',[MenusController::class,'menus'])->name('menus');
Route::any('/menus/config/{action}/{id?}',[MenusController::class,'menusAction'])->name('menusAction');
Route::post('/menus/items/post/{id}',[MenusController::class,'menusItemsPost'])->name('menusItemsPost');
Route::any('/menus/items/{action}/{id}',[MenusController::class,'menusItemsAction'])->name('menusItemsAction');
// Menus Route End


//User Management
Route::get('/users/admin/',[AdminController::class,'usersAdmin'])->name('usersAdmin');
Route::any('/users/admin/{action}/{id?}',[AdminController::class,'usersAdminAction'])->name('usersAdminAction');

Route::get('/users/customer/',[AdminController::class,'usersCustomer'])->name('usersCustomer');
Route::any('/users/customer/{action}/{id?}',[AdminController::class,'usersCustomerAction'])->name('usersCustomerAction');

Route::get('/users/roles',[AdminController::class,'userRoles'])->name('userRoles');
Route::any('/users/roles/{action}/{id?}',[AdminController::class,'userRoleAction'])->name('userRoleAction');

Route::get('/subscribes',[AdminController::class,'subscribes'])->name('subscribes');



// Apps Setting
Route::get('/setting/{type}',[AdminController::class,'setting'])->name('setting');
Route::post('/setting/{type}/update',[AdminController::class,'settingUpdate'])->name('settingUpdate');

});



// Route::get('/', function () {
//     return Inertia::render('welcome');
// })->name('home');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('dashboard', function () {
//         return Inertia::render('dashboard');
//     })->name('dashboard');
// });

// require __DIR__.'/settings.php';
// require __DIR__.'/auth.php';
