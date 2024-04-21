<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ShowController extends Controller
{
    public function show(User $user)
    {
        $image = Storage::disk()->url($user->image);
        return view('user.user', ['user' => $user, 'image' => $image]);
    }
}
