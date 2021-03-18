<?php

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

Route::get('/', function () {
    return view('welcome');
});

//auth routes
Auth::routes();

//home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//blog routes
Route::group(['prefix' => 'blog'], function() {  
    Route::get('/list', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.list');
    Route::get('/add', [App\Http\Controllers\BlogController::class, 'add'])->name('blog.add');
    Route::post('/store', [App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');
    Route::get('/edit/{id}', [App\Http\Controllers\BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/update', [App\Http\Controllers\BlogController::class, 'update'])->name('blog.update');
    Route::get('/delete/{id}', [App\Http\Controllers\BlogController::class, 'delete'])->name('blog.delete');
});

//testimonial routes
Route::group(['prefix' => 'testimonial'], function() {  
    Route::get('/list', [App\Http\Controllers\TestimonialController::class, 'index'])->name('testimonial.list');
    Route::get('/add', [App\Http\Controllers\TestimonialController::class, 'add'])->name('testimonial.add');
    Route::post('/store', [App\Http\Controllers\TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/edit/{id}', [App\Http\Controllers\TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('/update', [App\Http\Controllers\TestimonialController::class, 'update'])->name('testimonial.update');
    Route::get('/delete/{id}', [App\Http\Controllers\TestimonialController::class, 'delete'])->name('testimonial.delete');
});

//faq routes
Route::group(['prefix' => 'FAQ'], function() {  
    Route::get('/list', [App\Http\Controllers\FaqController::class, 'index'])->name('faq.list');
    Route::get('/add', [App\Http\Controllers\FaqController::class, 'add'])->name('faq.add');
    Route::post('/store', [App\Http\Controllers\FaqController::class, 'store'])->name('faq.store');
    Route::get('/edit/{id}', [App\Http\Controllers\FaqController::class, 'edit'])->name('faq.edit');
    Route::post('/update', [App\Http\Controllers\FaqController::class, 'update'])->name('faq.update');
    Route::get('/delete/{id}', [App\Http\Controllers\FaqController::class, 'delete'])->name('faq.delete');
});

//banner routes
Route::group(['prefix' => 'banner'], function() {  
    Route::get('/list', [App\Http\Controllers\BannerController::class, 'index'])->name('banner.list');
    Route::get('/add', [App\Http\Controllers\BannerController::class, 'add'])->name('banner.add');
    Route::post('/store', [App\Http\Controllers\BannerController::class, 'store'])->name('banner.store');
    Route::get('/edit/{id}', [App\Http\Controllers\BannerController::class, 'edit'])->name('banner.edit');
    Route::post('/update', [App\Http\Controllers\BannerController::class, 'update'])->name('banner.update');
    Route::get('/delete/{id}', [App\Http\Controllers\BannerController::class, 'delete'])->name('banner.delete');
});

//category routes
Route::group(['prefix' => 'category'], function() {  
    Route::get('/list', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.list');
    Route::get('/add', [App\Http\Controllers\CategoryController::class, 'add'])->name('category.add');
    Route::post('/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
});

//user routes
Route::group(['prefix' => 'user'], function() {  
    Route::get('/list', [App\Http\Controllers\UserController::class, 'index'])->name('user.list');
    Route::get('/add', [App\Http\Controllers\UserController::class, 'add'])->name('user.add');
    Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
});

//product routes
Route::group(['prefix' => 'product'], function() {  
    Route::get('/list', [App\Http\Controllers\ProductController::class, 'index'])->name('product.list');
    Route::get('/add', [App\Http\Controllers\ProductController::class, 'add'])->name('product.add');
    Route::post('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::get('/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');
});

//coupon routes
Route::group(['prefix' => 'coupon'], function() {  
    Route::get('/list', [App\Http\Controllers\CouponController::class, 'index'])->name('coupon.list');
    Route::get('/add', [App\Http\Controllers\CouponController::class, 'add'])->name('coupon.add');
    Route::post('/store', [App\Http\Controllers\CouponController::class, 'store'])->name('coupon.store');
    Route::get('/edit/{id}', [App\Http\Controllers\CouponController::class, 'edit'])->name('coupon.edit');
    Route::post('/update', [App\Http\Controllers\CouponController::class, 'update'])->name('coupon.update');
    Route::get('/delete/{id}', [App\Http\Controllers\CouponController::class, 'delete'])->name('coupon.delete');
});
