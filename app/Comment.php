<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    protected $fillable = [
    	'author', 'content', 'post_id'
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
