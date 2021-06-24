<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Auth;
use App\Jobs\SendAssignMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
class CreatetaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static $email;
    public function store(Request $request)
    {
        $task = new Task;
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->assign_user = Auth::user()->isAdmin() ? $request->input('assign_user') : Auth::user()->id;
        $task->status = $request->input('status');
        $task->save();
        $request->flash(['assign_user']);
        $email = DB::table('users')->where('id', $request->input('assign_user'))->pluck('email');
        //$email = User::find($request->input('assign_user'), $column=['email']);
        Cache::forever('email', $email);

        if(Auth::user()->isAdmin()){
           //$email = User::find($request->input('assign_user'), $column=['email']);
           dispatch(new SendAssignMail($task, $email));
          // SendAssignMail::dispatch($task, $email);
        }
        return redirect('task');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = DB::table('task')->find($id);
        return view('edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (Gate::allows('updatetask', $task) || \Auth::user()->isAdmin()) {
        $update = DB::table('task')
        ->where('id', '=', $id)
        ->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            ]);
        return redirect()->route('task-list');
        } else {
        abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
    }
}
