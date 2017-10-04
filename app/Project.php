<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=['name','desc','company_id','user_id','days'];

    public function company(){
      return $this->belongsTo(Company::class);
    }

    public function user(){
      return $this->belongsToMany(User::class);
    }

    public function comments()
    {
      return $this->morphMany(Comment::class, 'commentable');
    }
}
