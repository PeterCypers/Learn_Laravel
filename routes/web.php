<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // return view('welcome');
//     // return view('test');
//     return view('home');
// })->name('dashboard');

// controller class and the method -> route goes through controller now
Route::get('/', [ChirpController::class, 'index']);

Route::get('test/{test}', [TestController::class, 'test'])->name('test');
