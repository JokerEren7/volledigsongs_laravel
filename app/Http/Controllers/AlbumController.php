<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Song;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      

        public function index()
        {
            $albums = Album::all();
            return view('albums.index', compact('albums'));
        }
    
        public function create()
        {
            return view('albums.create');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'year' => 'nullable|integer',
                'times_sold' => 'nullable|integer',
            ]);
    
            Album::create($request->all());
    
            return redirect()->route('albums.index')->with('success', 'Album created successfully.');
        }
    
        public function show($id)
        {
            $album = Album::findOrFail($id);
            $songs = $album->songs;

            return view('albums.show', compact('album', 'songs'));
        }
    
        public function edit($id)
        {
            $album = Album::findOrFail($id);  
            $songs = Song::All();
            if (!$album) {
                return redirect()->route('albums.index')->with('error', 'Album not found.');
            }
        
            return view('albums.edit', compact('album', 'songs'));
        }
    
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'year' => 'nullable|integer',
                'times_sold' => 'nullable|integer',
            ]);
    
            $album = Album::find($id);
            $album->update($request->all());
    
            return redirect()->route('albums.index')->with('success', 'Album updated successfully.');
        }
    
        public function destroy($id)
        {
            Album::destroy($id);
            //$album->delete();
    
            return redirect()->route('albums.index')->with('success', 'Album deleted successfully.');
        }


      
    }

