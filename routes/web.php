<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VisimisiController;
use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/visi-misi', [VisimisiController::class, 'index'])->name('visi-misi');
Route::get('/youtube-list', [YoutubeController::class, 'index'])->name('youtube-list');
Route::get('/guru', [GuruController::class, 'index'])->name('guru');


Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


