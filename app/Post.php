<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'name', 'content', 'file'
    ];

    public function categories() {
    	return $this->morphToMany(Category::class, 'categoryable');
    }

    public function comments() {
    	return $this->morphMany(Comment::class, 'commentable');
    }
}
