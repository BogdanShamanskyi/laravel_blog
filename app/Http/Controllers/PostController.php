<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use App\Services\StorePostService as StorePost;
use App\Services\UpdatePostService as UpdatePost;
use App\Services\DeletePostService as DeletePost;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'categories' => Category::get(),
            'posts' => Post::paginate(5)
        ]);
    }

    public function create()
    {
        return view('posts.create', ['categories' => Category::get()]);
    }

    public function store(StorePostRequest $request)
    {
        $post = StorePost::make($request);
        return redirect()->route('posts.show', ['id'=> $post->id]);
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
        return view('posts.edit', [
            'post' => $post,
            'categories'=>Category::get()
        ]);
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
