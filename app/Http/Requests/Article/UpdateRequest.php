<?php

namespace App\Http\Requests\Article;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
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
            "image" => ["image"]
        ];
    }
}
