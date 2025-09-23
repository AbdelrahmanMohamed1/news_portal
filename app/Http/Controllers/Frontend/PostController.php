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
        $post = Post::active()->where('slug', $slug)->firstOrFail();
        $mainPost = Post::active()->where('slug', $slug)->firstOrFail();
        $posts = Post::active()->with('images')->latest()->take(3)->get();
        $post->increment('clicked');
        $post_with_images = $post->load('images');
        $catogory_posts = Post::active()->where('category_id', $post->category_id)->latest()->take(5)->get();
        $latest_three_posts=Post::active()->where('category_id', $post->category_id)->latest()->take(3)->get();
        $popular_three_posts=Post::active()->withCount('comments')->where('category_id', $post->category_id)->orderBy('comments_count','desc')->take(3)->get();
        $categories_with_posts_count=Category::withCount('posts')->orderBy('posts_count','desc')->get();
        $comments_for_post=Comment::where('post_id',$post->id)->latest()->take(3)->get();
        $comments = Comment::with('user')->where('user_id',$post->user_id)->take(5)->get();
        $user_name_of_comments=$comments[0]->user->name;
        //dd($user_name_of_comments);
        return view('frontend.post-show', compact('post', 'post_with_images','catogory_posts','latest_three_posts','popular_three_posts','posts','categories_with_posts_count','comments_for_post','user_name_of_comments','mainPost'));
    }
    public function showById($id)
    {
        $post = Post::active()->findOrFail($id);
        $mainPost = Post::active()->findOrFail($id);
        $posts = Post::active()->with('images')->latest()->take(3)->get();
        $post->increment('clicked');
        $post_with_images = $post->load('images');
        $catogory_posts = Post::active()->where('category_id', $post->category_id)->latest()->take(5)->get();
        $latest_three_posts=Post::active()->where('category_id', $post->category_id)->latest()->take(3)->get();
        $popular_three_posts=Post::active()->withCount('comments')->where('category_id', $post->category_id)->orderBy('comments_count','desc')->take(3)->get();
        $categories_with_posts_count=Category::withCount('posts')->orderBy('posts_count','desc')->get();
        $comments_for_post=Comment::where('post_id',$post->id)->latest()->take(5)->get();
        $comment_for_user=Comment::with('users')->get();
        $comments = Comment::with('user')->where('user_id',$post->user_id)->take(5)->get();
        $user_name_of_comments=$comments[0]->user->name;
        //dd($catogory_posts);
        return view('frontend.post-show', compact('post', 'post_with_images','catogory_posts','latest_three_posts','popular_three_posts','posts','categories_with_posts_count','comments_for_post','user_name_of_comments','mainPost'));
    }
    public function showMoreComments($slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();
        $comments = Comment::with('user')->where('post_id',$post->id)->get();
        //return $comments;
        return response()->json($comments);
    }
    public function addComment(Request $request)
    {
        //return $request;
        $request->validate([
            'user_id'=>['required','exists:users,id'],
            'comment'=>['required','string','max:200'],
        ]);
        $comment=Comment::create([
            'user_id'=>$request->user_id,
            'content'=>$request->comment,
            'post_id'=>$request->post_id,
            'ip_address'=>$request->ip(),
        ]);
        $comment->load('user');
        if(!$comment){
            return response()->json([
                'data'=>'Operation Failed',
                'status'=>403,
            ]);
        }
        return response()->json([
            'msg'=>'Comment Stored Succecfully',
            'data'=>$comment,
            'status'=>201,
        ]);
        
    }
}
