<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;

class EditController extends Controller
{
    public function edit(Category $category)
    {
        return view('category.edit-category', compact('category'));
    }
}
