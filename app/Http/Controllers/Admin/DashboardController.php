<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard ()
    {
        $totalBlogs = Blog::count();
        $totalCourses = Course::count();
        return view('admin.dashboard', compact('totalBlogs', 'totalCourses'));
    }
    
}
