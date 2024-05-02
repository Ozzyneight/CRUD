<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('product.create-product', compact('categories'));
    }
}
