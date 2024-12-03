<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        return view('page/home');
    }
    public function about()
    {
        return view('page/about');
    }
    public function contact()
    {
        return view('page/contact');
    }
    public function shop()
    {
        return view('page/shop/show');
    }
    public function learn()
    {
        return view('page/learn/show');
    }
    public function item()
    {
        return view('page/shop/item');
    }
    public function course()
    {
        return view('page/learn/course');
    }
    public function cart()
    {
        return view('page/shop/cart');
    }
}
