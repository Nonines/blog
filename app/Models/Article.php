<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ["title", "excerpt", "image", "caption", "content", "category_id"];


    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, "author_id");
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // public function tags(): BelongsToMany
    // {
    //     return $this->belongsToMany(Tag::class);
    // }

    // public function comments(): HasMany
    // {
    //     return $this->hasMany(Comment::class)->whereNull("parent_id");
    // }
}
