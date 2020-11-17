<?php
use Carbon\Traits\Rounding;
use App\Category;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Admin')->group(function() {
    Route::match(['get','post'],'/', 'AdminController@login');
    Route::group(['middleware' => 'admin'], function() {
        // Admin routes
        Route::get('dashboard', 'AdminController@dashboard');
        Route::get('settings', 'AdminController@setting');
        Route::get('logout', 'AdminController@logout');
        Route::post('check-current-password', 'AdminController@checkCurrentPassword');
        Route::post('update-current-password', 'AdminController@updateCurrentPassword');
        Route::match(['get','post'],'update-detail', 'AdminController@updateDetail');

        //Section routes
        Route::resource('sections', 'SectionController', ['only' => ['index']]);
        Route::post('update-section-status', 'SectionController@updateSectionStatus');
        
        //Brands routes
        Route::resource('brands', 'BrandController', ['except' => ['destroy']]);
        Route::get('delete-brand/{brand}', 'BrandController@deleteBrand');
        Route::post('update-status-brand', 'BrandController@updateStatusBrand');

        //Cagegory routes
        Route::resource('categories', 'CategoryController', ['except' => ['destroy']]);
        Route::post('update-category-status', 'CategoryController@updateCategoryStatus');
        Route::post('append-category-level', 'CategoryController@appendCategoryLevel');
        Route::get('delete-category/{category}', 'CategoryController@deleteCategory');
        Route::get('delete-category-image/{category}', 'CategoryController@deleteCategoryImage');

        //Product routes
        Route::resource('products', 'ProductController', ['except' => ['destroy']]);
        Route::post('update-product-status', 'ProductController@updateProductStatus');
        Route::get('delete-product/{product}', 'ProductController@deleteProduct');
        Route::get('delete-product-image/{product}', 'ProductController@deleteProductImage');
        Route::get('delete-product-video/{product}', 'ProductController@deleteProductVideo');

        //Product Attribute routes
        Route::match(['get','post'], '/products/{product}/add-attribute', 'ProductController@addProductAttribute');
        Route::patch('products/{product}/update-attribute', 'ProductController@updateProductAttribute');
        Route::get('delete-product-attribute/{id}', 'ProductController@deleteProductAttribute');
        Route::post('update-status-attribute', 'ProductController@updateStatusAttribute');

        //Product Images routes
        Route::match(['get','post'], '/products/{product}/add-images', 'ProductImageController@addImage');
        Route::post('update-status-product-image', 'ProductImageController@updateStatus');
        Route::get('delete-product-images/{id}', 'ProductImageController@deleteImages');

        //Bunner routes
        Route::resource('bunners', 'BunnerController', ['except' => ['destroy','show']]);
        Route::post('update-status-bunner', 'BunnerController@updateStatus');
        Route::get('delete-bunner/{bunner}', 'BunnerController@delete');
        Route::get('delete-bunner-image/{bunner}', 'BunnerController@deleteImage');
    });
});

Route::namespace('Front')->group(function() {

    Route::get('/', 'IndexController@index');

    //Listing/Cagetory routes
    $urls = Category::select('url')->where('status',1)->pluck('url')->toArray();
    foreach($urls as $url) {
        Route::get('/'.$url, 'ProductController@listing');
    }

    //Product detail routes
    Route::get('product/{id}', 'ProductDetailController@detail');
    Route::post('change-product-price', 'ProductDetailController@changePrice');

    //Cart routes
    Route::post('add-to-cart', 'CartController@addToCart');
    Route::get('/cart', 'CartController@cart');
    Route::post('update-cart-quantity', 'CartController@updateCartQuantity');
});