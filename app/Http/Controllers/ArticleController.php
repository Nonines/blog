<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Article\EditRequest;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Http\Requests\Article\DestroyRequest;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest()->filter(request(["search"]))->paginate(6);
        return view("articles.index", compact("articles"));
    }

    public function create(): View
    {
        $tags = Tag::all();
        return view("articles.create", compact("tags"));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        if ($image = $request->file("image")) {
            $validated["image"] = Storage::putFile("post-images", $image);
        }
        $article = Auth::user()->articles()->create($validated);
        $article->tags()->sync($validated["tags"]);

        return redirect()->route("articles.show", compact("article"));
    }

    public function show(Article $article): View
    {
        return view("articles.show", compact("article"));
    }

    public function edit(EditRequest $request, Article $article): View
    {
        $tags = Tag::all();

        $article_tags_ids = [];
        foreach ($article->tags as $tag) {
            $article_tags_ids[] = $tag->id;
        }

        return view("articles.edit", compact("article", "tags", "article_tags_ids"));
    }

    public function update(UpdateRequest $request, Article $article): RedirectResponse
    {
        $validated = $request->validated();
        if ($image = $request->file("image")) {
            if ($article->image && Storage::exists($article->image)) {
                Storage::delete($article->image);
            }
            $validated["image"] = Storage::putFile("post-images", $image);
        }
        $article->update($validated);
        $article->tags()->sync($validated["tags"]);

        return redirect()->back()->with("message", "Updated successfully!");
    }

    public function delete(DestroyRequest $request, Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->back()->with("message", "Trashed successfully!");
    }

    public function restore(DestroyRequest $request, Article $article): RedirectResponse
    {
        $article->restore();
        return redirect()->back()->with("message", "Article restored!");
    }

    public function destroy(DestroyRequest $request, Article $article): RedirectResponse
    {
        if ($article->image && Storage::exists($article->image)) {
            Storage::delete($article->image);
        }
        $article->forceDelete();
        return redirect()->back()->with("message", "Deleted successfully!");
    }
}
