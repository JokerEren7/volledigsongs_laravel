<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;


class SongController extends Controller
{
    public function index(){
        $songs = Song::all();
        return view('index', compact('songs'));

    }

    public function show($id)
    {
        $song = Song::find($id); 
    
        return view('show', compact('song'));
    }


    public function create(Request $request)
    {
            // API key voor Last.fm
        $api_key = '07068ba3992f68ca302e21ee39754dde';
        
        $songsFromAPI = [];

       if ($request->query->has('title')) {
        $title = $request->query('title');
        $response = Http::get(
            'http://ws.audioscrobbler.com/2.0/?method=track.search&track=' .
            $title . '&api_key=' . $api_key . '&format=json'
            )->json();

        //  de lijst met nummers op uit de API-respons
        $songsFromAPI = $response["results"]["trackmatches"]["track"];

       }
    //    dd($songsFromAPI);
        return view('create', ['songsFromAPI' => $songsFromAPI]);
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'singer' => 'required|string|max:255',
        ]);
    
          Song::create($validatedData);
    
          return redirect()->route('songs.index'); 
        }

        
        public function update(Request $request, $id)
        {
            $song = Song::findOrFail($id);
            
            $request->validate([
                'title' => 'required|string|max:255',
                'singer' => 'required|string|max:255',
            ]);
        
            $song->update($request->only(['title', 'singer']));
        
            return redirect()->route('songs.index');
        }
        


public function edit($id)
{
    $song = Song::find($id);
    $albums = Album::all();
    return view('edit', compact('song', 'albums'));

}
public function destroy($id){
    $song = Song::findOrFail($id);

    $song->albums()->detach();

    $song->delete();

    return redirect()->route('songs.index');
}


public function attachAlbum(Request $request, Song $song, Album $album)
{
    $song->albums()->attach($album);

    return redirect()->back()->with('success', 'Album added to song successfully.');
}


public function detachAlbum(Request $request, Song $song, Album $album)
{
    $song->albums()->detach($album);

    return redirect()->back()->with('success', 'Album removed from song successfully.');
}



}
