<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=['name','project_id','user_id','company_id','hours','days'];

    public function user(){
      return $this->belongsTo(User::class);
    }
    public function project(){
      return $this->belongsTo(Project::class);
    }
    public function company(){
      return $this->belongsTo(Company::class);
    }
    public function users()
    {
      return $this->belongsToMany(User::class);
    }

    public function comments()
    {
      return $this->morphMany(Comment::class, 'commentable');
    }

}
