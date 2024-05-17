<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): view
    {
        $categories = Category::paginate(10);
        return view('category.categories', compact('categories'));
    }
}
