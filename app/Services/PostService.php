<?php

namespace App\Services;

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
}