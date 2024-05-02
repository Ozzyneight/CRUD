<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{
    public function edit(Product $product)
    {
        $categories = Category::all();
        if ($product->getImage() != null) {
            $image = Storage::disk()->url($product->getImage());
        } else {
            $image = Storage::disk()->url('public/images/products/place-holder-image.png');
        }
        return view('product.edit-product', ['product' => $product, 'image' => $image, 'categories' => $categories]);
    }
}
