<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(5);
        $categories = Category::paginate(5);
        return view('home.blog', compact('blogs','categories'));
    }

    public function blog_detail($id)
    {
        $blog = Blog::find($id);
        $blogs = Blog::orderBy('id', 'desc')->paginate(5);
        $categories = Category::paginate(5);
        return view('home.blog_detail', compact('blog','categories','blogs'));
    }
}
