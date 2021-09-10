<?php

namespace App\Http\Controllers;

use App\Category;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->paginate(10);

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->only('name', 'description'));

        return redirect()->route('categories.show', $category);
    }

    public function show(Category $category)
    {
        $categories = Category::all();
        $posts = $category->posts()->paginate(5);

        return view('categories.show', compact('posts', 'categories'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->only('name', 'description'));

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->posts()->delete();
        $category->comments()->delete();
        $category->delete();

        return redirect()->route('categories.index');
    }
}
