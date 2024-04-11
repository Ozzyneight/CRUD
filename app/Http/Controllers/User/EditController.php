<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edit(User $user)
    {
        return view('user.userEdit', compact('user'));
    }
}
