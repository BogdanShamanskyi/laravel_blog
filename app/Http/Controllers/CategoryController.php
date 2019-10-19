<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

use App\Services\StoreCategoryService as StoreCategory;
use App\Services\UpdateCategoryService as UpdateCategory;
use App\Services\DeletePostService as DeletePost;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = StoreCategory::make($request);
        return redirect()->route('categories.show', ['id' => $category->id]);
    }

    public function show(Category $category)
    {
        return view('categories.show', [
            'posts' => $category->posts()->paginate(5),
            'categories' => Category::get()
        ]);
    }

    public function edit(Category $category)
    {
        return view('categories.edit', ['category'=>$category]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        UpdateCategory::make($request, $category);
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        DeletePost::dropAll($category->posts);
        $category->comments()->delete();
        $category->delete();
        return redirect()->route('categories.index');
    }
}
