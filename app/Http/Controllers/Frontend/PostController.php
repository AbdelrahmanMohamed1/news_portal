<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $posts = Post::with('images')->latest()->take(3)->get();
        $post->increment('clicked');
        $post_with_images = $post->load('images');
        $catogory_posts = Post::where('category_id', $post->category_id)->latest()->take(5)->get();
        $latest_three_posts=Post::where('category_id', $post->category_id)->latest()->take(3)->get();
        $popular_three_posts=Post::withCount('comments')->where('category_id', $post->category_id)->orderBy('comments_count','desc')->take(3)->get();
        $categories_with_posts_count=Category::withCount('posts')->orderBy('posts_count','desc')->get();
        $comments_for_post=Comment::where('post_id',$post->id)->take(5)->get();
        $comments = Comment::with('user')->where('user_id',$post->user_id)->take(5)->get();
        $user_name_of_comments=$comments[0]->user->name;
        //dd($user_name_of_comments);
        return view('frontend.post-show', compact('post', 'post_with_images','catogory_posts','latest_three_posts','popular_three_posts','posts','categories_with_posts_count','comments_for_post','user_name_of_comments'));
    }
    public function showById($id)
    {
        $post = Post::findOrFail($id);
        $posts = Post::with('images')->latest()->take(3)->get();
        $post->increment('clicked');
        $post_with_images = $post->load('images');
        $catogory_posts = Post::where('category_id', $post->category_id)->latest()->take(5)->get();
        $latest_three_posts=Post::where('category_id', $post->category_id)->latest()->take(3)->get();
        $popular_three_posts=Post::withCount('comments')->where('category_id', $post->category_id)->orderBy('comments_count','desc')->take(3)->get();
        $categories_with_posts_count=Category::withCount('posts')->orderBy('posts_count','desc')->get();
        $comments_for_post=Comment::where('post_id',$post->id)->take(5)->get();
        $comment_for_user=Comment::with('users')->get();
        $comments = Comment::with('user')->where('user_id',$post->user_id)->take(5)->get();
        $user_name_of_comments=$comments[0]->user->name;
        //dd($catogory_posts);
        return view('frontend.post-show', compact('post', 'post_with_images','catogory_posts','latest_three_posts','popular_three_posts','posts','categories_with_posts_count','comments_for_post','user_name_of_comments'));
    }
}
