<?php

use App\Http\Controllers\Admin\BugController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\BugController as UserBugController;
use App\Http\Controllers\User\TaskController as UserTaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::middleware('role:user')->name('user.')->prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::resource('bug', UserBugController::class);
    Route::resource('task', UserTaskController::class);
});

Route::middleware('role:admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('bug', BugController::class);
    Route::get('/search', [BugController::class, 'search'])->name('search');
    Route::resource('task', TaskController::class);
});
