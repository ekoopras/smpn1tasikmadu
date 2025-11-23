<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   
    public function index ()
    {
        $segment = request()->segment(1);
        $title = ucwords(str_replace('-', ' ', $segment));
        $setting = Setting::first(); // ambil logo & nama situs
        $posts = Post::where('is_published', true)->latest()->paginate(10);

        return view('blog.index', compact('title', 'posts', 'setting'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $setting = Setting::first(); // ambil logo & nama situs
        $categorys = Category::all();


        return view('blog.show', compact('post', 'setting', 'categorys'));
    }

}
