<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\View\View;

class CreateController extends Controller
{
    public function create(): view
    {
        $roles = User::getRoles();
        return view('user.create-user', compact('roles'));
    }
}
