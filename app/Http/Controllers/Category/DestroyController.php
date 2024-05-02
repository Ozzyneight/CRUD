<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use App\Models\Product\Product;

class DestroyController extends Controller
{
    public function destroy(Category $category, Product $product)
    {
        $product->whereCategoryId($category->getKey())->delete();
        $category->delete();
        return redirect()->route('categories.index');
    }
}
