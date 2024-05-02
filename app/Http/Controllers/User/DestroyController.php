<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;

class DestroyController extends Controller
{
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
