<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function profile(){
        return view('Admin.profile');   
    
    }

    public function update(Request $req){
        $req->validate([
            // 'name'=>'required',
            'email'=>'required',
        ]);
        return $req;
    }
}
