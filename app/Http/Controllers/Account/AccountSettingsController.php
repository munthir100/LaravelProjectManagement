<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccountResource;
use App\Http\Requests\Account\UpdateAccountSettingsRequest;

class AccountSettingsController extends Controller
{
    public function showSettings()
    {
        $account = new AccountResource(auth()->user('account'));
        return view('account.settings', compact('account'));
    }

    public function updateSettings(UpdateAccountSettingsRequest $request)
    {
        // Validation passed, update the user's profile fields
        $user = request()->user('account');
        $user->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('account.settings')->with('success', 'Profile updated successfully.');
    }
}
