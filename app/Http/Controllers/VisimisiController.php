<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Visimisi;
use Illuminate\Http\Request;

class VisimisiController extends Controller
{
    public function index (){

        $setting = Setting::getSettings(); // ambil logo & nama situs

        $segment = request()->segment(1);
        $title = ucwords(str_replace('-', ' ', $segment));
        $visimisis = Visimisi::first();

        return view('page.visi-misi', compact('setting', 'title', 'visimisis'));
    }
}
