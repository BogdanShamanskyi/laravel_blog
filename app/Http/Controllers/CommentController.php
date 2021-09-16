<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Database\Eloquent\Collection;
use App\Comment;


class CommentController extends Controller
{
    /**
     * @var CommentService
     */
    private $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
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
