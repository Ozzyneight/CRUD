<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
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
            'first_name' => 'string|max:191|required',
            'last_name' => 'string|max:191|required',
            'middle_name' => 'string|max:191',
            'date_of_birthday' => 'date|required|max:10|before_or_equal:today',
            'phone' => ['numeric', 'digits_between:11,12', 'required', Rule::unique('users')->ignore($user->getKey())],
            'email' => ['email', 'max:100', 'required', Rule::unique('users')->ignore($user->getKey())],
            'image' => 'image|required',
            'role' => 'integer|required'
        ];
    }
}
