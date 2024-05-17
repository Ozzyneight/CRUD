<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function show(User $user): view
    {
        return view('user.user', compact('user'));
    }
}
