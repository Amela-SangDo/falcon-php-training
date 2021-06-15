<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Task extends Model
{
    use HasFactory;
    protected $table = 'task';
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function getAssignUserAttribute($assign_user){
        $user = User::find($assign_user, $column = ['name']);
        return $this->assign_user = $user->name;
    }
    
}
