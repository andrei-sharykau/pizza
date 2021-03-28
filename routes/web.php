<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'startpage'])->name('welcome');

Route::get('/dashboard', [ProductController::class, 'getall']
)->middleware(['auth'])->name('dashboard');

Route::get('/settings', function () {
    return view('settings');
})->middleware(['auth'])->name('settings');

Route::get('/add-product', function () {
    return view('product');
})->middleware(['auth'])->name('add-product');

Route::post('/add-product', [ProductController::class, 'addproduct'])->middleware(['auth']);

Route::get('/product/{product}', [ProductController::class, 'editproduct'])->middleware(['auth'])->name('edit');

Route::post('/update/{update}', [ProductController::class, 'updateproduct'])->middleware(['auth'])->name('update');

Route::get('/del-product/{id}', [ProductController::class, 'delproduct'])->middleware(['auth']);

require __DIR__.'/auth.php';
