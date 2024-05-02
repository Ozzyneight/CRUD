<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User\User;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function update(User $user, UpdateUserRequest $request)
    {
        $data = $request->all();
        $data['image'] = Storage::put('public/images/users', $data['image']);
        $user->updateOrFail($data);
        return redirect()->route('users.index');
    }
}
