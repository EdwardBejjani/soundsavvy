<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $items = Item::where('type', 'product')->paginate(12);
        return view('page/shop/show', compact('items'));
    }
    public function learn()
    {
        return view('page/learn/show');
    }
    public function product(Item $item)
    {
        return view('page/shop/item', compact('item'));
    }
    public function course(Item $item)
    {
        return view('page/learn/course', compact('item'));
    }
}
