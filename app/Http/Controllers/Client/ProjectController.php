<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\ClientRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    protected ClientRepository $clientRepository;
    protected ProjectRepository   $ProjectRepostiry;
    protected UserRepository  $userRepostiry;
    public function __construct(ClientRepository $clientRepository,ProjectRepository  $projectRepository ,UserRepository  $userRepostiry)
    {   
        $this->clientRepository = $clientRepository;
        $this->ProjectRepostiry = $projectRepository;
        $this->userRepostiry = $userRepostiry;
    }
    public function index(){
        $projects = $this->ProjectRepostiry->getProjectsByClient(Auth::id());
        return view('Client.project.index',compact('projects'));
    }


        public function show($id){

            $project = $this->ProjectRepostiry->getById($id);
             $client= $this->userRepostiry->getById($project->client_id);
           return view('Client.project.show',compact('project','client'));
       }
   
}
