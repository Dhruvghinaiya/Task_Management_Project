<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{     
    
    protected  UserRepository $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository= $userRepository;
    }

    
    public function index(){
        return view('Admin.Client.index');
    }

    public function create(){
    //    return  $this->userRepository->getAll();
    return user::where('role','user')->get();

        // return view('Admin.Client.client_create');
    }
    public function profile(){
        // $email = session('user_email');
        // $data = User::where('email',$email)->get();
            return view('Client.profile');   
    }

    public function update(UpdateProfileRequest $req){

        $this->userRepository->update(Auth::user()->id,$req->getInsertTableField());
        return redirect()->route('client.profile')->with('success','user profile update successfully...');
    }

}
