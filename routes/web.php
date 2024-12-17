<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', function () {
    return view('Admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/employee/dashboard', function () {
    return view('Employee.dashboard');
})->middleware(['auth', 'verified'])->name('employee.dashboard');

Route::get('client/dashboard', function () {
    return view('Client.dashboard');
})->middleware(['auth', 'verified'])->name('client.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users',[UserController::class,'index']);
});

require __DIR__.'/auth.php';
