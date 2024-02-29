<?php

namespace App\Http\Controllers\Account\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\RegisterRequest;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('account.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // Validation passed, create a new account
        $account = Account::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Log in the user
        Auth::guard('account')->login($account);

        return to_route('account.home')->with('success', __('Registration successful'));
    }
}
