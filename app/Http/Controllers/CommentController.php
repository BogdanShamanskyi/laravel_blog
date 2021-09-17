<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Database\Eloquent\Collection;

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
        return $this->commentService->getPostComments($id);
    }
}
