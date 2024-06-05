<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'first_name' => 'string|max:191|required',
            'last_name' => 'string|max:191|required',
            'middle_name' => 'string|max:191',
            'date_of_birthday' => 'date|required|max:10|before_or_equal:today',
            'phone' => 'required|digits_between:11,12|numeric|unique:users,phone',
            'email' => 'email|max:100|required|unique:users,email',
            'password' => 'string|max:32|required',
            'image' => 'image|required',
            'role' => 'integer|required'
        ];
    }
}
