<?php

namespace App\Http\Controllers;

use App\Models\Visimisi;
use Illuminate\Http\Request;

class VisimisiController extends Controller
{
    public function index (){

        $segment = request()->segment(1);
        $title = ucwords(str_replace('-', ' ', $segment));
        $visimisis = Visimisi::first();

        return view('page.visi-misi', compact('title', 'visimisis'));
    }
}
