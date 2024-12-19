<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){

        return view('Admin.Tasks.index');
    }

    public function create(){
        return view('Admin.Tasks.create_task');
    }
}
