<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('login/google/callback', function () {
    $user = Socialite::driver('google')->user();
    echo $user->email;
   //return view('home');


    // $user->token
});

Route::get('login/facebook/redirect', function () {
    return Socialite::driver('facebook')->redirect();
})->name('login.facebook');

Route::get('login/facebook/callback', function () {
    $user = Socialite::driver('facebook')->user();
    echo gettype($user);
    //return view('home');

    // $user->token
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
