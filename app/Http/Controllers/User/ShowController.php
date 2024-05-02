<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Support\Facades\Storage;

class ShowController extends Controller
{
    public function show(User $user)
    {
        if ($user->getImage() != null) {
            $image = Storage::disk()->url($user->getImage());
        } else {
            $image = Storage::disk()->url('public/images/users/place-holder-image.png');
        }
        return view('user.user', ['user' => $user, 'image' => $image]);
    }
}
