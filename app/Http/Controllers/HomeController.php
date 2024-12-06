<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;

class HomeController extends Controller
{
    public function getListOfCoursesAndBlogs()
    {
        $courses = Course::select('id', 'title', 'description', 'thumbnail', 'price')->limit(6)->get();
        $blogs = Blog::select('id', 'title', 'author', 'published_at', 'thumbnail', 'content')->limit(6)->get();

        return view('home.index', compact('courses', 'blogs'));
    }

}
