<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

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
        $users = $this->userRepository->getAll();   
        return view('Admin.user.index',compact('users'));   
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('Admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterUserRequest $req)
    {   
        Db::beginTransaction();
        try{
            $this->userRepository->store($req->getinsertTableField());
            DB::commit();
            return redirect()->route('admin.dashboard')->with('success','new user created successfully.');
        }
        catch(Throwable $e){
            DB::rollBack();
            return redirect()->route('admin.user.create')->with('error',$e->getMessage());
        }


    }

  

    public function edit($id)
    {   
        $user = $this->userRepository->getById($id);
        return view('Admin.user.edit',['users'=>$user]);
    }

    public function update( UpdateUserRequest $req , $id)
    {   
        DB::beginTransaction();
        try {
            $this->userRepository->update($id, $req->getinsertTableField());
            DB::commit();
            return redirect()->route('admin.user.index')->with('success', 'User Updated Successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('admin.user.edit',$id)->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $this->userRepository->destroy($id);
            DB::commit();
            return redirect()->route('admin.user.index')->with('success', 'User Deleted Successfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('admin.user.index')->with('error', $e->getMessage());
        }
    }
   
}
