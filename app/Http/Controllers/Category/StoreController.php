<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Models\Product\Category;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function store(CreateCategoryRequest $request): RedirectResponse
    {
        $data = $request->all();
        Category::create($data);
        return redirect()->route('categories.index');
    }
}
