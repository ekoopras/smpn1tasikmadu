<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'logo',
        'phone',
        'email',
        'facebook',
        'instagram',
        'whatsapp',
        'youtube',
    ];

    protected $casts = [
        //
    ];

    // Accessor untuk logo URL
    public function getLogoUrlAttribute()
    {
        return $this->logo ? Storage::url($this->logo) : null;
    }

    // Method untuk mendapatkan instance setting (singleton)
    public static function getSettings()
    {
        return static::firstOrCreate([], [
            'site_name' => 'Nama Situs Saya',
            'logo' => null,
            'phone' => null,
            'email' => null,
            'facebook' => null,
            'instagram' => null,
            'whatsapp' => null,
            'youtube' => null,
        ]);
    }
}
