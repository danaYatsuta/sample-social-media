<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function create()
    {
        return Inertia::render('User/Create');
    }

    public function show(User $user)
    {
        return Inertia::render('User/Show');
    }
}
