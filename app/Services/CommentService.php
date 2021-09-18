<?php

namespace App\Services;

use App\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentService
{
    public function make(array $data): Comment
    {
        $comment = Comment::create($data);
        $comment->date = $comment->created_at->diffForHumans();

        return $comment;
    }

    public function get(int $id, string $type): Collection
    {
        $comments = Comment::query()
            ->where('commentable_id', $id)
            ->where('commentable_type', $type)
            ->get();

        foreach($comments as $comment) {
            $comment->date = $comment->created_at->diffForHumans();
        }

        return $comments;
    }
}