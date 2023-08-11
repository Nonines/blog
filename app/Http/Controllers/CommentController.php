<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated["user_id"] = auth()->id();
        $article = Article::find($validated["article_id"]);

        $article->comments()->create($validated);
        return redirect()->route("articles.show", $article)->with("message", "Posted successfully!");
    }

    public function reply(Comment $comment): View
    {
        $article_id = $comment->article->id;
        return view("comments.reply", compact("comment", "article_id"));
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
