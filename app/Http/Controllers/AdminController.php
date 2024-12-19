<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected  UserRepository $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository= $userRepository;
    }
   
    public function  index(){
        return view('admin.dashboard');
    }
    public function profile(){
        return view('Admin.profile');   
    }

    public function update(UpdateProfileRequest $req){

        $this->userRepository->update(Auth::user()->id,$req->getInsertTableField());
        return redirect()->route('admin.profile')->with('success','user profile update successfully...');
    }
}
