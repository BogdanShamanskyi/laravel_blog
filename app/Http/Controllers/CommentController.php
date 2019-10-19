<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function getComments($commentable_type, $commentable_id) 
    {
    	$comments = Comment::where('commentable_id', $commentable_id);
    	$comments = $comments->where('commentable_type', $commentable_type)->get();
    	foreach($comments as $comment) {
            $comment->date = $comment->created_at->diffForHumans();
        }
    	return $comments;
    }

    public function postComment($type, $id, Request $request) 
    {
    	$this->validate($request, [
    		'author' => 'required|by_author',
    		'content' => 'required'
    	]);

    	$comment = new Comment();
    	$comment->author = $request->author;
    	$comment->content = $request->content;
    	$comment->commentable_id = $id;
    	$comment->commentable_type = $type;
    	$comment->save();
    	$comment->date = $comment->created_at->diffForHumans();
    	return $comment;
    }
}
