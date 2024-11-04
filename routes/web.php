<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\FrontendController;
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

Route::get('/', [FrontendController::class, 'welcome']);


Route::prefix('admin')->middleware('auth')->group(function () {
    // dashboard
    Route::get('dashboard', [BackendController::class, 'dashboard'])->name('dashboard');
    // exchange rate
    Route::get('exchange-rate', [BackendController::class, 'exchangeRate'])->name('exchange_rate');
    Route::post('exchange-rate/store', [BackendController::class, 'exchangeRateStore'])->name('exchange_rate.store');
    Route::get('exchange-rate/{exchangeId}/destroy', [BackendController::class, 'exchangeRateDestroy'])->name('exchange_rate.destroy');
    Route::get('exchange-rate/{exchangeId}/edit', [BackendController::class, 'exchangeRateEdit'])->name('exchange_rate.edit');
    Route::post('exchange-rate/{exchangeId}/update', [BackendController::class, 'exchangeRateUpdate'])->name('exchange_rate.update');
    // profit
    Route::get('profit', [BackendController::class, 'profit'])->name('profit');
    Route::post('profit/store', [BackendController::class, 'profitStore'])->name('profit.store');
    Route::get('profit/{profitId}/destroy', [BackendController::class, 'profitDestroy'])->name('profit.destroy');
    // profit rate
    Route::get('profit/{profitId}/profit-rates', [BackendController::class, 'profitRates'])->name('profit.rates');
    Route::post('profit/{profitId}/add-profit-rate', [BackendController::class, 'addProfitRate'])->name('add.profit_rate');
    Route::get('profit/{profitId}/profit_rate/{profitRateId}/destroy', [BackendController::class, 'profitRateDestroy'])->name('profit_rate.destroy');


    // content
    Route::get('content', [BackendController::class, 'content'])->name('content');
    Route::get('create-new-content', [BackendController::class, 'createNewContent'])->name('create_new_content');
    Route::post('create-new-content/store', [BackendController::class, 'contentStore'])->name('content.store');
    Route::post('content/{contentId}/destroy', [BackendController::class, 'contentDestroy'])->name('content.destroy');
    Route::post('content/{contentId}/update-duration', [BackendController::class, 'contentUpdateDuration'])->name('content.update_duration');
    //user
    Route::get('users', [BackendController::class, 'users'])->name('users');
    Route::get('user-create', [BackendController::class, 'userCreate'])->name('user.create');
    Route::post('user-store', [BackendController::class, 'userStore'])->name('user.store');


});

//authentication
Route::get('admin/login', [BackendController::class, 'login'])->name('login');
Route::post('admin/login/store', [BackendController::class, 'loginStore'])->name('login.store');
Route::post('logout', [BackendController::class, 'logout'])->name('logout');
