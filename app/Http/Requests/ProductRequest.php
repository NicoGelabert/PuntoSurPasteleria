<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => ['required', 'max:2000'],
            'category' => ['nullable', 'string'],
            'categories_id' => ['nullable', 'numeric'],
            'image' => ['nullable', 'image'],
            'prices' => ['nullable', 'array'],
            'prices.id' => ['nullable', 'numeric', 'exists:prices,id'],
            'description' => ['nullable', 'string'],
            'published' => ['required', 'boolean'],
        ];
    }
}
