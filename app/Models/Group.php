<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
	use SoftDeletes;

    public function users()
	{
		return $this->hasMany("App\Models\User");
	}

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}