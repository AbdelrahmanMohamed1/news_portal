<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug){
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts_related_to_category = Post::with('images')->where('category_id', $category->id)->latest()->paginate(9);
        $more_posts_from_same_category=Post::select('id','title','slug')->where('category_id', $category->id)->inRandomOrder()->take(5)->get();
        return view('frontend.category', compact('posts_related_to_category','category','more_posts_from_same_category'));
    }
}
