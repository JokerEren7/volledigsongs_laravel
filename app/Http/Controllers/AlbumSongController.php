<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Song;

class AlbumSongController extends Controller
{
    public function attachSong(Request $request, Album $album, Song $song)
    {
        $album->songs()->attach($song);

        return redirect()->back()->with('success', 'Song added to album successfully.');
    }

    public function detachSong(Request $request, Album $album, Song $song)
    {
        $album->songs()->detach($song);

        return redirect()->back()->with('success', 'Song removed from album successfully.');
    }

}
