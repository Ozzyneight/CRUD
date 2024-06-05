<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\Cart;
use App\Models\User\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DestroyProductController extends Controller
{
    public function destroy(Product $product): RedirectResponse
    {
        Auth::user()->getCart()->products()->detach($product);
        return redirect()->back();
    }
}
