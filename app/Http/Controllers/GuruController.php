<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        $segment = request()->segment(1);
        $title = ucwords(str_replace('-', ' ', $segment));

        $gurus = Guru::all();

        return view('page.guru', compact('title', 'gurus'));
    }
}
