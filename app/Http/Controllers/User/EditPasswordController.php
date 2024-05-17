<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\View\View;

class EditPasswordController extends Controller
{
    public function edit(User $user): view
    {
        return view('user.edit-user-password', compact('user'));
    }
}
