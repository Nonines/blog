<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Category\StoreRequest;

class CategoryController extends Controller
{
    public function create(): View
    {
        return view("categories.create");
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Category::create($validated);
        return redirect()->route("admin.categories")->with("message", "Success");
    }

    public function show(Category $category): View
    {
        $category_articles = Article::whereBelongsTo($category)->paginate(6);
        return view("categories.show", compact("category", "category_articles"));
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route("admin.categories")->with("message", "Deleted");
    }
}
