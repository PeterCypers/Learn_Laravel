<?php

use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // return view('welcome');
//     // return view('test');
//     return view('home');
// })->name('dashboard');

// Route::get('test/{test}', [TestController::class, 'test'])->name('test');
Route::get('test', [TestController::class, 'test']);

// controller class and the method -> route goes through controller now
Route::get('/', [ChirpController::class, 'index']);

// Route::post('/chirps', [ChirpController::class, 'store']);
// Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']); // route-model-binding
// Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);
// Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']);

Route::middleware('auth')->group(function() {
    Route::resource('/chirps', ChirpController::class)
    ->only(['store', 'edit', 'update', 'destroy']); // equals the 4 above routes
});

// REGISTER ROUTES
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');
Route::post('/register', Register::class)
    ->middleware('guest');

// LOGOUT only authed user can logout, auth is a middleware offered by Laravel
Route::post('/logout', Logout::class)
    ->middleware('auth');
