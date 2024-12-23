<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTaskRequest;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class TaskController extends Controller
{
    protected TaskRepository $taskrepository;
    protected UserRepository $userRepository;
    protected ProjectRepository $projectRepository;
    protected TaskRepository $taskReposirtory;
    public function __construct(TaskRepository $taskrepository,UserRepository $userRepository,ProjectRepository $projectRepository,TaskRepository $taskReposirtory)
    {
        $this->taskrepository = $taskrepository;
        $this->userRepository = $userRepository;
        $this->projectRepository = $projectRepository;
        $this->taskReposirtory = $taskReposirtory;
    }

    public function index(){

        $tasks = $this->taskReposirtory->getTasksByEmployee(Auth::id());
        return view('Employee.task.index', compact('tasks'));
    }

    public function show( $id){
        $task = $this->taskrepository->getById($id);
        return view('employee.task.show',compact('task'));
    }   

    public function edit($id){
        $task =  $this->taskrepository->getById($id);
       $projects  =$this->projectRepository->getAll();
       $clients = $this->userRepository->getAllEmployees(); 
        return view('Employee.task.edit',compact('task','clients','projects'));

    }

    public function update(UpdateTaskRequest $req,$id){
        DB::beginTransaction();
            try{
                $this->taskrepository->update($id,$req->getInsertableFields());
                DB::commit();
                return redirect()->route('employee.task.index')->with('success','task edit sucessfully');
            }
            catch(Throwable $e){
                DB::rollBack();
                return redirect()->route('employee.task.index')->with('error',$e->getMessage());
            }
        
    }

    
}
