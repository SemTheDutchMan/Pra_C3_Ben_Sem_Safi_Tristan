<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

route::get('/', function () {
    return view('homepage');
})->name('homepage');

route::get('/login', function () {
    return view('login');
});

route::get('/register', function () {
    return view('register');
});
use App\Http\Controllers\RegisterController;

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::view('/admin', 'admin')->name('admin');
Route::view('/tournaments', 'tournaments')->name('tournaments');
Route::view('/users', 'users')->name('users');
