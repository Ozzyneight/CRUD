<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $user = $this->route()->parameters['user'];
        return [
            'first_name' => 'string|max:50|required',
            'last_name' => 'string|max:50|required',
            'middle_name' => 'string|max:50',
            'email' => ['email', 'max:100', 'required', Rule::unique('users')->ignore($user->id)],
            'date_of_birthday' => 'date|required|max:10|before_or_equal:today',
            'image' => 'image|required',
        ];
    }
}
