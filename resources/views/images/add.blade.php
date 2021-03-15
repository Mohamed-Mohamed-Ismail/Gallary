@extends('layouts.app')

@section('title')
    Add New Image
@endsection
@section('content')
    <div class="container">
        <form class="my-5" method="POST" action="{{url("albums/{$album->id}/images")}}" enctype="multipart/form-data">
            @csrf
            <fieldset>

                <h4>Add an Image to Album: {{$album->name}}</h4>

                <div class="form-group col-6 text-left my-3">
                    <label for="name">Image Name</label>
                    <input name="name" required type="text" class="form-control" placeholder="Image Name">
                </div>

                <div class="form-group col-6 text-left my-3">
                    <label for="formFile" class="form-label">Select an Image</label>
                    <input class="form-control" type="file" name="image" required id="formFile">
                </div>

                <button type="submit" class="btn btn-primary ml-auto">Add Image</button>

            </fieldset>
        </form>
    </div>
@endsection
