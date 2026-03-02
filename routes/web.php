<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    // return view('test');
    return view('home');
})->name('dashboard');

Route::get('test/{test}', [TestController::class, 'test'])->name('test');
