<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('roles.user.profile', compact('user'));
    }

    public function edit(User $user)
    {
        if (Auth::id() !== $user->user_id) {
            abort(404);
        }
        $editing = true;
        $posts = $user->posts()->paginate(5);

        return view('users.edit', compact('user', 'editing', 'posts'));
    }

    public function update(User $user)
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'bio' => 'nullable|min:1|max:255'
        ]);

        $user->update($validated);

        return redirect()->route('users.profile');
    }

    public function profile()
    {
        return $this->show(Auth::user());
    }
}
