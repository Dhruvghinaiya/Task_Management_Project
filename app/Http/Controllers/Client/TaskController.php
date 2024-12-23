<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $tasks = $this->projectRepository->getTasksByClient(Auth::id());
        return view('Client.task.index',compact('tasks'));
    }

    public function show($id){
        $task = $this->taskrepository->getById($id);
        return view('Client.task.show',compact('task'));
    }

}
