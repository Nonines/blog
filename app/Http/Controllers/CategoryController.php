<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    // public function index(): View
    // {
    //     $categories = Category::paginate(4);
    //     return view("categories.index", compact("categories"));
    // }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $category): View
    {
        $category_articles = Article::whereBelongsTo($category)->paginate(6);
        return view("categories.show", compact("category", "category_articles"));
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
