<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/logged';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['string', 'max:50', 'required'],
            'last_name' => ['string', 'max:50', 'required'],
            'middle_name' => ['string', 'max:50', 'nullable'],
            'email' => ['email', 'max:100', 'required', 'unique:users,email'],
            'date_of_birthday' => ['date', 'required', 'max:10', 'before_or_equal:today'],
            'password' => ['string', 'max:255', 'required', 'min:8', 'confirmed'],
            'image' => ['image', 'required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User\User
     */
    protected function create(array $data)
    {
        $user = User::create($data);
        $user->addMediaFromRequest('image')->toMediaCollection('avatars');
        return $user;
    }
}
