<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Article\StoreRequest;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest()->filter(request(["search"]))->paginate(6);
        return view("articles.index", compact("articles"));
    }

    public function create(): View
    {
        return view("articles.create");
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        if ($image = $request->file("image")) {
            $validated["image"] = Storage::putFile("post-images", $image);
        }
        $article = Auth::user()->articles()->create($validated);

        return redirect()->route("articles.show", compact("article"));
    }

    public function show(Article $article): View
    {
        return view("articles.show", compact("article"));
    }

    public function edit(Article $article)
    {
        //
    }

    public function update(Request $request, Article $article)
    {
        //
    }

    public function destroy(Article $article)
    {
        //
    }
}
