<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class SettingsController extends Controller
{
    public function change_password()
    {
        return view('settings.change-password');
    }

    public function update_password(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => bcrypt($validated['password']),
        ]);

        return back()->with('success','Password changed succesfully');
    }
}
