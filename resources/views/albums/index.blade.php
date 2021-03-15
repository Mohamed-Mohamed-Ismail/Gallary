@extends('layouts.app')
@section('title')
    Albums
@endsection

@section('content')

    @include('modals.deleteModal')

    <div class="container">

        <a class="btn btn-small btn-primary my-3" href="{{url('albums/create')}}">Create New Album</a>

        <div class="row my-3">


            @foreach($albums as $album)

                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top" alt="{{$album->name}}"
                             src="{{ asset('storage/'.$album->cover_image) }}">
                        <div class="card-body">
                            <h5 class="card-title">{{$album->name}}</h5>
                            <p class="card-text">{{$album->images_count}} image(s).</p>
                            <div class="row w-100 mx-0">
                                <div class="col-6 my-1">
                                    <a href="{{url("albums/{$album->id}")}}"
                                       class="btn btn-primary w-100">
                                        Show Album
                                    </a>
                                </div>

                                <div class="col-6 my-1">
                                    <a href="{{url("albums/{$album->id}/edit")}}"
                                       class="btn btn-secondary w-100">
                                        Edit Album
                                    </a>
                                </div>

                                <div class="col-6 my-1">
                                    <a href="{{url("albums/{$album->id}/images")}}"
                                       class="btn btn-success w-100">
                                        Assign Images
                                    </a>
                                </div>

                                <div class="col-6 my-1">
                                    <button class="btn btn-danger w-100" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            onclick="deleteAlbum({{$album->id}})" value="{{$album->id}}">
                                        delete Album
                                    </button>
                                </div>


                            </div>

                        </div>
                        <div class="card-footer text-muted">
                            {{ \Carbon\Carbon::parse($album->created_at)->diffForHumans() }}
                        </div>
                    </div>
                </div>


                <input type="hidden" class="data-id" value="{{$album->id}}">
            @endforeach
        </div>

        <!-- /.container -->
    </div>

    <script>

        function deleteAlbum(albumId) {

            $(document).on('click', '#delItem', function () {
                // alert(albumId)
                $.ajax({
                    url: "{{'albums'}}/" + albumId,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "DELETE",
                    success: function (data) {
                        //if success reload ajax table
                        if (data === "success") {
                            $('#deleteModal').hide();
                            window.location.reload();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });
            });
        }


        $("#movItem").click(function (e) {
            e.preventDefault();
            var ele = $(this).val();
            $("#move").click(function (e) {
                var elem = $(this).val();
                $.ajax({
                    url: "{{'deletemovealbum'}}/" + $('#delItem').val() + "/" + $('#move').val(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "DELETE",
                    success: function (data) {
                        //if success reload ajax table
                        if (data == "success") {
                            $('#moveModel').hide();
                            window.location.reload();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });
            });
        });

    </script>

@endsection
