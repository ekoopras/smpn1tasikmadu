<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Media;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Slideshow;
use App\Models\Youtube;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slideshow::where('is_active', true)
            ->orderBy('order')
            ->get();

        $setting = Setting::getSettings(); // ambil logo & nama situs

        $posts = Post::where('is_published', true)->latest()->take(10)->get();

        $youtubes = Youtube::all()->map(function ($youtube) {
            // Ambil video ID dari URL
            if (preg_match('/(v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $youtube->url, $matches)) {
                $youtubeId = $matches[2];
                $youtube->thumbnail = "https://img.youtube.com/vi/{$youtubeId}/hqdefault.jpg";
            } else {
                $youtube->thumbnail = null;
            }
            return $youtube;
        });

        $gurus = Guru::all();

        $medias = Media::where('slug', 'gambar-pak-kepala')->first();

        return view('home', compact('slides', 'setting', 'posts', 'youtubes', 'gurus', 'medias'));
    }
}
