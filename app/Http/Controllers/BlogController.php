<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        return view('blogs', [
            'blogs' => Blog::latest()->paginate(6),
            'randomBlogs' => Blog::inRandomOrder()->limit(3)->get(),
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blog', [
            'blog' => $blog,
            'randomBlogs' => Blog::inRandomOrder()->limit(3)->get(),
        ]);
    }
}
