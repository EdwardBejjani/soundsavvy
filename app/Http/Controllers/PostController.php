<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function edit(Post $post)
    {
        if (Auth::id() == $post->user_id) {
            $editing = true;
            return view('post.show', compact('post', 'editing'));
        } else {
            abort(403);
        }
    }
    public function update(Post $post)
    {
        if (Auth::id() == $post->user_id) {

            request()->validate([
                'content' => 'required|min:5|max:240'
            ]);
            $post->content = request()->get('content', '');
            $post->save();
            return redirect()->route('post.show', $post)->with('success', 'Post updated successfully!');
        } else {
            abort(403);
        }
    }
    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $validated['user_id'] = Auth::user()->id;

        Post::create($validated);
        //same but simpler: 'content' => request()->idea
        //request()->all()\\
        //request()->except(whatever you don't want)
        //request()->only(whatever you do want)
        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');

        //returns to the previous page: return redirect()->back()->with(...)
    }
    public function destroy(Post $post)
    {
        if (Auth::id() == $post->user_id) {
            $post->delete();

            return redirect()->route('dashboard')->with('success', 'Post deleted successfully!');
        } else {
            abort(403);
        }
    }
}
