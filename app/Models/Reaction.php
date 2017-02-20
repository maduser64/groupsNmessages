<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'reactable_id',
        'reactable_type',
        'reaction_type',
    ];

    public function user()
	{
		return $this->belongsTo("App\Models\User");
	}

    public function post()
    {
        return $this->morphedByMany('App\Models\Post');
    }

    public function comment()
    {
        return $this->morphedByMany("App\Models\Comment");
    }

    public function reply()
    {
        return $this->morphedByMany("App\Models\Reply");
    }
}
