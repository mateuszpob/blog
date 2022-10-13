<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

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
Route::get('/', [HomeController::class, 'getHomePage'])->name('home');

Route::get('/login', [AuthController::class, 'getLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register-user', [UsersController::class, 'getRegisterForm'])->name('users.registerform');
Route::post('/register-user', [UsersController::class, 'register'])->name('users.register');

Route::middleware(['auth'])->group(function () {
    Route::get('/get-users', [UsersController::class, 'getUsers'])->name('get.users');

    Route::get('/create-user', [UsersController::class, 'getUserCreateForm'])->name('users.create');
    Route::post('/create-user', [UsersController::class, 'storeNewUser'])->name('users.store');

    Route::get('/edit-user/{id}', [UsersController::class, 'getEditUserForm'])->name('users.editform');
    Route::post('/edit-user/{id}', [UsersController::class, 'editUser'])->name('users.edit');
    Route::post('/delete-user/{id}', [UsersController::class, 'deleteUser'])->name('users.delete');

    Route::get('/create-post', [BlogController::class, 'getCreatePostForm'])->name('blog.createpostform');
    Route::post('/create-post', [BlogController::class, 'createPost'])->name('blog.createpost');
});
