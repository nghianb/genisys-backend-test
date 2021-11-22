<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credientals = $request->only([
            'email',
            'password'
        ]);

        if (!Auth::attempt($credientals)) {
            throw ValidationException::withMessages([
                'login' => [trans('auth.failed')]
            ]);
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return back();
    }
}
