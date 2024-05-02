<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('user.users', compact('users'));
    }
}
