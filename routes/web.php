<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminClientManageController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AuthController::class, 'homePage'])->name('home-page');
Route::get('login', [AuthController::class, 'loginPage'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'registerPage'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::get('profile', fn() => view('profile'))->name('profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::middleware('admin')->group(function () {
        Route::get('/clients', [AdminClientManageController::class, 'clientsList'])->name('admin.client.list');
        Route::get('/add-client', [AdminClientManageController::class, 'addClient'])->name('admin.client.add');
        Route::post('add-client-submit', [AdminClientManageController::class, 'addSubmit'])->name('admin.client.submit');
        Route::get('admin/client/{id}/edit', [AdminClientManageController::class, 'edit'])->name('admin.client.edit');
        Route::put('admin/client/{id}', [AdminClientManageController::class, 'update'])->name('admin.client.update');
        Route::delete('admin/client/{id}', [AdminClientManageController::class, 'destroy'])->name('admin.client.destroy');
        Route::get('admin/assign', fn() => view('admin.assign'))->name('admin.assign.page');
        Route::post('admin/assign', [AdminController::class, 'assignValue'])->name('admin.assign');
    });
});
