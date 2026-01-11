<?php

use App\Http\Controllers\ProfileController;
use App\http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TournamentsController;
use App\Http\Controllers\FixtureController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/tournaments/public', [TournamentsController::class, 'publicIndex'])->name('tournaments.public');
Route::get('/tournaments/archive', [TournamentsController::class, 'archive'])->name('tournaments.archive');


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

Route::resource('fixtures', FixtureController::class);
Route::resource('team', TeamController::class);
Route::resource('users', UserController::class);
Route::resource('tournaments', TournamentsController::class);
Route::get('tournaments/{tournament}/standings', [TournamentsController::class, 'standings'])->name('tournaments.standings');

require __DIR__ . '/auth.php';

// Index is provided by the resource route above