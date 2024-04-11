<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function store(User $user)
    {
        $data = request()->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'middle_name' => 'string|required',
            'email' => 'string|required',
            'date_of_birthday' => 'date|required',
            'password' => 'string|required',

        ]);
        User::create($data);
        return redirect()->route('users.index');
    }
}
