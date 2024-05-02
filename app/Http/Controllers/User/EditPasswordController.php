<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;

class EditPasswordController extends Controller
{
    public function edit(User $user)
    {
        return view('user.edit-user-password', compact('user'));
    }
}
