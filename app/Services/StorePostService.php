<?php

namespace App\Services;

use App\Http\Requests\StorePostRequest;
use App\Post;

class StorePostService
{
	public static function make(StorePostRequest $request)
	{
		if($request->hasFile('file')) :
            $file = $request->file('file');
            $file_name = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('PostsFiles'), $file_name);
        endif;
        
		$post = new Post();
		$post->name = $request->name;
        $post->content = $request->content;
        $post->file = $file_name ?? null;
        $post->save();
        $post->categories()->attach($request->input('categories'));
        return $post;
	}
}