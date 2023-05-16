<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;
use Hidehalo\Nanoid\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return Inertia::render('User/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            // TODO stricter password rules for production
            'password' => ['required', 'confirmed', Password::min(4)]
        ]);

        $user = new User();
        $nanoidGenerator = new Client();

        $user->id = $nanoidGenerator->generateId(mode: Client::MODE_DYNAMIC);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);

        $user->save();
        Auth::login($user);

        return to_route('users.show', ['user' => $user]);
    }

    public function show(User $user)
    {
        return Inertia::render('User/Show', ['user' => $user]);
    }
}
