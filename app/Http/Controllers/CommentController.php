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

    public function getComments(string $type, int $id): Collection
    {
        return $this->commentService->get($id, $type);
    }

    public function postComment(PostCommentRequest $request, string $type, int $id): Comment
    {
        return $this->commentService->make($request->commentData($id, $type));
    }
}
