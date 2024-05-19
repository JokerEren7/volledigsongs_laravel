<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;

class SongAlbumController extends Controller
{
    public function attachAlbum(Song $song, Album $album)
    {
        $song->albums()->attach($album);

        return redirect()->route('songs.edit', ['song' => $song->id]);
    }

    public function detachSong(Request $request, Album $album, Song $song)
{
    $album->songs()->detach($song->id);

    return redirect()->back()->with('success', 'Song removed from album successfully.');
}

}
