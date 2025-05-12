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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:150',
            'description' => 'required|string|min:5',
            'price' => 'required|numeric',
            'image' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'observation' => 'nullable|string',
        ];
    }
}
