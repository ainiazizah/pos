<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

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
/*
Route::get('/', function () {
    return view('welcome');
});{{  }}
*/

Route::get('/', function () {
    return view('dashboard');
});
Route::middleware(['auth:web'])->group(function () {
    Route::get('/category', [CategoryController::class, 'index']);

    //untuk add category
    Route::get('/category/add', [CategoryController::class, 'create']);
    Route::post('/category', [CategoryController::class, 'store']);
    //END untuk add category

    //untuk edit category
    Route::get('/category/{id_category}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{id_category}', [CategoryController::class, 'update']);
    //END untuk edit category

    //untuk delete category
    Route::get('category/{id_category}/delete', [CategoryController::class, 'destroy']);
    //END untuk delete category


    Route::get('/product', [ProductController::class, 'index']);

    //untuk add produk
    Route::get('/product/add', [ProductController::class, 'create']);
    Route::post('/product', [ProductController::class, 'store']);

    //untuk edit produk
    Route::get('/product/{id_product}/edit', [ProductController::class, 'edit']);
    Route::put('/product/{id_product}', [ProductController::class, 'update']);

    //untuk delete produk
    Route::get('/product/{id_product}/delete', [ProductController::class, 'destroy']);


    Route::get('/cart', [CartController::class, 'index']);

    //untuk add produk ke cart
    Route::get('/cart/add/', [CartController::class, 'index']);
    Route::post('/cart', [CartController::class, 'store']);
    //END untuk add produk ke cart

    //untuk edit cart
    Route::get('/cart/{id_cart}/edit', [CartController::class, 'edit']);
    Route::put('/cart/{id_cart}', [CartController::class, 'update']);
    //END untuk edit cart

    //untuk delete cart
    Route::get('cart/{id_cart}/delete', [CartController::class, 'destroy']);
    //END untuk delete cart

    //untuk memindahkan data dari cart ke transaksi
    Route::post('/transaction/{id}', [TransactionController::class, 'store']);
    //untuk memindahkan data dari cart ke transaksi

    Route::get('/transaction', [TransactionController::class, 'index']);
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::post('/register', [AuthController::class, 'doRegister'])->name('do.register');
Route::post('/login', [AuthController::class, 'doLogin'])->name('do.login');

Route::get('/transaction/receipt/{customer_idx}', [PaymentController::class, 'showReceipt'])->name('transaction.receipt');
