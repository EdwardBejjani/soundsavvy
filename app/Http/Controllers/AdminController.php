<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard(User $user)
    {
        $users = User::where('role', '!=', 'admin')->filter()->paginate(10);
        return view('dashboard.admin.index', compact('users'));
    }
}
