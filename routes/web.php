<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\client\HomeController;
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




Route::prefix('adminpanel')->group(function () {
    Route::get('/', function () {
        return view('admin.home');});
    Route::get('categories/',[CategoryController::class,'index'])->name('categories.index');
    Route::get('categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('categories/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('categories/edit/{category}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::patch('categories/update/{category}',[CategoryController::class,'update'])->name('categories.update');
    Route::delete('categories/destroy/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');
});
