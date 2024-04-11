<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(User $user)
    {
        $data = request()->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'middle_name' => 'string|required',
            'email' => 'string|required',
            'date_of_birthday' => 'date|required',
            'password' => 'string|required',
        ]);
        $user->updateOrFail($data);
        return redirect()->route('users.index');
    }
}
