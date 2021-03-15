@extends('layouts.app')
@section('title')
    Create New Album
@endsection

@section('content')
    <div class="container">
        <form class="my-5" method="POST" action="{{url('albums')}}" enctype="multipart/form-data">
            @csrf

            <h1>Create an Album</h1>

            <div class="form-group col-6 text-left my-3">
                <label for="name">Album Name</label>
                <input name="name" required type="text" class="form-control" placeholder="Album Name" value="{{old('name')}}">
            </div>

            <div class="form-group col-6 text-left my-3">
                <label for="cover_image" class="form-label">Select a Cover Image</label>
                <input class="form-control" type="file" required name="cover_image">
            </div>

            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>

        </form>
    </div>
@endsection
