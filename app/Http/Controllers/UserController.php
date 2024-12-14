<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::where('role', '!=', 'admin')->filter()->paginate(10);
        return view('dashboard.admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('dashboard.admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('dashboard.admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);
        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        if ($user->orders()->count() > 0) {
            return redirect()->back()->with('error', 'User has orders');
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
