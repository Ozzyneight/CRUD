<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\User\Cart;
use App\Models\User\Order;
use App\Models\User\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(): RedirectResponse
    {
        $order = Order::firstOrCreate(['user_id' => Auth::id()]);
        $cart = Auth::user()->getCart();
        $products = $cart->getProducts();
        $order->products()->attach($products);
        $cart->products()->sync([]);
        return redirect()->to('products');
    }
}
