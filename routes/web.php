<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['role:employee'])->group(function(){
   
    Route::get('/employee/dashboard', function () {
        return view('Employee.dashboard');
    })->middleware(['role:employee'])->name('employee.dashboard');

    Route::get('/employee/profile',[EmployeeController::class,'profile'])->name('employee.profile');

   
});


Route::middleware(['role:client'])->group(function(){
   
    Route::get('client/dashboard', function () {
        return view('Client.dashboard');
    })->middleware(['role:client'])->name('client.dashboard');

    Route::get('/client/profile',[ClientController::class,'profile'])->name('client.profile');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users',[UserController::class,'index']);
});

require __DIR__.'/auth.php';
