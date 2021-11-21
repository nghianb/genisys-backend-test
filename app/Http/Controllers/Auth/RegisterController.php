<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $attributes = array_merge($request->only(['name', 'email']), [
            'password' => bcrypt($request->input('password'))
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect()->route('home');
    }
}
