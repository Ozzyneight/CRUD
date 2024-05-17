<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): view
    {
        $users = User::paginate(10);
        return view('user.users', compact('users'));
    }
}
