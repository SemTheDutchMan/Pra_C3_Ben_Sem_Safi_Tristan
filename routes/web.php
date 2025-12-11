<?php

use App\Http\Controllers\ProfileController;
use App\http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');


Route::get('/admin', [ProfileController::class, 'index'])->middleware('auth')->name('profile.index');
Route::view('/tournaments', 'tournaments')->name('tournaments');
Route::view('/users', 'users')->name('users');

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

Route::resource('/school', SchoolController::class);

require __DIR__ . '/auth.php';