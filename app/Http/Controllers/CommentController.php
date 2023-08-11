<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated["user_id"] = auth()->id();
        $article = Article::find($validated["article_id"]);

        $article->comments()->create($validated);
        return redirect()->back()->with("message", "Posted successfully!");
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
