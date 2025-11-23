<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
    protected $fillable = [
        'visi',
        'misi',
    ];
    
    // Method untuk mengambil semua data
    public static function getVisimisis()
    {
        return self::first();
    }

    // Method untuk mengambil nama
    public static function getVisi()
    {
        return self::first()->visi ?? null;
    }

    // Method untuk mengambil kelas
    public static function getMisi()
    {
        return self::first()->misi ?? null;
    }

    // Method untuk menyimpan/update data
    public static function saveVisimisis($visi, $misi)
    {
        $visimisi = self::first();
        
        if ($visimisi) {
            $visimisi->update([
                'visi' => $visi,
                'misi' => $misi
            ]);
        } else {
            $visimisi = self::create([
                'visi' => $visi,
                'misi' => $misi
            ]);
        }
        
        return $visimisi;
    }


}
