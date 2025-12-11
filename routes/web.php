<?php

use App\Http\Controllers\ProfileController;
use App\http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');


Route::view('/admin', 'admin')->name('admin');
Route::view('/rules', 'rules')->name('rules');
Route::view('/users', 'users')->name('users');
Route::get('/dashboard', [ProfileController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/account/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::patch('/account/{id}', [ProfileController::class, 'updateUser'])->middleware('auth')->name('profile.updateById');

Route::resource('/school', SchoolController::class);
Route::resource('/contact', ContactController::class);

require __DIR__ . '/auth.php';
