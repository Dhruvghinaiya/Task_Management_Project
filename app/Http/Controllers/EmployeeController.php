<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function profile(){
        $email = session('user_email');
        $data = User::where('email',$email)->get();
            return view('Employee.profile',['data'=>$data]);   
    }
}
