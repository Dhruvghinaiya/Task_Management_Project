<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
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
    public function __construct(TaskRepository $taskrepository,UserRepository $userRepository,ProjectRepository $projectRepository)
    {
        $this->taskrepository = $taskrepository;
        $this->userRepository = $userRepository;
        $this->projectRepository = $projectRepository;
    }
    
    public function index(){

        $tasks = $this->taskrepository->getAll();
        $user = Auth::user()->role;

        if($user=='admin'){
            return view('Admin.Tasks.index',compact('tasks'));
        }
        elseif($user=='employee'){
            $tasks = $this->taskrepository->getTasksByEmployee(Auth::id());
            return view('Employee.task.index',compact('tasks'));
        }
    }

    public function show(Task $task){
        return view('Admin.Tasks.show',compact('task'));
        
    }
    public function create(){
        $employees = $this->userRepository->getAllEmployees();
        $projects = $this->projectRepository->getAll();
        $user = Auth::user()->role;
        if($user=='admin'){
            return view('Admin.Tasks.create_task',compact('employees','projects'));
        }   
        elseif($user=='employee'){
            return view('employee.task.create_task',compact('employees','projects'));
        }
    }

    public function store(StoreTaskRequest $req){

        DB::beginTransaction();
        try{
            $this->taskrepository->store($req->getInsertableFields());
            DB::commit();
            $user = Auth::user()->role;
            if($user=='admin'){
                return redirect()->route('admin.task.index')->with('success','new task add successfully');
            }   
            elseif($user=='employee'){
                return redirect()->route('employee.task.index')->with('success','new task add successfully');
            }
        }
        catch(Throwable $e){
            DB::rollBack();

            if($user=='admin'){
                return redirect()->route('admin.task.index')->with('error',$e->getMessage());
            }   
            elseif($user=='employee'){
                return redirect()->route('employee.task.index')->with('error',$e->getMessage());
            }

        }
    }

    public function edit(Task $task){
       $projects  =$this->projectRepository->getAll();
       $clients = $this->userRepository->getAllEmployees(); 
        return view('Admin.Tasks.edit',compact('task','clients','projects'));
    }   

    public function update(UpdateTaskRequest $req,$id){
        DB::beginTransaction();
            try{
                $this->taskrepository->update($id,$req->getInsertableFields());
                DB::commit();
                return redirect()->route('admin.task.index')->with('success','task edit sucessfully');
            }
            catch(Throwable $e){
                DB::rollBack();
                return redirect()->route('admin.task.index')->with('error',$e->getMessage());
            }
        
    }
    public function destroy(Task $task){

        DB::beginTransaction();
        try {
            $this->taskrepository->destroy($task->id);
            DB::commit();
            return redirect()->route('admin.task.index')->with('success', 'Task Deleted Succesfully');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('admin.task.index')->with('error', $e->getMessage());
        }
    }
}
