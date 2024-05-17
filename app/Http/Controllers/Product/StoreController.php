<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Models\Product\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function store(CreateProductRequest $request): RedirectResponse
    {
        $data = $request->all();
        Product::create($data)->addMedia($request->file('image'))
            ->toMediaCollection('products');
        return redirect()->route('products.index');
    }
}
