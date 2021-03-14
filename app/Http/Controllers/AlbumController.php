<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlbumRequest;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class AlbumController extends Controller
{
    public function getList()
    {
        $albums = Album::with('Photos')->get();

        return view('albums.index', compact('albums'));
    }

    public function getAlbum($id)
    {
        $album = Album::with('Photos')->find($id);
        return view('albums.show', compact('album'));

    }

    public function getForm()
    {
        return view('albums.create');
    }

    public function postCreate(CreateAlbumRequest $request)
    {
        $album = new Album;

        if ($request->hasFile('cover_image')) {
            $file_extension = $request->cover_image->getClientOriginalExtension();
            $file_name = time() . '' . rand() . '.' . $file_extension;
            $path = 'images/albums/covers';
            $request->cover_image->move($path, $file_name);
            $album->cover_image = url('images/albums/covers') . '/' . $file_name;
        }
        $album->name = $request->name;
        $album->save();
        return Redirect::route('show_album', array('id' => $album->id));
    }
    public function edit($id)
    {
        $album = Album::where('id',$id)->first();
        return view('albums.edit',compact('album'));
    }
    public function update(CreateAlbumRequest $request,$id)
    {
        $album = Album::where('id',$id)->first();

        if ($request->hasFile('cover_image')) {
            $file_extension = $request->cover_image->getClientOriginalExtension();
            $file_name = time() . '' . rand() . '.' . $file_extension;
            $path = 'images/albums/covers';
            $request->cover_image->move($path, $file_name);
            $album->cover_image = url('images/albums/covers') . '/' . $file_name;
        }
        $album->name = $request->name;
        $album->save();
        return Redirect::route('show_album', array('id' => $album->id));
    }
    public function getDelete($id)
    {
        $album = Album::where('id',$id)->first();

        $album->delete();

        return Redirect::route('index');
    }

    public function getDeleteMove($delId,$movId)
    {
        $album = Album::with('Photos')->find($delId);
        foreach ($album->Photos as $photo)
        {
            $photo->album_id=$movId;
        }
        $album->save();
        $album->delete();

        return Redirect::route('albums');
    }
}
