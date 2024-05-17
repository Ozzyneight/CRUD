<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function update(Product $product, UpdateProductRequest $request): RedirectResponse
    {
        $data = $request->all();
        $product->addMedia($request->file('image'))
            ->toMediaCollection('products');
        $product->updateOrFail($data);
        return redirect()->route('products.index');
    }
}
