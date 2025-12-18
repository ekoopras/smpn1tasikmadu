<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        $setting = Setting::first();
        $categorys = Category::withCount('posts')->get();

        $recentPosts = Post::latest()
            ->take(8)
            ->get();

        return view('page.show', compact(
            'page',
            'setting',
            'categorys',
            'recentPosts'
        ));
    }
}
