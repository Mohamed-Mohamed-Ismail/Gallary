@extends('layouts.app')

@section('title')
    Add New Image
@endsection
@section('content')
<div class="container" style="text-align: center;">
    <div class="span4" style="display: inline-block;margin-top:100px;">


        <form  method="POST"action="{{URL::route('add_image_to_album')}}"enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="album_id"value="{{$album->id}}" />
            <fieldset>
                <legend>Add an Image to Album: {{$album->name}}</legend>
                <div class="form-group">
                    <label for="description">Image Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Image Name"></input>
                </div>
                <div class="form-group">
                    <label for="image">Select an Image</label>
                    <input type="file" name="image">
                </div>
                <button type="submit" class="btn btn-default">Add Image!</button>
            </fieldset>
        </form>
    </div>
</div>
@endsection
