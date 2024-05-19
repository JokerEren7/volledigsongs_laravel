<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::all();
        return view('bands.index', compact('bands'));
    }

    public function create()
    {
        return view('bands.create');
    }

    public function store(Request $request)
    {
        // Validatie
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'founded' => 'required|integer|min:1800|max:' . date('Y'),
        ]);

        Band::create($validatedData);

        return redirect()->route('bands.index');
    }

    public function show($id)
    {
        $band = Band::findOrFail($id);
        return view('bands.show', compact('band'));
    }

    public function edit($id)
    {
        $band = Band::findOrFail($id);
        return view('bands.edit', compact('band'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'founded' => 'required|numeric|digits:4',
            'active_till' => 'required|string|max:255',

        ]);

    
        $band = Band::findOrFail($id);
         $band->update($validatedData);

        return redirect()->route('bands.index');
    }

    public function destroy($id)
    {
        Band::destroy($id);
        // $band->delete?();

        return redirect()->route('bands.index')->with('success', 'Band is verwijderd!');
    }
}
