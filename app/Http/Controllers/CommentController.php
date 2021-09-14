<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCommentRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function getComments($commentable_type, $commentable_id): Collection
    {
    	$comments = Comment::query()->where('commentable_id', $commentable_id);
    	$comments = $comments->where('commentable_type', $commentable_type)->get();

    	foreach($comments as $comment) {
            $comment->date = $comment->created_at->diffForHumans();
        }

    	return $comments;
    }

    public function postComment($type, $id, PostCommentRequest $request): Comment
    {
    	$comment = new Comment();
    	$comment->author = $request->get('author');
    	$comment->content = $request->get('content');
    	$comment->commentable_id = $id;
    	$comment->commentable_type = $type;
    	$comment->save();
    	$comment->date = $comment->created_at->diffForHumans();

    	return $comment;
    }
}
