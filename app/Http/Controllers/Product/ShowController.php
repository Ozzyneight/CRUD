<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShowController extends Controller
{
    public function show(Product $product)
    {
        if ($product->getImage() != null) {
            $image = Storage::disk()->url($product->getImage());
        } else {
            $image = Storage::disk()->url('public/images/products/place-holder-image.png');
        }
        return view('product.product', ['product' => $product, 'image' => $image]);
    }
}
