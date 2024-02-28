<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Account\UpdateSecurityRequest;

class AccountSecurityController extends Controller
{
    function showSecurity()
    {
        return view('account.security');
    }

    public function updateSecurity(UpdateSecurityRequest $request)
    {
        $user = request()->user('account');

        // Verify the old password
        if (!Hash::check($request->input('old_password'), $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        // Update the password
        $user->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully!');
    }
}
