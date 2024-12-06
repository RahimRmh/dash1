<?php

namespace App\Http\Controllers;

use App\Models\Blog;


class BlogController extends Controller
{
    
    public function index()
    {
        $blogs = Blog::select('id', 'title', 'author', 'published_at', 'thumbnail','content')->paginate(10);
        return view('blogs.index', compact('blogs'));
    }

   
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

  

   
}
