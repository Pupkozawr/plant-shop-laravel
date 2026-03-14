<?php
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
Route::get('/', HomeController::class)->name('home');
Route::get('/catalog', [CatalogController::class,'index'])->name('catalog.index');
Route::get('/products/{product}', [CatalogController::class,'show'])->name('catalog.show');
Route::middleware('guest')->group(function(){
    Route::get('/login',[AuthController::class,'showLogin'])->name('login'); Route::post('/login',[AuthController::class,'login']);
    Route::get('/register',[AuthController::class,'showRegister'])->name('register'); Route::post('/register',[AuthController::class,'register']);
});
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');
Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/cart/add/{product}',[CartController::class,'add'])->name('cart.add');
Route::post('/cart/update/{product}',[CartController::class,'update'])->name('cart.update');
Route::delete('/cart/remove/{product}',[CartController::class,'remove'])->name('cart.remove');
Route::delete('/cart/clear',[CartController::class,'clear'])->name('cart.clear');
Route::get('/contact',[ContactController::class,'create'])->name('contact.create');
Route::post('/contact',[ContactController::class,'store'])->name('contact.store');
Route::middleware('auth')->group(function(){
    Route::get('/orders/create',[OrderController::class,'create'])->name('orders.create');
    Route::post('/orders',[OrderController::class,'store'])->name('orders.store');
    Route::get('/my-orders',[OrderController::class,'myOrders'])->name('orders.my');
    Route::post('/products/{product}/reviews',[ReviewController::class,'store'])->name('reviews.store');
});
Route::prefix('admin')->middleware(['auth','admin'])->name('admin.')->group(function(){
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::resource('users', AdminUserController::class)->except('show');
    Route::resource('categories', AdminCategoryController::class)->except('show');
    Route::resource('products', AdminProductController::class)->except('show');
    Route::get('/orders',[AdminOrderController::class,'index'])->name('orders.index');
});
