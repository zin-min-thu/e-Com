<?php
use Carbon\Traits\Rounding;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Route::resource('roles', 'RolesController', ['except' => ['edit', 'create']]);

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
    });
});
