<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EditController extends Controller
{
    public function edit(User $user): view
    {
        $roles = User::getRoles();
        return view('user.edit-user', ['user' => $user, 'roles' => $roles]);
    }
}
