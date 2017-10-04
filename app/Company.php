<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Project;

class Company extends Model
{
    protected $fillable=['name','desc','user_id'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function projects()
    {
      return $this->hasMany(Project::class);
    }

    public function comments()
    {
      return $this->morphMany(Comment::class, 'commentable');
    }
}
