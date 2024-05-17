<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User\User;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function store(CreateUserRequest $request): RedirectResponse
    {
        $data = $request->all();
        User::create($data)->addMedia($request->file('image'))
            ->toMediaCollection('avatars');
        return redirect()->route('users.index');
    }
}
