<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected UserRepository $userRepository;
    protected TaskRepository $taskRepository;
    protected ProjectRepository $projectRepository;
    
    public function __construct(UserRepository $userRepository, TaskRepository $taskRepository,ProjectRepository $projectRepository)
    {
        $this->userRepository=$userRepository;
        $this->taskRepository = $taskRepository;
        $this->projectRepository = $projectRepository;
    }
    // public function show():View {
    //     return view('client.dashboard');
    // }
    public function index(){

        $taskCount = $this->projectRepository->getTasksByClient(AUth::id())->count();
        $clientCount  = $this->projectRepository->getProjectsByClient(Auth::id())->count();
        $projectCount = $this->projectRepository->getProjectsByClient(Auth::id())->count();
      
        $projects = $this->projectRepository->getProjectsByClient(Auth::user()->id)->load('tasks');
        return view('Client.dashboard',compact('taskCount','clientCount','projectCount','projects'));
    } 
    public function projects(User $user){
        $projects=$this->projectRepository->getProjectsByClient($user->id);
        return view('client.projects', compact('projects'));
    }
    public function tasks(User $user)
    {
        $tasks = $this->projectRepository->getTasksByClient($user->id);
        return view('client.tasks', compact('tasks'));
    }
 
}
