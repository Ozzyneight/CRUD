<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
