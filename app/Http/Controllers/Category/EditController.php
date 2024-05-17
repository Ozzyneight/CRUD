<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use Illuminate\View\View;

class EditController extends Controller
{
    public function edit(Category $category): view
    {
        return view('category.edit-category', compact('category'));
    }
}
