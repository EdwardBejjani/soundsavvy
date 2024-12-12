<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('dashboard.admin.users.show', compact('user'));
    }

    public function new()
    {
        return view('dashboard.admin.users.new');
    }

    public function create(Request $request)
    {
        $user = User::create($request->all());
        return redirect()->route('dashboard.admin.users.index');
    }

    public function edit(User $user)
    {
        return view('dashboard.admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('dashboard.admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.admin.users.index');
    }
}
