<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(): View
    {
        return view("admin.index");
    }

    public function articles(): View
    {
        $user = Auth::user();
        $user_articles = Article::whereBelongsTo($user, "author")->paginate(10);
        return View("admin.articles", compact("user_articles"));
    }

    public function articlesTrash(): View
    {
        $user = Auth::user();
        $trashed_articles = Article::onlyTrashed()->whereBelongsTo($user, "author")->paginate(10);

        return View("admin.articles_trash", compact("trashed_articles"));
    }

    public function categories(): View
    {
        return view("admin.categories");
    }

    public function tags(): View
    {
        $tags = Tag::all();
        return view("admin.tags", compact("tags"));
    }
}
