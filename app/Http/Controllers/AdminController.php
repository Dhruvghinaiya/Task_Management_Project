<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class AdminController extends Controller
{
    protected  UserRepository $userRepository;
    protected  TaskRepository $taskRepository;
    protected ProjectRepository $projectRepository;
    public function __construct(UserRepository $userRepository,TaskRepository $taskrepository,ProjectRepository $projectRepository){
        $this->userRepository= $userRepository;
        $this->taskRepository= $taskrepository;
        $this->projectRepository= $projectRepository;
    }
   
    public function  index(){
        $taskCount = $this->taskRepository->getAll()->count();
        
        $clientCount = $this->userRepository->getClient()->count();
        
        $employeeCount = $this->userRepository->getAllEmployees()->count();
        
        $projectCount = $this->projectRepository->getAll()->count();
        
        $recentProjects = $this->projectRepository->getRecentProjects(5);
        $recentTasks = $this->taskRepository->getRecentTasks(5);
        $recentClients = $this->userRepository->getRecentUsersByRole('client', 5);
        $recentEmployees = $this->userRepository->getRecentUsersByRole('employee', 5);
        
        return view('admin.dashboard',compact('taskCount','clientCount','employeeCount','projectCount','recentProjects',
            'recentTasks',
            'recentClients',
            'recentEmployees'));
    }
    public function profile(){
        return view('Admin.profile');   
    }

    public function update(UpdateProfileRequest $req){
        DB::beginTransaction();
        try{
            $this->userRepository->update(Auth::user()->id,$req->getInsertTableField());
            DB::commit();
            return redirect()->route('admin.profile')->with('success','user profile update successfully...');
        }
        catch(Throwable $e){
            DB::rollBack();
            return redirect()->route('admin.profile')->with('error',$e->getMessage());
        }
    }
}
