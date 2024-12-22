<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Monolog\Handler\RollbarHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
    public function contact(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = $request->all();
        Mail::send('emails.dashboard_contact', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });

        return redirect()->back()->with('success', 'Message sent successfully.');
    }
}
