<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable = [
        'title',
        'file',
        'url',
        'slug',
    ];

    // Accessor untuk URL file
    public function getFileUrlAttribute(): ?string
    {
        return $this->file ? Storage::url($this->file) : $this->external_link;
    }
    // Cek apakah file gambar
    public function getIsImageAttribute(): bool
    {
        if (!$this->file) return false;
        $ext = strtolower(pathinfo($this->file, PATHINFO_EXTENSION));
        return in_array($ext, ['jpg','jpeg','png','gif','webp']);
    }
}
