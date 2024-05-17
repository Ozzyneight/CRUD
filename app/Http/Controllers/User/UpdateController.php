<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UpdateController extends Controller
{
    public function update(User $user, UpdateUserRequest $request): RedirectResponse
    {
        $data = $request->all();
        $user->addMedia($request->file('image'))
            ->toMediaCollection('avatars');
        $user->updateOrFail($data);
        return redirect()->route('users.index');
    }
}
