<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\User\Cart;
use App\Models\User\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DestroyController extends Controller
{
    public function destroy(): RedirectResponse
    {
        Auth::user()->getCart()->products()->sync([]);
        return redirect()->route('products.index');
    }
}
