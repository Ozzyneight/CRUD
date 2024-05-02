<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function store(CreateProductRequest $request)
    {
        $data = $request->all();
        $data['image'] = Storage::put('public/images/products', $data['image']);
        Product::create($data);
        return redirect()->route('products.index');
    }
}
