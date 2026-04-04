<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    public function edit(User $user)
    {
        return view('users.update-password', compact('user'));
    }
    
    /**
     * Update the user's password.
     */
    public function update(User $user, Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            /* 'current_password' => ['required', 'current_password'], */
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        User::findOrFail($user->id)->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Palavra Pass actualizada!');
    }
}
