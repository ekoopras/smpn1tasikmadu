<?php

namespace App\Http\Controllers;

use App\Models\Youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function index(){
        $segment = request()->segment(1);
        $title = ucwords(str_replace('-', ' ', $segment));
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

        return view('page.youtube-list', compact('title', 'youtubes'));
    }
}
