<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\Console\Input\Input;

class AlbumController extends Controller
{
    public function index()
    {
        return view('albums.index', [
            'albums' => Album::withCount('images')->paginate(10)
        ]);
    }


    public function create()
    {
        return view('albums.create');
    }

    /**
     * @param StoreAlbumRequest $request
     * @return RedirectResponse
     */
    public function store(StoreAlbumRequest $request): RedirectResponse
    {
        $album = new Album;

        $album->name = $request->name;
        $album->cover_image = $request->file('cover_image')->store('albums');

        $album->save();

        return \redirect('albums')->with('success', 'Album created successfully');
    }

    /**
     * @param Album $album
     * @return Application|Factory|View
     */
    public function show(Album $album)
    {
        return view('albums.show', [
            'album' => $album
        ]);
    }

    /**
     * @param Album $album
     * @return Application|Factory|View
     */
    public function edit(Album $album)
    {
        return view('albums.edit', [
            'album' => $album
        ]);
    }

    public function update(UpdateAlbumRequest $request, Album $album)
    {
        if ($request->hasFile('cover_image')){
            // delete old image
            Storage::delete('albums/'.$album->cover_image);
            $album->cover_image = $request->file('cover_image')->store('albums');
        }

        $album->name = $request->name;
        $album->save();


        return \redirect('albums')->with('success', 'Album updated successfully');
    }

    public function destroy(Album $album)
    {
        $album->images()->delete();
        $album->delete();

        return "success";
    }

    public function getDeleteMove($delId, $movId)
    {
        $album = Album::with('Photos')->find($delId);
        foreach ($album->Photos as $photo) {
            $photo->album_id = $movId;
        }
        $album->save();
        $album->delete();

        return Redirect::route('albums');
    }
}
