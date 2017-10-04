<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    protected $fillable=['task_id','user_id'];

    // public function tasks()
    // {
    //   return $this->belongsToMany(Task::class);
    // }
    // public function users()
    // {
    //   return $this->belongsToMany(User::class);
    // }

}
