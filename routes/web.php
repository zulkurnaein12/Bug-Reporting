<?php

use App\Http\Controllers\Admin\BugController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\BugController as UserBugController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\PasswordController as UserPasswordController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
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

// route User
Route::middleware('role:user')->name('user.')->prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::resource('bug', UserBugController::class);
    Route::resource('task', UserTaskController::class);
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add');
    Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile/{id}', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/password', [UserPasswordController::class, 'edit'])->name('edit.password');
    Route::post('/password/update', [UserPasswordController::class, 'update'])->name('password');
});

// route Admin
Route::middleware('role:admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('bug', BugController::class);
    Route::resource('task', TaskController::class);
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile/{id}', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::get('/password', [PasswordController::class, 'edit'])->name('edit.password');
    Route::post('/password/update', [PasswordController::class, 'update'])->name('password');
    Route::resource('user', AdminUserController::class);
});
