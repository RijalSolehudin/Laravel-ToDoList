<?php

use Illuminate\Support\Facades\Route;



Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');


//make middleware group for only guest
Route::middleware([App\Http\Middleware\OnlyGuestMiddleware::class])->group(function () {
    Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
    Route::post('/login', [App\Http\Controllers\UserController::class, 'doLogin'])->name('doLogin');
});
Route::post('/logout', [App\Http\Controllers\UserController::class, 'doLogout'])->middleware(App\Http\Middleware\OnlyMemberMiddleware::class)->name('logout');