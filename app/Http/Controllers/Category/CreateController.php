<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function create()
    {
        return view('category.create-category');
    }
}
