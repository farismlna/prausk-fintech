<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TarikTunaiController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['siswa'])->group(function () {
});

Route::middleware(['/kantin'])->group(function () {
    Route::get('user');
});

Route::get('/topup', [HomeController::class, 'topup'])->name('topup');

Route::get('/tariktunai', [HomeController::class, 'tarikTunai'])->name('tarikTunai');
Route::post('/requestWithdraw', [WalletController::class, 'requestWithdraw']);
Route::post('/accWithdraw', [WalletController::class, 'accWithdraw']);

Route::post('/addToCart', [TransactionController::class, 'addToCart'])->name('addToCart');

Route::post('/topUpNow', [WalletController::class, 'topUpNow'])->name('topUpNow');

Route::get('/viewCart', [HomeController::class, 'viewCart'])->name('viewCart');

Route::get('product', [HomeController::class, 'product'])->name('product');
Route::get('product/add', [ProductController::class, 'add'])->name('product.add');
Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::delete('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/getTopUpRequest', [WalletController::class, 'getTopUpRequest'])->name('getTopUpRequest');
Route::get('newTopUp', [TopUpController::class, 'newTopUp'])->name('newTopUp');

Route::get('/getWithdrawRequest', [WalletController::class, 'getWithdrawRequest'])->name('getWithdrawRequest');
Route::get('newWithdraw', [TarikTunaiController::class, 'newWithdraw'])->name('newWithdraw');

Route::post('/sendTopUp', [WalletController::class, 'sendTopUp']);

