<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(5);
        return view('home.blog', compact('blogs'));
    }

    public function blog_detail($id)
    {
        $blog = Blog::find($id);
        return view('home.blog_detail', compact('blog'));
    }
}
