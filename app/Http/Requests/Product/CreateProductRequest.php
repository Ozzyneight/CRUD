<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'title' => 'string|max:50|required',
            'weight' => 'integer|required',
            'amount' => 'integer|required',
            'cost' => 'integer|required',
            'category_id' => 'integer|required',
            'date_of_delivery' => 'date|required|max:10|before_or_equal:today',
            'image' => 'image|required',
        ];
    }
}
