<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\ImageTrait;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    use ImageTrait;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => 'nullable|image|file|max:2048',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
       
        if (array_key_exists('image', $validated)) {
            $this->generateName($request->file('image'));
            $validated['image'] = $this->getImageName();

            $request->file('image')->move(User::getPathImage(), $validated['image']);
        }

        $permissionAdm = Permission::where('name', 'default')->first();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'image' => $validated['image'],
            'password' => Hash::make($validated['password']),
            'permission_id' => $permissionAdm->id,
        ]);

        event(new Registered($user));

        return redirect(route('users.index', absolute: false));
    }
}
