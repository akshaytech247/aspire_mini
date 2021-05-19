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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user_loans/approve', [\App\Http\Controllers\UserLoansController::class,'approve'])->name('user_loans.approve');
Route::get('/user_loans/approve_edit/{id}/{val}', [\App\Http\Controllers\UserLoansController::class,'approve_edit'])->name('user_loans.approve_edit');
Route::resource('user_loans', \App\Http\Controllers\UserLoansController::class);
Route::get('/repayment/pay/{id}', [\App\Http\Controllers\RepaymentController::class,'pay'])->name('repayments.pay');
Route::resource('repayment', \App\Http\Controllers\RepaymentController::class);
