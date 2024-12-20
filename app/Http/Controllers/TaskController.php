<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $task = Task::all();
        // return $task;
        return view('Admin.Tasks.index',compact('task'));
    }

    public function create(){
        return view('Admin.Tasks.create_task');
    }

    public function store(StoreTaskRequest $req){
        return $req;
    }
}
