<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// index transaction
Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index'])->name('transactions:index')->middleware('auth');

// create transaction
Route::get('/transactions/create', [App\Http\Controllers\TransactionController::class, 'create'])->name('transactions:create')->middleware('auth');

// store transaction
Route::post('/transactions/create', [App\Http\Controllers\TransactionController::class, 'store'])->name('transactions:store')->middleware('auth');

// show transaction
Route::get('/transactions/{transaction}', [App\Http\Controllers\TransactionController::class, 'show'])->name('transactions:show')->middleware('auth');

// edit transaction
Route::get('/transactions/{transaction}/edit', [App\Http\Controllers\TransactionController::class, 'edit'])->name('transactions:edit')->middleware('auth');

// update transaction
Route::post('/transactions/{transaction}/edit', [App\Http\Controllers\TransactionController::class, 'update'])->name('transactions:update')->middleware('auth');

// delete transaction
Route::get('/transactions/{transaction}/delete', [App\Http\Controllers\TransactionController::class, 'delete'])->name('transactions:delete')->middleware('auth');