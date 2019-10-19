<?php

namespace App\Services;

use File;

class DeletePostService
{
	public static function dropAll($posts)
	{
		foreach($posts as $post) {
			File::delete(public_path('PostsFiles').'/'.$post->file);
	        $post->categories()->detach();
	        $post->comments()->delete();
	        $post->delete();
		}
	}
}