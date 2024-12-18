<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

        
        Route::get('/', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
        
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.logic');
        
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');
        
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
        
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
    ->name('verification.notice');
    
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');
    
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('verification.send');
    
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->name('password.confirm');
    
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    

   
    //admin 
        // Route::get('/users',[UserController::class,'create'])->name('user.create');
        // Route::post('register', [UserController::class, 'store'])->name('user.store');
        // Route::get('/profile',[AuthenticatedSessionController::class,'profile'])->name('admin.profile');
        // Route::patch('/update/profile',[AuthenticatedSessionController::class,'update'])->name('admin.profile.update');
        // //task controllers
        // Route::get('/task',[TaskController::class,'index'])->name('task.index')->middleware('auth');
        // //Project controllers
        // Route::get('/project',[ProjectController::class,'index'])->name('project.index')->middleware('auth');
        // // client controller
        // Route::get('/client',[ClientController::class,'index'])->name('client.index')->middleware('auth');

        // //employee
        // Route::get('/employee/profile',[EmployeeController::class,'profile'])->name('employee.profile')->middleware('auth');
        // //client
        // Route::get('/client/profile',[ClientController::class,'profile'])->name('client.profile')->middleware('auth');
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('Admin.dashboard');
        })->name('admin.dashboard');
        Route::get('/users',[UserController::class,'create'])->name('user.create');
        Route::post('register', [UserController::class, 'store'])->name('user.store');
        Route::get('/profile',[AuthenticatedSessionController::class,'profile'])->name('admin.profile');
        Route::patch('/update/profile',[AuthenticatedSessionController::class,'update'])->name('admin.profile.update');
        //task controllers
        Route::get('/task',[TaskController::class,'index'])->name('task.index')->middleware('auth');
        //Project controllers
        Route::get('/project',[ProjectController::class,'index'])->name('project.index')->middleware('auth');
        // client controller
        Route::get('/client',[ClientController::class,'index'])->name('client.index')->middleware('auth');
    
    });
    