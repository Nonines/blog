<?php

namespace App\Http\Requests\Article;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class DestroyRequest extends FormRequest
{

    public function authorize(): bool
    {
        return $this->route("article")->author->id === Auth::id(); // use gates
    }

    public function rules(): array
    {
        return [];
    }
}
