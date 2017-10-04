<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','first_name','middle_name','last_name','city','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role(){
      return $this->belongsTo(Role::class);
    }

    public function companies(){
      return $this->hasMany(Company::class);
    }

    public function tasks(){
      return $this->hasMany(Task::class);
    }

    public function projects(){
      return $this->belongsToMany(Project::class);
    }

    public function comments()
    {
      return $this->morphMany(Comment::class, 'commentable');
    }
}
