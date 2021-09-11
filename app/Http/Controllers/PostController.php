<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use App\Services\PostService;
use App\Services\UpdatePostService as UpdatePost;
use App\Services\DeletePostService as DeletePost;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = Post::query()->paginate(5);
        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        $post = $this->postService->create($request->postData());

        return redirect()->route('posts.show', $post);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => Post::find($post->id),
            'categories'=>Category::get()
        ]);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post = UpdatePost::make($request, $post);
        return redirect()->route('posts.show', ['id'=> $post->id]);
    }

    public function destroy(Post $post)
    {
        DeletePost::dropAll(array($post));
        return redirect()->route('posts.index');
    }
}
