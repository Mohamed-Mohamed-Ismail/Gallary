<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotoRequest;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    public function create($albumId)
    {
        return view('images.add', [
            'album' =>  Album::findOrFail($albumId)
        ]);
    }

    /**
     * @param StorePhotoRequest $request
     * @param $albumId
     * @return RedirectResponse
     */
    public function store(StorePhotoRequest $request, $albumId): RedirectResponse
    {
        $image = new Image;

        $image->name = $request->name;
        $image->image = $request->file('image')->store('images');
        $image->album_id = $albumId;

        $image->save();

        return \redirect('albums')->with('success', 'Image uploaded successfully');
    }

    /**
     * @param Image $image
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Image $image): RedirectResponse
    {
        $image->delete();

        return \redirect()->back()->with('success', 'Image deleted successfully');
    }
}
