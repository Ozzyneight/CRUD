<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function update(User $user, CreateUserRequest $request)
    {
        $data = $request->validated();
        $data['image'] = Storage::put('public/images', $data['image']);
        $user->updateOrFail($data);
        return redirect()->route('users.index');
    }
}
