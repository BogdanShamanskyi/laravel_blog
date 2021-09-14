<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCommentRequest;
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

    public function getComments($commentable_type, $commentable_id): Collection
    {
    	$comments = Comment::query()->where('commentable_id', $commentable_id);
    	$comments = $comments->where('commentable_type', $commentable_type)->get();

    	foreach($comments as $comment) {
            $comment->date = $comment->created_at->diffForHumans();
        }

    	return $comments;
    }

    public function postComment(PostCommentRequest $request, $type, $id): Comment
    {
        $comment = $this->commentService->create($request->commentData($type, $id));
    	$comment->date = $comment->created_at->diffForHumans();

    	return $comment;
    }
}
