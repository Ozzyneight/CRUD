<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function store(Product $product): RedirectResponse
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cart->products()->attach($product);
        return redirect()->back();
    }
}
