<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class,'welcome'])->name('welcome');
Route::get('welcomesearch',[FrontendController::class,'search'])->name('welcome.search');

Route::resource('category',CategoryController::class);

Route::resource('products',ProductController::class);


//product details
Route::get('product-update/{id}',[ProductController::class,'updateFeature'])->name('updateFeature');

Route::get('product-recent/{id}',[ProductController::class,'updateRecent'])->name('updateRecent');



Route::post('search',[ProductController::class,'search'])->name('products.search');
ROute::post('categorysearch',[CategoryController::class,'search'])->name('category.search');




//Shopping Cart
Route::get('add-cart/{id}',[CartController::class,'add'])->name('cart.add');
Route::get('cart-list',[CartController::class,'list'])->name('cart.list');
Route::get('remove-cart/{id}',[CartController::class,'remove'])->name('cart.remove');
Route::get('increase-cart/{id}',[CartController::class,'increase'])->name('cart.increase');
Route::get('decrease-cart/{id}',[CartController::class,'decrease'])->name('cart.decrease');

//Order Checkout
Route::get('/checkout',[OrderController::class,'checkout'])->name('order.checkout');
Route::post('/checkout',[OrderController::class,'store'])->name('orders.store');

Route::get('/admin',[BackendController::class,'admin'])->name('backend.admin');


//Order
Route::resource('orders',OrderController::class);
Route::get('/orderprocess/{id}',[OrderController::class,'process'])->name('orders.process');
Route::get('/ordershipped/{id}',[OrderController::class,'shipped'])->name('orders.shipped');
Route::get('/orderroute/{id}',[OrderController::class,'route'])->name('orders.route');
Route::get('/orderarried/{id}',[OrderController::class,'arrived'])->name('orders.arrived');
Route::get('/orderinfoupdate/{id}',[OrderController::class,'orderInfoUpdate'])->name('orders.infoUpdate');
Route::get('/ordertrack',[FrontendController::class,'orderTrack'])->name('orders.track');
Route::post('/ordertrack-submit',[FrontendController::class,'orderTrackSubmit'])->name('ordertrack.submit');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});





