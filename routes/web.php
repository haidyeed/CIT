<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController, AdminController, BackendController};

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

//Frontend routes

Route::get('/', [UserController::class, 'index'])->name('home');

Route::group(['middleware' => ['guest']], function () {

    Route::get('/register', [UserController::class, 'showRegister'])->name('user.register.show');
    Route::post('/register', [UserController::class, 'register'])->name('user.register');

    Route::get('/login', [UserController::class, 'showLogin'])->name('user.login.show');
    Route::post('/login', [UserController::class, 'login'])->name('user.login');

    Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login.show');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
});


Route::group(['middleware' => ['auth']], function () {

    Route::get('/userhome', [UserController::class, 'userHome'])->name('user.home');
    Route::get('/shop', [UserController::class, 'shop'])->name('shop');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});


//Dashboard routes

Route::get('/adminmaker', [AdminController::class, 'adminMaker'])->name('admin.make');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:admin']], function () {
    Route::get('/home', [AdminController::class, 'adminHome'])->name('admin.home');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [BackendController::class, 'dashboard'])->name('dashboard');

});
