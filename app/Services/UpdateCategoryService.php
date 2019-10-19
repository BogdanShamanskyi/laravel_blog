<?php

namespace App\Services;

use App\Http\Requests\UpdateCategoryRequest;
use App\Category;

class UpdateCategoryService
{
	public static function make(UpdateCategoryRequest $request, Category $category)
	{
		$category->name = $request->name;
		$category->description = $request->description;
		$category->save();
        return $category;
	}
}