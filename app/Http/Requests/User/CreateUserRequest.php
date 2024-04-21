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
        if ($this->getMethod() == 'POST') {
            $rules = [
                'first_name' => 'string|max:50|required',
                'last_name' => 'string|max:50|required',
                'middle_name' => 'string|max:50',
                'email' => 'email|max:100|required|unique:users,email',
                'date_of_birthday' => 'date|required|max:10|before_or_equal:today',
                'password' => 'string|max:255|required',
                'image' => 'image|required',
            ];
        } else {
            $rules = [
                'first_name' => 'string|max:50|required',
                'last_name' => 'string|max:50|required',
                'middle_name' => 'string|max:50',
                'email' => 'email|max:100|required',
                'date_of_birthday' => 'date|required|max:10|before_or_equal:today',
                'password' => 'string|max:255|required',
                'image' => 'image|required',
            ];
        }
        return $rules;
    }
}
