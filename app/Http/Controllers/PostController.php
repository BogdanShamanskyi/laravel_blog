<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use App\Services\PostService;

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
        $categories = Category::all();
        $postCategories = $post->categories;

        return view('posts.show', compact('post', 'categories', 'postCategories'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post = $this->postService->update($request, $post);

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $this->postService->delete($post);

        return redirect()->route('posts.index');
    }
}
