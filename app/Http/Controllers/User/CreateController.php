<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function create()
    {
        return view('user.userCreate');
    }
}
