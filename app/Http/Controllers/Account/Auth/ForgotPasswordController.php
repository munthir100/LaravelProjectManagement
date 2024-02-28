<?php

namespace App\Http\Controllers\Account\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\Auth\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('account.auth.forgetPassword');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        // Validation passed, reset the password
        $status = Password::broker('accounts')->reset(
            $request->only('email', 'password', 'password_confirmation'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        // Check the reset password status
        if ($status == Password::PASSWORD_RESET) {
            return redirect('/login')->with('status', __($status));
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }
}
