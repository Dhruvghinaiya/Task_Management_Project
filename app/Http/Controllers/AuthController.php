<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest as AuthLoginRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show(){

        return view('auth.login');
    }
    public function login(AuthLoginRequest $req){
        $attributes = $req->getinsertTableField();
        if(Auth::attempt(['email' => $attributes['email'], 'password' => $attributes['password']])){
                if(Auth::user()->role ==='admin'){
                    return view('Admin.dashboard');
                }
                else if(Auth::user()->role ==='employee'){
                    return view('Employee.dashboard');
                }
                else{   
                    return view('Client.dashboard');
                }   
        }   
    }
}
