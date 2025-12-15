<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Setting;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        $setting = Setting::getSettings(); // ambil logo & nama situs

        $segment = request()->segment(1);
        $title = ucwords(str_replace('-', ' ', $segment));

        $gurus = Guru::all();

        return view('page.guru', compact('setting','title', 'gurus'));
    }
}
