<?php

use App\Http\Controllers\LoginContoller;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [LoginContoller::class, 'index'])->name('login');
Route::post('/login', [LoginContoller::class, 'login'])->name('login.login');
Route::get('/logout', function () {
    Session::flush();
    return redirect()->route('login');
})->name('logout');

Route::get('/mail', [MailController::class, 'index'])->name('mail');

