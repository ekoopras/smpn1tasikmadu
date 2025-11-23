<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    protected $fillable = [
        'title',
        'caption',
        'image_path',
        'is_active',
        'order',
    ];
}
