<?php

use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {

// });
Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.logic');


// Route::get('/dashboard', function () {
//      return view('Admin.dashboard');
// })->name('admin.dashboard')->middleware(['auth']);

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
    Route::get('/task',[TaskController::class,'index'])->name('task.index');
    Route::get('task/create',[TaskController::class,'create'])->name('admin.task.create');
    Route::post('task/store',[TaskController::class,'create'])->name('admin.task.store');
    Route::get('task/edit',[TaskController::class,'create'])->name('admin.task.edit');
    Route::patch('task/update',[TaskController::class,'create'])->name('admin.task.update');
    Route::delete('task/delete',[TaskController::class,'create'])->name('admin.task.delete');
    
    //project controllers 
    Route::get('/project',[ProjectController::class,'index'])->name('admin.project.index');
    Route::get('project/create',[ProjectController::class,'create'])->name('admin.project.create');
    Route::post('project/store',[ProjectController::class,'store'])->name('admin.project.store');
    Route::get('project/edit/{id}',[ProjectController::class,'edit'])->name('admin.project.edit');
    Route::patch('project/update/{id}',[ProjectController::class,'update'])->name('admin.project.update');
    Route::delete('project/delete/{id}',[ProjectController::class,'destroy'])->name('admin.project.delete');
    Route::get('project/show/{id}',[ProjectController::class,'show'])->name('admin.project.show');
        
    //client
    Route::get('/client',[ClientController::class,'index'])->name('client.index');
    Route::get('/client/create',[ClientController::class,'create'])->name('admin.client.create');
    Route::post('/client/store',[ClientController::class,'store'])->name('admin.client.store');
    Route::get('/client/edit/{id}',[ClientController::class,'edit'])->name('admin.client.edit');
    Route::patch('/client/update/{id}',[ClientController::class,'update'])->name('admin.client.update');
    Route::delete('/client/delete/{id}',[ClientController::class,'destroy'])->name('admin.client.delete');
});





Route::middleware('role:client')->group(function () {
   
    Route::get('client/dashboard', function () {
        return view('Client.dashboard');
    })->name('client.dashboard')->middleware(['auth']);
 
    Route::get('/client/profile',[ClientController::class,'profile'])->name('client.profile');
    Route::Patch('/client/profile/update',[ClientController::class,'update'])->name('client.profile.update');
});


    Route::middleware('role:employee')->group(function(){
        Route::get('employee/dashboard',[EmployeeController::class,'index'])->name('employee.dashboard');
        Route::get('/employee/profile',[EmployeeController::class,'profile'])->name('employee.profile');
        Route::patch('employee/profile/update',[EmployeeController::class,'update'])->name('employee.profile.update');
    });

Route::get('/client/profile',[ClientController::class,'profile'])->name('client.profile');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users',[UserController::class,'index']);
});

require __DIR__.'/auth.php';
