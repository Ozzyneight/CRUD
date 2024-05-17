<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserPasswordRequest;
use App\Models\User\User;
use Illuminate\Http\RedirectResponse;

class UpdatePasswordController extends Controller
{
    public function update(User $user, UpdateUserPasswordRequest $request): RedirectResponse
    {
        $data = $request->all();
        $user->updateOrFail($data);
        return redirect()->route('users.index');
    }
}
