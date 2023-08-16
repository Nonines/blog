<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Tag\StoreRequest;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::paginate(10);
        return view("tags.index", compact("tags"));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Tag::create($validated);
        return redirect()->route("admin.tags")->with("message", "Success");
    }

    public function show(Tag $tag): View
    {
        $tag_articles = $tag->articles()->paginate(4);
        return view("tags.show", compact("tag", "tag_articles"));
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();
        return redirect()->route("admin.tags")->with("message", "Deleted");
    }
}
