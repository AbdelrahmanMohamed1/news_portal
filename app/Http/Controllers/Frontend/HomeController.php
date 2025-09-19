<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('images')->latest()->paginate(9);
        $oldest_three_news=Post::oldest()->take(3)->get();
        $popular_three_news=Post::withCount('comments')->orderBy('comments_count','desc')->take(3)->get();

        $category_posts=[];
        $categories=Category::all();
        foreach($categories as $category){
            $category_posts[$category->name]=Category::with(['posts'=>function($q){
                $q->latest()->take(2);
            }])->find($category->id);
        }

        //dd($category_posts);
        return view('frontend.index', compact('posts','oldest_three_news','popular_three_news','category_posts'));
    }
}
