<?php

namespace App\Http\Controllers;

use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {   
        $this->clientRepository
    }
    public function index(){

        return view('Admin.Projects.index');
    }

    public function create(){
        return view('Admin.Projects.create_project');
    }
}
