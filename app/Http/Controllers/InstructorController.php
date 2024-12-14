<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class InstructorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('instructor');
    }
    public function dashboard()
    {
        $users = User::where('role', '!=', 'admin')->paginate(10);
        return view('dashboard.instructor.index', compact('users'));
    }
}
