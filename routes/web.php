<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isLogged;
use App\Http\Middleware\notAdmin;
use App\Http\Middleware\notLogged;
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

Route::get('/register_form', [GuestController::class, 'display_regist_form'])->name('display_regist_form_view')->middleware([notLogged::class]);
Route::get('/login_form', [GuestController::class, 'display_login_form'])->name('display_login_form_view')->middleware([notLogged::class]);
Route::get('/show_product', [ItemController::class, 'index'])->name('display_product');

Route::post('/register_form', [UserController::class, 'insert_data'])->name('register_logic');
Route::post('/login_form', [UserController::class, 'login_logic'])->name('login_logic');
Route::get('/logout', [UserController::class, 'logout_logic'])->name('logout_logic')->middleware([isLogged::class]);
Route::get('/show_product/detail/{id}', [ItemController::class, 'getItemDetail'])->name('item_detail_logic');
Route::get('/search', [ItemController::class, 'itemSearch'])->name('search_logic')->middleware([isLogged::class]);


//Admin
Route::get('/admin/view_product', [AdminController::class, 'index'])->name('view_product')->middleware([isLogged::class, isAdmin::class]);
Route::get('/admin/add_product', [AdminController::class, 'display_add_form'])->name('add_form')->middleware([isLogged::class, isAdmin::class]);
Route::post('/admin/add_product', [AdminController::class, 'addItem'])->name('add_item_logic')->middleware([isLogged::class, isAdmin::class]);
Route::delete('/admin/delete_product/{id}', [AdminController::class, 'deleteItem'])->name('delete_item_logic')->middleware([isLogged::class, isAdmin::class]);
Route::get('/admin/update_product/{id}', [AdminController::class, 'display_update_item'])->name('display_update_item_form')->middleware([isLogged::class, isAdmin::class]);
Route::patch('/admin/update_product', [AdminController::class, 'updateItem'])->name('update_item_logic')->middleware([isLogged::class, isAdmin::class]);


//User
Route::get('/edit/profile', [UserController::class, 'display_edit_profile'])->name('display_edit_profile')->middleware([isLogged::class]);
Route::patch('/edit/profile', [UserController::class, 'edit_profile_logic'])->name('edit_profile_logic')->middleware([isLogged::class]);

//Password
Route::get('/edit/profile/password', [UserController::class, 'display_change_password'])->name('display_change_password')->middleware([isLogged::class]);
Route::patch('/edit/profile/password', [UserController::class, 'change_password_logic'])->name('change_password_logic')->middleware([isLogged::class]);


//Cart {User Only}
Route::get('/cart', [CartController::class, 'index_cart'])->name('display_cart')->middleware([isLogged::class, notAdmin::class]);
Route::post('/cart', [CartController::class, 'cart_logic'])->name('cart_logic')->middleware([isLogged::class, notAdmin::class]);
Route::delete('/cart/delete/{id}', [CartController::class, 'delete_item_cart_detail'])->name('delete_item_cart_detail_logic')->middleware([isLogged::class, notAdmin::class]);
Route::get('/cart/detail/update/{id}', [CartController::class, 'display_update_cart_item_form'])->name('display_update_cart_item_form')->middleware([isLogged::class, notAdmin::class]);

//Transaction History {User Only}
Route::get('/History', [TransactionController::class, 'display_transaction_history'])->name('display_transaction_history')->middleware([isLogged::class, notAdmin::class]);
Route::post('/History', [TransactionController::class, 'insert_transaction_history'])->name('insert_transaction_history_logic')->middleware([isLogged::class, notAdmin::class]);
