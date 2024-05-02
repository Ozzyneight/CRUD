<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User\User;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function store(CreateUserRequest $request)
    {
        $data = $request->all();
        $data['image'] = Storage::put('public/images/users', $data['image']);
        User::create($data);
        return redirect()->route('users.index');
    }
}
