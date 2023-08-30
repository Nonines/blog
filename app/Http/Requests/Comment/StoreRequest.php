<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "content" => ["required", "string"],
            "name" => ["required", "string"],
            "article_id" => ["required", "exists:articles,id"],
            "parent_id" => ["sometimes", "exists:comments,id"],
        ];
    }
}
