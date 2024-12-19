<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        return view('Admin.Projects.index');
    }

    public function create(){
        return view('Admin.Projects.create_project');
    }
}
