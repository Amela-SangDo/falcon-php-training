<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TasklistController extends Controller
{
            
    public function index()
    {
        $tasks = Task::all();
        
        return view('task-list', ['tasks' => $tasks]);
        //view('task-list', compact('tasks'));
        //view('task-list')->with(["key"=>$tasks]);
    }
}
