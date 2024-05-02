<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.products', compact('products'));
    }
}
