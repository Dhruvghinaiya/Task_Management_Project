<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Client_Detail;
use App\Models\Project;
use App\Repositories\ClientRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\ErrorHandler\Throwing;
use Ramsey\Uuid\Guid\Guid;
use Throwable;

class ProjectController extends Controller
{
    protected ClientRepository $clientRepository;
    protected ProjectRepository $ProjectRepostiry;
    protected UserRepository $userRepostiry;
    public function __construct(ClientRepository $clientRepository,ProjectRepository $projectRepository ,UserRepository $userRepostiry)
    {   
        $this->clientRepository = $clientRepository;
        $this->ProjectRepostiry = $projectRepository;
        $this->userRepostiry = $userRepostiry;
    }
    public function index(){
        $projects = $this->ProjectRepostiry->getAll();
        return view('Admin.Projects.index',compact('projects'));
    }
    
    public function show($id){

         $project = $this->ProjectRepostiry->getById($id);
          $client= $this->userRepostiry->getById($project->client_id);
        return view('Admin.Projects.project_details',compact('project','client'));
    }

    public function create(){
        $clients = $this->userRepostiry->getClient();      
        $employees = $this->userRepostiry->getAllEmployees();
        // return $employee;
        return view('Admin.Projects.create_project',compact('clients','employees'));

    }
    public function store(StoreProjectRequest $req){
        DB::beginTransaction();
        try {
            $this->ProjectRepostiry->store($req->getInsertTableField());
          $project=  $this->ProjectRepostiry->store($req->getInsertTableField());
            if ($req->has('employee_id') && !empty($req->employee_id)) {
                $project->users()->attach($req->employee_id); 
            }
            DB::commit();
            return redirect()->route('admin.project.index')->with('success', 'New project created successfully');

        } catch (Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create project: ' . $e->getMessage());
        }
    }
    public function edit($id){
        $project = $this->ProjectRepostiry->getById($id);
        $clients = $this->userRepostiry->getClient();     
        $employees = $this->userRepostiry->getAllEmployees();
        
        return view('Admin.Projects.edit',compact('project','clients','employees'));
    }

    public function update(UpdateProjectRequest $req ,$id){

        DB::beginTransaction();
        try{
             $this->ProjectRepostiry->update($id,$req->getInsertTableField());
            DB::commit();
            return redirect()->route('admin.project.index')->with('success','Edit Project Successfully...');
        }
        catch(Throwable $e){
            DB::rollBack();
            return back()->with('error',$e->getMessage());
        }

    }

    public function destroy($id){

        DB::beginTransaction();
        try{
            $this->ProjectRepostiry->destroy($id);
            DB::commit();
            return redirect()->route('admin.project.index')->with('success','project delete successfull');
        }
        catch(Throwable $e){
            DB::rollBack();
            return redirect()->route('admin.project.index')->with('error',$e->getMessage());
        }

    }
}
