<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPhotoRequest;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    public function getForm($id)
    {
        $album = Album::find($id);
        return view('images.add', compact('album'));
    }

    public function postAdd(AddPhotoRequest $request)
    {
        $image = new Image;

        if ($request->hasFile('image')) {
            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time() . '' . rand() . '.' . $file_extension;
            $path = 'images/albums/images';
            $request->image->move($path, $file_name);
            $image->image = url('images/albums/images') . '/' . $file_name;
        }
        $image->album_id = $request->album_id;
        $image->name=$request->name;
        $image->save();
        return Redirect::route('show_album', array('id' => $request->album_id));
    }

    public function getDelete($id)
    {
        $image = Image::find($id);
        $image->delete();
        return Redirect::route('show_album', array('id' => $image->album_id));
    }
}
