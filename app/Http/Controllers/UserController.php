<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use App\services\users\contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct(
        private UserServiceInterface $user,
    )
    {
        $this->authorize('access-admin-area');
    }
    
    public function index(Request $request)
    {
        $users = $this->user->getAll($request->input('search'));
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        $levels = Permission::all('name');
        return view('users.show', compact('user', 'levels'));
    }

    public function edit(User $user)
    {
        $levels = Permission::all('name');
        return view('users.edit', compact('user', 'levels'));
    }

    public function update(User $user, Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'string|required|max:50|min:4',
                'email' => 'required|email|string',
                'level' => 'required|'. Rule::in(Permission::pluck('name')->toArray()),
            ]);

            $permission = Permission::where('name', $request->input('level'))->first();

            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'permission_id' => $permission->id,
            ]);

            return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Usuário actualizado com sucesso!');

        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
        
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Usuário eliminado com sucesso!');
    }
}
