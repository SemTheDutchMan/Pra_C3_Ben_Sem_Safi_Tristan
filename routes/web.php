<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

route::get('/login', function () {
    return view('login');
});

route::get('/register', function () {
    return view('register');
});
use App\Http\Controllers\RegisterController;

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::view('/admin', 'admin')->name('admin');
Route::view('/tournaments', 'tournaments')->name('tournaments');
Route::view('/users', 'users')->name('users');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile1', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/account/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::patch('/account/{id}', [ProfileController::class, 'updateUser'])->middleware('auth')->name('profile.updateById');

require __DIR__ . '/auth.php';
