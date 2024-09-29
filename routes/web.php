<?php

use App\Http\Controllers\AlbumsController;
use App\Models\Album;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('albums.albums')->with('albums', Album::all());
});

Route::resource('albums', AlbumsController::class);

require __DIR__ . '/auth.php';
