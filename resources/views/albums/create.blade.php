@extends('layouts.app')
@section('title')
    Create New Album
@endsection
@section('content')
<div class="container" style="text-align: center;">
    <div class="span4" style="display: inline-block;margin-top:100px;">

        <form method="POST"action="/createalbum" enctype="multipart/form-data">
            @csrf
                <h1>Create an Album</h1>
                <div class="form-group">
                    <label for="name">Album Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Album Name" value="{{old('name')}}">
                </div>

                <div class="form-group">
                    <label for="cover_image">Select a Cover Image</label>
                   <input type="file"  name="cover_image">
                </div>
                <button type="submit" class="btn btn-default">Create!</button>

        </form>
    </div>
</div>
@endsection
