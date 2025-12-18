<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $segment = request()->segment(1);
        $title = ucwords(str_replace('-', ' ', $segment));

        $setting = Setting::first();

        // LIST POST (INDEX)
        $posts = Post::where('is_published', true)
            ->latest()
            ->paginate(8);

        // CATEGORIES + COUNT
        $categorys = Category::withCount('posts')->get();

        // RECENT POSTS (INDEX TIDAK PERLU EXCLUDE)
        $recentPosts = Post::where('is_published', true)
            ->latest()
            ->take(8)
            ->get();

        return view('blog.index', compact(
            'title',
            'posts',
            'setting',
            'categorys',
            'recentPosts'
        ));
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $setting = Setting::first(); // ambil logo & nama situs
        $categorys = Category::withCount('posts')->get();

        $recentPosts = Post::where('id', '!=', $post->id) // kecuali post yang sedang dibuka
            ->latest() // order by created_at desc
            ->take(8)
            ->get();

        return view('blog.show', compact('post', 'setting', 'categorys', 'recentPosts'));
    }
}
