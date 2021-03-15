@extends('layouts.app')
@section('title')
    {{$album->name}}
@endsection

@section('content')
    <div class="container">
        <div class="row w-100 mx-0 my-3">
            <h1 class="text-center">{{$album->name}}</h1>


            <img class="col-9 mx-auto" alt="{{$album->name}}"
                 src="{{ asset('storage/'.$album->cover_image) }}"
                 style="object-fit: cover">

            <div class="col-12">


                <div class="row mx-0 my-3 w-100">
                    @foreach($album->Photos as $photo)
                        <div class="col-lg-3 my-3">
                            <div class="card">
                                <img class="card-img-top" alt="{{$photo->name}}"
                                     src="{{ asset('storage/'.$photo->image) }}">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{$photo->name}}</h5>
                                    <div class="row w-100 mx-0">
                                        <a href="{{url("images/$photo->id")}}">
                                            <button type="button" class="btn btn-danger btn-small">Delete Image</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    Created date: {{ date("d F Y",strtotime($photo->created_at)) }}
                                    at {{ date("g:ha",strtotime($photo->created_at)) }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

@endsection

