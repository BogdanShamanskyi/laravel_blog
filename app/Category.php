<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name', 'description'
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function posts()
    {
    	return $this->belongsToMany(Post::class);
    }
}
