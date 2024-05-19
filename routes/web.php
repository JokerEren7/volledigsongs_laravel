<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumSongController;
use App\Http\Controllers\SongAlbumController;

Route::resource('songs', SongController::class)->only(['index', 'show','create']);
Route::resource('albums', AlbumController::class)->only(['index', 'show','create']);
Route::resource('bands', BandController::class)->only(['index', 'show','create']);

Route::middleware(['auth'])->group(function () {

    Route::resource('songs', SongController::class)->except(['index', 'show','create']);
    Route::resource('bands', BandController::class)->except(['index', 'show','create']);
    Route::resource('albums', AlbumController::class)->except(['index', 'show','create']);

    Route::post('/albums/{album}/attach-song/{song}', [AlbumSongController::class, 'attachSong'])->name('albums.attach-song');
    Route::delete('/albums/{album}/detach-song/{song}', [AlbumSongController::class, 'detachSong'])->name('albums.detach-song');

    Route::post('/songs/{song}/attach-album/{album}', [SongController::class, 'attachAlbum'])->name('songs.attach-album');
    Route::delete('/songs/{song}/detach-album/{album}', [SongController::class, 'detachAlbum'])->name('songs.detach-album');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard')->withoutMiddleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
