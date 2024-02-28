<?php

namespace App\Http\Controllers\Account\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Account\LoginRequest;




class AccountLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('account.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('account')->attempt($credentials)) {
            return to_route('account.home');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout()
    {
        Auth::guard('account')->logout();

        return redirect('/');
    }
}
