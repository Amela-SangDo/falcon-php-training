<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Auth;
Use DB;
class CanUpdate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $task = $request->task;
        $user = Auth::user();
        if(!Auth::user()->isAdmin() && $user->id !== $task->getAttributes()['assign_user']){
        return response()->json([
            'Fail to update' => 'You are not admin or not assigned to this task',
        ]);
        } 
        return $next($request);
    }
    
}