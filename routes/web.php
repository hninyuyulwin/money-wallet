<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HistoryController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Back\AdminUserController;
use App\Http\Controllers\Front\AddMoneyController;
use App\Http\Controllers\Front\TransferController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Back\AdminWalletController;
use App\Http\Controllers\Back\AdminContactController;
use App\Http\Controllers\Back\AdminCurrencyController;

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

Route::middleware('auth:admin_user')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminController::class,'home'])->name('home');

    Route::get('/users',[AdminUserController::class,'index'])->name('user');
    Route::get('/users/{user:name}',[AdminUserController::class,'show'])->name('user.view');
    Route::get('/users/delete/{id}',[AdminUserController::class,'destroy'])->name('user.delete');

    Route::get('/currency',[AdminCurrencyController::class,'index'])->name('currency');
    Route::get('/currency/create',[AdminCurrencyController::class,'create'])->name('currency.create');
    Route::post('/currency/store',[AdminCurrencyController::class,'store'])->name('currency.store');
    Route::get('/currency/{currency:name}',[AdminCurrencyController::class,'edit'])->name('currency.edit');
    Route::put('/currency/{currency}',[AdminCurrencyController::class,'update'])->name('currency.update');
    Route::get('/currency/delete/{currency}',[AdminCurrencyController::class,'destroy'])->name('currency.delete');

    Route::get('/contact', [AdminContactController::class,'index'])->name('contact');
    Route::get('/contact/delete/{contact}', [AdminContactController::class,'destroy'])->name('contact.delete');

    Route::get('/wallet', [AdminWalletController::class,'index'])->name('wallet');
});


Auth::routes();
// Admin user auth
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/login',[AdminLoginController::class,'showLoginForm']);
    Route::post('/login',[AdminLoginController::class,'login'])->name('login');
    Route::post('/logout',[AdminLoginController::class,'logout'])->name('logout');
});

Route::get('/', [PageController::class, 'home'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::get('/profile/edit/{user:name}',[ProfileController::class,'edit'])->name('profile.edit');
    Route::put('/profile/{user}',[ProfileController::class,'update'])->name('profile.update');
    Route::get('/profile/delete/{id}',[ProfileController::class,'delete'])->name('profile.delete');

    Route::get('/contact',[ContactController::class,'index'])->name('contact');
    Route::get('/contact/create',[ContactController::class,'create'])->name('contact.create');
    Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');
    Route::get('/contact/edit/{contact:name}',[ContactController::class,'edit'])->name('contact.edit');
    Route::put('/contact/{contact}',[ContactController::class,'update'])->name('contact.update');
    Route::get('/contact/delete/{contact}',[ContactController::class,'destroy'])->name('contact.delete');

    Route::get('/add-money',[AddMoneyController::class,'index'])->name('add-money');
    Route::post('/add-money',[AddMoneyController::class,'amountCreate'])->name('addAmount');
    Route::get('/approval', [AddMoneyController::class,'approval'])->name('approval');

    Route::get('/transfer',[TransferController::class,'index'])->name('transfer');
    Route::post('/transfer/checkNum',[TransferController::class,'checkNum'])->name('transfer.checkNum');
    Route::post('/transfer/confirm/{id}',[TransferController::class,'confirm'])->name('transfer.confirm');

    Route::get('/history',[HistoryController::class,'index'])->name('history');
    Route::post('/history-search',[HistoryController::class,'search'])->name('history-search');
    Route::get('/history-details/{history}',[HistoryController::class,'details'])->name('history-details');

});
