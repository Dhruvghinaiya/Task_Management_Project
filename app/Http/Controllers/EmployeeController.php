<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class EmployeeController extends Controller
{
    protected UserRepository $userRepository;
    protected TaskRepository  $taskRepository;
    protected ProjectRepository  $projectRepository;
    
    public function __construct(UserRepository $userRepository, TaskRepository $taskRepository,ProjectRepository $projectRepository)
    {
        $this->userRepository=$userRepository;
        $this->taskRepository = $taskRepository;
        $this->projectRepository = $projectRepository;
    }

    public function profile(){
        $email = session('user_email');
        $data = User::where('email',$email)->get();
        return view('Employee.profile',['data'=>$data]);   
    }

    public function index(){
        $projectCount = $this->taskRepository->getProjectByEmployee(Auth::user()->id)->count();
        $clientCount  = $this->userRepository->getClient()->count();
        $taskCount  = $this->taskRepository->getTasksByEmployee(Auth::id())->count();
        $tasks = $this->taskRepository->getTasksByEmployee(Auth::user()->id);
        return view('Employee.dashboard',compact('projectCount','clientCount','taskCount','tasks'));
        
    }

    public function update(UpdateProfileRequest $req){
        DB::transaction();
        try{
            $this->userRepository->update(Auth::user()->id,$req->getInsertTableField());
            DB::commit();
            return redirect()->route('employee.profile')->with('success','user profile update successfully...');
        }
        catch(Throwable $e){
            DB::rollBack();
            return redirect()->route('employee.profile')->with('success',$e->getMessage());
        }
    }
}
