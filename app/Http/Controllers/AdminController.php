<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
