<?php

namespace App\Http\Requests\Article;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->route("article")->author->id === Auth::id();
    }

    public function rules(): array
    {
        return [
            "title" => ["required"],
            "excerpt" => ["required", "min:10"],
            "content" => ["required", "min:50"],
            "category_id" => ["required", "exists:App\Models\Category,id"],
            "tags" => ["required", "exists:App\Models\Tag,id"],
            "caption" => ["min:10"],
            "image" => ["sometimes", "image"]
        ];
    }
}
