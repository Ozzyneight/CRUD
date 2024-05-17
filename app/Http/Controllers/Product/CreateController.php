<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateController extends Controller
{
    public function create(): view
    {
        $categories = Category::all();
        return view('product.create-product', compact('categories'));
    }
}
