<?php

namespace App\Services;

use App\Comment;

class CommentService
{
	public function create(array $data): Comment
    {
        return Comment::create($data);
    }
}