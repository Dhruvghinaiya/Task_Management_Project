<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Client\AdminController as ClientAdminController;
use App\Http\Controllers\Client\ProjectController as ClientProjectController;
use App\Http\Controllers\Client\TaskController as ClientTaskController;
use App\Http\Controllers\Employee\AdminController as EmployeeAdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Employee\ProjectController as EmployeeProjectController;
use App\Http\Controllers\Employee\TaskController as EmployeeTaskController;
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
Route::middleware('guest')->group(function () {
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.logic');
});

Route::middleware(['role:admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/all_users',[UserController::class,'index'])->name('user.index');
    Route::get('/profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::patch('/update/profile/',[AdminController::class,'update'])->name('admin.profile.update');
    Route::post('register', [UserController::class, 'store'])->name('user.store');        Route::patch('/update/profile',[AuthenticatedSessionController::class,'update'])->name('admin.profile.update');
    
    //user
    Route::get('/user',[UserController::class,'index'])->name('admin.user.index');
    Route::get('/user/create',[UserController::class,'create'])->name('admin.user.create');
    Route::get('/user/store',[UserController::class,'store'])->name('admin.user.store');
    Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('admin.user.edit');
    Route::patch('/user/update/{id}',[UserController::class,'update'])->name('admin.user.update');
    Route::delete('/user/destroy/{id}',[UserController::class,'destroy'])->name('admin.user.destroy');

    //task controllers 
    Route::get('admin/task',[TaskController::class,'index'])->name('admin.task.index');
    Route::get('admin/task/show/{task}',[TaskController::class,'show'])->name('admin.task.show');
    Route::get('admin/task/create',[TaskController::class,'create'])->name('admin.task.create');
    Route::post('admin/task/store',[TaskController::class,'store'])->name('admin.task.store');
    Route::get('admin/task/edit/{task}',[TaskController::class,'edit'])->name('admin.task.edit');
    Route::patch('admin/task/update/{id}',[TaskController::class,'update'])->name('admin.task.update');
    Route::delete('admin/task/delete/{task}',[TaskController::class,'destroy'])->name('admin.task.delete');
    
    //project controllers 
    Route::get('/project',[ProjectController::class,'index'])->name('admin.project.index');
    Route::get('project/create',[ProjectController::class,'create'])->name('admin.project.create');
    Route::post('project/store',[ProjectController::class,'store'])->name('admin.project.store');
    Route::get('project/edit/{project}',[ProjectController::class,'edit'])->name('admin.project.edit');
    Route::patch('project/update/{project}',[ProjectController::class,'update'])->name('admin.project.update');
    Route::delete('project/delete/{id}',[ProjectController::class,'destroy'])->name('admin.project.delete');
    Route::get('project/show/{project}',[ProjectController::class,'show'])->name('admin.project.show');
        
    //client
    Route::get('/client',[ClientController::class,'index'])->name('admin.client.index');
    Route::get('/client/show',[ClientController::class,'show'])->name('admin.client.show');
    Route::get('/client/create',[ClientController::class,'create'])->name('admin.client.create');
    Route::post('/client/store',[ClientController::class,'store'])->name('admin.client.store');
    Route::get('/client/edit/{id}',[ClientController::class,'edit'])->name('admin.client.edit');
    Route::patch('/client/update/{id}',[ClientController::class,'update'])->name('admin.client.update');
    Route::delete('/client/delete/{id}',[ClientController::class,'destroy'])->name('admin.client.delete');
});


Route::middleware('role:client')->group(function () {
   
    Route::get('/client/dashboard',[ClientAdminController::class,'index'])->name('client.dashboard');
    Route::get('/client/profile',[ClientAdminController::class,'profile'])->name('client.profile');
    Route::Patch('/client/profile/update',[ClientAdminController::class,'update'])->name('client.profile.update');

    //project
    Route::get('/client/project',[ProjectController::class,'index'])->name('client.project.index');
    Route::get('/client/project/show/{project}',[ProjectController::class,'show'])->name('client.project.show');

    //task
    Route::get('client/task',[TaskController::class,'index'])->name('client.task.index');
    Route::get('client/task/show/{task}',[TaskController::class,'show'])->name('client.task.show');

    //client
    Route::get('/client/show',[ClientController::class,'index'])->name('client.index');

});


    Route::middleware('role:employee')->group(function(){
        Route::get('employee/dashboard',[EmployeeController::class,'index'])->name('employee.dashboard');
        Route::get('/employee/profile',[EmployeeController::class,'profile'])->name('employee.profile');
        Route::patch('employee/profile/update',[EmployeeController::class,'update'])->name('employee.profile.update');

        //project
            Route::get('/employee/project/',[EmployeeProjectController::class,'index'])->name('employee.project.index');
            Route::get('/employee/project/show/{id}',[EmployeeProjectController::class,'show'])->name('employee.project.show');

        //task
            Route::get('employee/task',[TaskController::class,'index'])->name('employee.task.index');
            Route::get('employee/task/create',[TaskController::class,'create'])->name('employee.task.create');
            Route::post('task/store',[TaskController::class,'store'])->name('employee.task.store');        
            Route::get('task/show/{task}',[TaskController::class,'show'])->name('employee.task.show');
            Route::get('task/edit/{task}',[TaskController::class,'edit'])->name('employee.task.edit');
            Route::patch('employee/task/update/{id}',[TaskController::class,'update'])->name('employee.task.update');
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users',[UserController::class,'index']);
});

require __DIR__.'/auth.php';
