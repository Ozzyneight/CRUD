<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(User $user)
    {
        $user = User::find($user->id);
        return view('user.user', compact('user'));
    }
}
