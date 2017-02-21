<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups()
    {
        return $this->belongsToMany("App\Models\Group");
    }

    public function posts()
    {
        return $this->hasMany("App\Models\Post");
    }

    public function comments()
    {
        return $this->hasMany("App\Models\Comment");
    }

    public function replies()
    {
        return $this->hasMany("App\Models\Reply");
    }

    public function messages()
    {
        return $this->belongsToMany("App\Models\User", "messages");
    }

    public function postReactions()
    {
        return $this->morphedByMany('App\Models\Post', 'reactable')->whereDeletedAt(null);
    }

    public function commentReactions()
    {
        return $this->morphedByMany('App\Models\Comment', 'reactable')->whereDeletedAt(null);
    }

    public function replyReactions()
    {
        return $this->morphedByMany('App\Models\Reply', 'reactable')->whereDeletedAt(null);
    }

    public function isInGroup(Group $group)
    {
        return $this->groups->contains($group->id);
    }
}
