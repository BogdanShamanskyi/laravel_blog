<?php

namespace App\Services;

use App\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentService
{
	public function create(array $data): Comment
    {
        return Comment::create($data);
    }

    public function getPostComments(int $id): Collection
    {
        $comments = Comment::query()->where('post_id', $id)->get();

        foreach($comments as $comment) {
            $comment->date = $comment->created_at->diffForHumans();
        }

        return $comments;
    }
}