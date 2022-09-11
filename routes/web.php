<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\listOrderController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\LikeController;
use App\Http\Controllers\client\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;

use App\Http\Middleware\CheckPermission;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/panel', function () {
    return view('admin.home');})->middleware([
    CheckPermission::class . ':view-dashboard',
    'auth'
]);
    Route::get('/showCategory/{category}',[CategoryController::class,'show'])->name('showCategory');
Route::get('/showProduct/{product}',[HomeController::class,'productDetails'])->name('showProduct');

Route::prefix('panel/categories')->middleware([CheckPermission::class . ':view-dashboard', 'auth'])->group(function () {
    Route::get('/',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/edit/{category}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::patch('/update/{category}',[CategoryController::class,'update'])->name('categories.update');
    Route::delete('/destroy/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');
});

Route::prefix('panel/products')->middleware([CheckPermission::class . ':view-dashboard', 'auth'])->group(function () {
    Route::get('/',[ProductController::class,'index'])->name('products.index');
    Route::get('/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/store',[ProductController::class,'store'])->name('products.store');
    Route::get('/edit/{product}',[ProductController::class,'edit'])->name('products.edit');
    Route::patch('/update/{product}',[ProductController::class,'update'])->name('products.update');
    Route::delete('/destroy/{product}',[ProductController::class,'destroy'])->name('products.destroy');
});

Route::resource('products.discounts', DiscountController::class)->middleware([CheckPermission::class . ':view-dashboard', 'auth']);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('offers', OfferController::class);

Route::prefix('register')->group(function () {
    Route::get('/', [RegisterController::class, 'create'])->name('register');
    Route::post('/store', [RegisterController::class, 'store'])->name('register.store');
});

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::prefix('')->name('client.')->group(function () {
    Route::get('/likes/', [LikeController::class, 'index'])->name('likes.index');
    Route::post('/likes/{product}', [LikeController::class, 'store'])->name('like');
    Route::get('/likes/{product}', [LikeController::class, 'destroy'])->name('likes.destroy');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/index', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/edit/{order}', [OrderController::class, 'edit'])->name('edit');
    Route::post('/transaction/{order}', [OrderController::class, 'transaction'])->name('transaction');




});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('panel/orders',[listOrderController::class,'index'])->name('panel.orders');