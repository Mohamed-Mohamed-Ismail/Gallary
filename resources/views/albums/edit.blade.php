@extends('layouts.app')
@section('title')
    Edit Album: {{$album->name}}
@endsection

@section('content')
    <div class="row">

        <form class="my-3" method="POST" action="{{url("/albums/{$album->id}")}}}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <h1>Update Album: {{$album->name}}</h1>

            <div class="form-group col-6 text-left my-3">
                <label for="name">Album Name</label>
                <input name="name" required type="text" class="form-control" placeholder="Album Name" value="{{$album->name}}">
            </div>

            <div class="form-group col-6 text-left my-3">
                <label for="cover_image" class="form-label">Select a Cover Image</label>
                <input class="form-control" type="file" name="cover_image">
            </div>


            <div class="form-group col-6 text-left my-3">
                <img style="width: 100%;object-fit: cover;height: 100%;" alt="{{$album->name}}"
                     src="{{ asset('storage/'.$album->cover_image) }}">
            </div>


            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>

    </div>
@endsection
