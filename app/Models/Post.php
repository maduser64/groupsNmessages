<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'content',
    ];

    public function user()
	{
		return $this->belongsTo("App\Models\User");
	}

    public function group()
    {
        return $this->belongsTo("App\Models\Group");
    }

    public function comments()
    {
        return $this->hasMany("App\Models\Comment");
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
