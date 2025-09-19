<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->increment('clicked');
        // Logic to display a single post based on the slug
        
        return view('frontend.post-show',compact('post'));
    }
}
