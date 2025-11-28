<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactForm;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\HomePage;
use App\Http\Controllers\Shop;
use App\Http\Controllers\Dashboard;
use App\Models\Product;

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

Auth::routes();
Route::get('/about', function() {
    return view('about');
});

Route:: get('/' ,[HomePage::class, 'index']);
Route:: get('/contact' ,[ContactController::class, 'show']) ->name('contact');

Route:: get('/shop' ,[Shop::class, 'show'])->name('shop');

Route:: get('/admin' ,[Dashboard::class, 'index'])->name('admin')   ;

Route :: get('products', [ProductController::class, 'index'])->name('products.index');
Route :: get('products/create', [ProductController::class, 'create'])->name('products.create');
Route :: post('products', [ProductController::class, 'store'])->name('products.store');
Route :: get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route :: put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route :: delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');  
Route :: get('products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::post('/contact', [ContactForm::class, 'store'])->name('store');

Route::get('/admin/products', [ProductController::class, 'index'])->name('index');
