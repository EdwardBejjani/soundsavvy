<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $user = Auth::user();
        $enrolled_courses = [];
        $purchased_items = [];
        foreach (OrderItem::where('user_id', Auth::user()->id)->get() as $order_item) {
            if ($order_item->item->type == 'course') {
                $enrolled_courses[] = $order_item->item;
            } else {
                $purchased_items[] = $order_item->item;
            }
        }
        return view('profile', compact('user', 'enrolled_courses'));
    }
}
