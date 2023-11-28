<?php

use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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
    return redirect('/home');
});

Route::get('/cadastrar', [UserController::class, 'create'])->name('get.register');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/cadastrar', [UserController::class, 'store'])->name('post.register');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::middleware('auth')->group(function () {
    Route::get('/home', [FinanceController::class, 'index'])->name('home');

    Route::get('/transactions', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions',[TransactionController::class, 'store'])->name('transactions.store');
    
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::delete('/transactions/delete/{id}',[TransactionController::class, 'destroy'])->name('transactions.destroy');
    Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');

    Route::get('/accounts', [BankAccountController::class, 'index'])->name('accounts.index');
    Route::get('/accounts/create', [BankAccountController::class, 'create'])->name('accounts.create');
    Route::post('/accounts', [BankAccountController::class, 'store'])->name('accounts.store');
    Route::delete('/accounts/delete/{id}', [BankAccountController::class, 'destroy'])->name('accounts.destroy');
    Route::get('/accounts/{id}/edit', [BankAccountController::class, 'edit'])->name('accounts.edit');
    Route::put('/accounts/{id}', [BankAccountController::class, 'update'])->name('accounts.update');
});

