<?php

namespace App\Services;

use App\Http\Requests\UpdatePostRequest;
use App\Post;
use File;

class UpdatePostService
{
    public static function make(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->except('file'));

        if(isset($request->check_delete_old)) :
            File::delete(public_path('PostsFiles').'/'.$post->file);
            $post->file = null;
            $post->save();
        endif;

        if($request->hasFile('file')) :
            $file = $request->file('file');
            $file_name = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('PostsFiles'), $file_name);
            $post->file = $file_name;
            $post->save();
        endif;

        $post->categories()->detach();
        $post->categories()->attach($request->input('categories'));
        return $post;
    }
}