<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class QueryHelper
{
    /**
     * @return mixed
     */
    public static function latest_tags(): mixed
    {
        return Tag::latest()->limit(5)->get();
    }

    /**
     * @return Collection
     */
    public static function all_categories(): Collection
    {
        return Category::all();
    }
}
