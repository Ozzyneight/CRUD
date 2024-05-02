<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Product\Category;

class UpdateController extends Controller
{
    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $data = $request->all();
        $category->updateOrFail($data);
        return redirect()->route('categories.index');
    }
}
