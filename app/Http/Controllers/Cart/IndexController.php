<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\User\Cart;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): view
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $products = $cart->getProducts();
        $cost = $products->sum('cost');
        return view('cart', ['products' => $products, 'cost' =>$cost]);
    }
}
