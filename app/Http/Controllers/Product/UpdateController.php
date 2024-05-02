<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function update(Product $product, UpdateProductRequest $request)
    {
        $data = $request->all();
        $data['image'] = Storage::put('public/images/products', $data['image']);
        $product->updateOrFail($data);
        return redirect()->route('products.index');
    }
}
