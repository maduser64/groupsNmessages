<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    public function user()
	{
		return $this->belongsTo("App\Models\User");
	}

	public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function replies()
    {
        return $this->hasMany("App\Models\Reply");
    }

    public function group()
    {
        return $this->post->belongsTo("App\Models\Group");
    }

    public function reactions()
    {
        return $this->morphToMany('App\Models\User', 'reactions')->whereDeletedAt(null);
    }

    public function hasReactions()
    {
        $reaction = $this->reactions()->whereUserId(Auth::id())->first();
        return (!is_null($reaction)) ? true : false;
    }
}
