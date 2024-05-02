<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('category.categories', compact('categories'));
    }
}
