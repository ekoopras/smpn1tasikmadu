<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    protected $fillable = [
        'title',
        'url',
    ];

    // Accessor untuk embed URL
    public function getEmbedUrlAttribute(): string
    {
        $url = $this->url;

        // Cek apakah URL sudah dalam format embed
        if (str_contains($url, 'youtube.com/embed/')) {
            return $url;
        }

        // Ambil video ID dari URL standar
        if (preg_match('/v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
            $youtubeId = $matches[1];
            return "https://www.youtube.com/embed/{$youtubeId}";
        }

        // Alternatif: jika short url youtu.be
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
            $youtubeId = $matches[1];
            return "https://www.youtube.com/embed/{$youtubeId}";
        }

        // fallback jika tidak bisa parse
        return $url;
    }
}
