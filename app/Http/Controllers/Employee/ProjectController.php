<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Repositories\ClientRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class ProjectController extends Controller
{
    protected ClientRepository $clientRepository;
    protected ProjectRepository   $ProjectRepostiry;
    protected UserRepository  $userRepostiry;
    protected TaskRepository $taskReposirtory;
    public function __construct(ClientRepository $clientRepository,ProjectRepository  $projectRepository ,UserRepository  $userRepostiry,TaskRepository $taskReposirtory)
    {   
        $this->clientRepository = $clientRepository;
        $this->ProjectRepostiry = $projectRepository;
        $this->userRepostiry = $userRepostiry;
        $this->taskReposirtory = $taskReposirtory;
    }

    public function index(){
    
        $projects = $this->taskReposirtory->getProjectByEmployee(Auth::id());
        return view('employee.project.index',compact('projects'));
    }


        public function show( $id){
            $project = $this->ProjectRepostiry->getById($id);
             $client= $this->userRepostiry->getById($project->client_id);
           return view('employee.project.show',compact('project','client'));
       }

}
