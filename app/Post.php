<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'content',
        'file',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
