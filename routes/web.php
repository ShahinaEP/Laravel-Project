<?php

use Illuminate\Support\Facades\Route;
// use Auth;
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
    return view('pages.index');
});


Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
//Category

Route::get('Category/All','CategoryController@AllCategory')->name('all.category');
Route::post('Category/Add','CategoryController@AddCategory')->name('store.category');
Route::get('Category/Edit/{id}','CategoryController@Edit');
Route::post('Store/Category/{id}','CategoryController@Update');
Route::get('softdelete/Category/{id}','CategoryController@SoftDelete');
Route::get('Category/Restore/{id}','CategoryController@Restore');
Route::get('Pdelete/Category/{id}','CategoryController@PerDelete');

//Brand
Route::get('Brand/All','BrandController@AllBrand')->name('all.brand');
Route::post('Brand/Add','BrandController@StoreBrand')->name('store.brand');
Route::get('Brand/Edit/{id}','BrandController@Edit');
Route::post('Update/Brand/{id}','BrandController@Update');
Route::get('Delete/Brand/{id}','BrandController@Delete');

//multi.image
Route::get('Multi/Image','MultiImgController@index')->name('multi.image');
Route::post('Multi/Image/Store','MultiImgController@StoreImage')->name('store.image');

//profile
Route::get('User/Profile','ProfileController@Profile')->name('profile.user');
Route::post('User/Profile/Update','ProfileController@ProfileUpdate')->name('update.user');

//About
Route::get('About/Us','AboutController@AboutPage')->name('about.page');

//Coupon
Route::get('Coupon','CouponController@Coupon')->name('coupon');
