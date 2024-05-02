<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;

class DestroyController extends Controller
{
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
