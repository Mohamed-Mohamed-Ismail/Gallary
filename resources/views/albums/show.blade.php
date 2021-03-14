@extends('layouts.app')
@section('title')
    Show  An Album
@endsection

@section('styles')
    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>

@endsection

@section('content')
<div class="container">

    <div class="starter-template">
        <div class="media">
            <img class="media-object pull-left"alt="{{$album->name}}" src="{{$album->cover_image}}" width="350px">
            <div class="media-body">
                <h2 class="media-heading" style="font-size: 26px;">Album Name:</h2>
                <p>{{$album->name}}</p>
                <div class="media">

                        <a href="{{URL::route('add_image',array('id'=>$album->id))}}"><button type="button"class="btn btn-primary btn-large">Add New Image to Album</button></a>
                        <a href="{{URL::route('edit_album',array('id'=>$album->id))}}"><button type="button"class="btn btn-default btn-large">Edit Album</button></a>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($album->Photos as $photo)
            <div class="col-lg-3">
                <div class="thumbnail" style="max-height: 350px;min-height: 350px;">
                    <img alt="{{$album->name}}" src="{{$photo->image}}">
                    <div class="caption">
                        <p>{{$photo->name}}</p>
                        <p><p>Created date:  {{ date("d F Y",strtotime($photo->created_at)) }} at {{ date("g:ha",strtotime($photo->created_at)) }}</p></p>
                        <a href="{{URL::route('delete_image',array('id'=>$photo->id))}}" onclick="return confirm('Are you sure?')"><button type="button" class="btnbtn-danger btn-small">Delete Image </button></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

