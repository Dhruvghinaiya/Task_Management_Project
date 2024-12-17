<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function index(){
        return view('Admin.Client.index');
    }

    public function profile(){
        // $email = session('user_email');
        // $data = User::where('email',$email)->get();
            return view('Client.profile');   
    }
}
