<?php

namespace App\Http\Requests\Article;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->route("article")->author->id === Auth::id(); // in reality this shouldn't happen anyway, but instead of going this, use gates instead
    }

    public function rules(): array
    {
        return [
            "title" => ["required"],
            "excerpt" => ["required", "min:10", 'max:200'],
            "content" => ["required", "min:50"],
            "category_id" => ["required", "exists:categories,id"],
            "tags" => ["required", "exists:tags,id"],
            "caption" => ["min:10"],
            "image" => ["sometimes", "image"]
        ];
    }
}
