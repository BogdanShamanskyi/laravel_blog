<?php

namespace App\Services;

use App\Http\Requests\UpdatePostRequest;
use App\Post;

class PostService
{
	public function create(array $postData): Post
    {
        $post = new Post;
        $post->name = $postData['name'];
        $post->content = $postData['content'];
        $post->file = $postData['file'];
        $post->save();

        $post->categories()->attach($postData['categories']);

        return $post;
    }

    public function update(UpdatePostRequest $request, Post $post): Post
    {
        $post->update($request->except('file'));

        if(isset($request->check_delete_old)) {
            File::delete(public_path('PostsFiles').'/'.$post->file);
            $post->file = null;
            $post->save();
        }

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('PostsFiles'), $file_name);
            $post->file = $file_name;
            $post->save();
        }

        $post->categories()->detach();
        $post->categories()->attach($request->input('categories'));

        return $post;
    }
}