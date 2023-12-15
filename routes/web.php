<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\BlogController as BlogHomeController;
use App\Http\Controllers\store\ProductController as ProduictController;
use App\Http\Controllers\store\CartController;
use App\Http\Controllers\store\CheckoutController;
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



Route::get('/',[HomeController::class, 'index'])->name('homePage');
Route::get('/about',[HomeController::class, 'about'])->name('about');
Route::get('/services',[HomeController::class, 'service'])->name('services');
Route::get('/contact',[HomeController::class, 'contact'])->name('contact');
Route::post('/send_message',[HomeController::class, 'storeMessage'])->name('sendMessage');
Route::post('/suscribe',[HomeController::class, 'storeEmail'])->name('suscriber');
Route::get('/service_detail/{id}/show',[HomeController::class, 'show_service'])->name('service.detail');

Route::get('/products',[ProduictController::class, 'products'])->name('home.products');
Route::get('/detail/{slug}',[ProduictController::class, 'details'])->name('product.detail');
Route::get('/cart',[CartController::class, 'index'])->name('cart');
Route::post('/cart_add',[CartController::class, 'store'])->name('add.cart');
Route::post('/cart_add_update',[CartController::class, 'update'])->name('update.cart');
Route::get('/cart_destroy/{id}',[CartController::class, 'destroy'])->name('destroy.cart');
Route::get('/cart_destroy_all',[CartController::class, 'destroyAll'])->name('destroyall.cart');
Route::get('/checkout',[CheckoutController::class, 'index'])->name('checkout.cart');

Route::post('/checkout',[CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/search',[ProduictController::class, 'search'])->name('store.search');
Route::get('/thankYou',[CheckoutController::class, 'thankyou'])->name('store.thankYou');
Route::get('/payment',[CheckoutController::class, 'payment'])->name('store.payment');

Route::get('/blog',[BlogHomeController::class, 'index'])->name('blog');
Route::get('/blogdetail/{id}/',[BlogHomeController::class, 'blog_detail'])->name('blog_detail');



Route::middleware(['auth'])->group(function(){

        Route::get('/admin/dashboard',[DashboardController::class, 'index']);
        Route::get('/admin/contacts',[DashboardController::class, 'messages'])->name('admin.message');
        Route::get('/admin/newsletters',[DashboardController::class, 'newsletterSucribers'])->name('admin.newsletter');
        Route::resource('admin/services',ServicesController::class);

        Route::resource('admin/products',ProductController::class);
        Route::resource('admin/bookings',BookingController::class);
        Route::resource('admin/blogs',BlogController::class);
        Route::resource('admin/categories',CategoryController::class);




    });



require __DIR__.'/auth.php';
