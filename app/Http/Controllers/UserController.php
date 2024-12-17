<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{   protected UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('Admin.user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterUserRequest $req)
    {   

        // $user = User::create($req->getInsertTableField());
        $this->userRepository->insert($req->getinsertTableField());
        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function profile(){
    //     // if(Auth::user()->role=='admin'){
    //         return view('Admin.profile',['data'=>$data]);
    //     // }
    //     // elseif(Auth::user()->role=='employee'){
    //     //     return view('Employee.profile',['data'=>$data]);
    //     // }
    //     // else{
    //     //     return view('Client.dashboard',['data'=>$data]);
    //     // }
    // }
}
