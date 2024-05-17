<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function destroy(Category $category): RedirectResponse
    {
        Product::whereCategoryId($category->getKey())->delete();
        $category->delete();
        return redirect()->route('categories.index');
    }
}
