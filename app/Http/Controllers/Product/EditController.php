<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EditController extends Controller
{
    public function edit(Product $product): view
    {
        $categories = Category::all();
        return view('product.edit-product', ['product' => $product, 'categories' => $categories]);
    }
}
