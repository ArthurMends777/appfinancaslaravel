<?php

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

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/registro', function(){
    return view('register');
})->name('register');

Route::get('/esqueci_a_senha', function(){
    return view('passwordRequest');
})->name('passwordRequest');

Route::get('/inicio', function(){
    return view('FinancialResume');
})->name('FinancialResume');


/*
Route::get('/recuperacao_de_senha', function(){
    return view('resetPassword');
})->name('resetPassword');
*/