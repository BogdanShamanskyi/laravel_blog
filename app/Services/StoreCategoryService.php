<?php

namespace App\Services;

use App\Http\Requests\StoreCategoryRequest;
use App\Category;

class StoreCategoryService
{
	public static function make(StoreCategoryRequest $request)
	{
		$category = Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return $category;
	}
}