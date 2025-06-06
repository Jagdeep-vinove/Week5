<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('index');
});
Route::get('/signin', [AuthController::class, 'showLoginForm']);

Route::post('/signin', [AuthController::class, 'login'])->name('login');

Route::get('/signup',[AuthController::class, 'showSignupForm']);

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/welcome',function(){
    return view('welcome');
})->name('welcome');

Route::get('/logout', function() {
    session()->forget('user');
    return redirect('/')->with('message', 'Logged out successfully!');
})->name('logout');