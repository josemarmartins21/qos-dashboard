<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        //dd('x');
        $this->hasDefaultAdmin();
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    private function hasDefaultAdmin()
    {
        $userExists = User::where('email', 'josemarburguel@gmail.com')
        ->exists();

        if (! $userExists) {
            $user = User::create([
                'name' => 'Josimar Martins',
                'email' => 'josemarburguel@gmail.com',
                'password' => Hash::make('teresa@2020'),
                'image' => 'josemar',
            ]);

            $user->assignPermission('adm');
        }

        
    }
}
