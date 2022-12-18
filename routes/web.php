<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('home_user');
})->name('display_home_page');

Route::get('/register_form', [GuestController::class, 'display_regist_form'])->name('display_regist_form_view');
Route::get('/login_form', [GuestController::class, 'display_login_form'])->name('display_login_form_view');
// Route::get('/show_product_guest', [GuestController::class, ])
Route::post('/register_form', [UserController::class, 'insert_data'])->name('register_logic');
Route::post('/login_form', [UserController::class, 'login_logic'])->name('login_logic');
Route::get('/logout', [UserController::class, 'logout_logic'])->name('logout_logic');

Route::get('/show_product', [ItemController::class, 'index'])->name('display_product');
