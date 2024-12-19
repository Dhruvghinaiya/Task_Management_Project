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
    Route::get('/user',[UserController::class,'create'])->name('user.create');
    Route::get('/profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::patch('/update/profile/',[AdminController::class,'update'])->name('admin.profile.update');
    Route::post('register', [UserController::class, 'store'])->name('user.store');        Route::patch('/update/profile',[AuthenticatedSessionController::class,'update'])->name('admin.profile.update');
    
    //task controllers 
    Route::get('/task',[TaskController::class,'index'])->name('task.index');
    Route::get('task/create',[TaskController::class,'create'])->name('admin.task.create');
    Route::get('task/store',[TaskController::class,'create'])->name('admin.task.store');
    Route::get('task/edit',[TaskController::class,'create'])->name('admin.task.edit');
    Route::patch('task/update',[TaskController::class,'create'])->name('admin.task.update');
    Route::delete('task/delete',[TaskController::class,'create'])->name('admin.task.delete');
    
    //project controllers 
    Route::get('/project',[ProjectController::class,'index'])->name('project.index');
    Route::get('project/create',[ProjectController::class,'create'])->name('admin.project.create');
    Route::get('project/store',[ProjectController::class,'create'])->name('admin.project.store');
    Route::get('project/edit',[ProjectController::class,'create'])->name('admin.project.edit');
    Route::get('project/update',[ProjectController::class,'create'])->name('admin.project.update');
    Route::get('project/delete',[ProjectController::class,'create'])->name('admin.project.delete');
        
    //client
    Route::get('/client',[ClientController::class,'index'])->name('client.index');
    Route::get('/admin/client/create',[ClientController::class,'create'])->name('admin.client.create');
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
