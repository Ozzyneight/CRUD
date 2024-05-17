<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): view
    {
        $products = Product::paginate(10);
        return view('product.products', compact('products'));
    }
}
