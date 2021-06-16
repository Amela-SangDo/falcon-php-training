<?php

namespace App\Http\Controllers\Api;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Task::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->assign_user = Auth::user()->isAdmin() ? $request->input('assign_user') : Auth::user()->id;
        $task->status = $request->input('status');
        $task->save();
        return response()->json([
            'status code' => '201 Created',
            'status' => 'Tao task thanh cong',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        if($task->update($request->only(['title', 'description', 'status']))){
            return response()->json([
                'status code' => '200 OK',
                'Message' => 'Task updated successfully'
            ]);
        } else {
            return response()->json([
                'status code' => '400 Bad Request',
                'Message' => 'Fail to update task'
            ]);
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            'status' => 'Task deleted successfully',
        ]);
    }
}
