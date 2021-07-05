<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TasklistController extends Controller
{
            
    public function index()
    {
        $tasks = Task::paginate(10);
        return view('task-list', ['tasks' => $tasks]);
        //view('task-list', compact('tasks'));
        //view('task-list')->with(["key"=>$tasks]);
    }
}
