<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\RollbarHandler;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('vendor');
    }
    public function dashboard()
    {
        $users = User::where('role', '!=', 'admin')->paginate(10);
        return view('dashboard.vendor.index', compact('users'));
    }
}
