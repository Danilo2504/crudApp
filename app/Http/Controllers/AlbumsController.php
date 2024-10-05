<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::orderBy('albums.updated_at', 'desc')->get();
        return view('albums.list_albums')->with('albums', $albums);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albums.edit_album')->with('album', $album);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        // @TODO: Add validation
        $data = $request->only(['name', 'description', 'height', 'width']);

        $res = $album->update($data);
        $message_type = $res ? 'success' : 'error';
        $message = $message_type == 'success' ? 'Album updated successfully.' : 'Album could not be updated.';
        return redirect()->route('albums.index')->with('message_type', $message_type)->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $res = $album->delete();
        $message_type = $res ? 'success' : 'error';
        $message = $message_type == 'success' ? 'Album deleted successfully.' : 'Album could not be deleted.';
        return redirect()->route('albums.index')->with('message_type', $message_type)->with('message', $message);
    }
}
