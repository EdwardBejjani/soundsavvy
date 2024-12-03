<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    public function like(Post $post)
    {
        $liker = Auth::user();
        $liker->likes()->attach($post);
        return redirect()->route('dashboard')->with('success', 'Liked successfully!');
    }

    public function unlike(Post $post)
    {
        $liker = Auth::user();
        $liker->likes()->detach($post);
        return redirect()->route('dashboard')->with('success', 'Unliked successfully!');
    }
}
