<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Step;


class Todo extends Model
{
    protected $fillable = ['title', 'description','user_id', 'completed'];

    //public function getRouteKeyName()
    //{
    //	return 'id';
    //}

    public function steps()
    {
    	return $this->hasMany(Step::class);
    }
}
