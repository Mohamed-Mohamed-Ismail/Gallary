@extends('layouts.app')
@section('title')
    Albums
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
@include('modals.deleteModal')
@section('content')
<div class="container">

    <div class="starter-template">

        <div class="row">

            @foreach($albums as $album)
                <div class="col-lg-3">
                <div class="thumbnail" style="min-height: 514px;">
                    <img alt="{{$album->name}}" src="{{$album->cover_image}}">
                    <div class="caption">
                        <h3>{{$album->name}}</h3>
                        <input type="hidden" class="data-id" value="{{$album->id}}"></input>
                        <p>{{count($album->Photos)}} image(s).</p>
                        <p>Created date:  {{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</p>
                        <p><a href="{{URL::route('show_album',array('id'=>$album->id))}}" class="btn btn-big btn-primary">Show Album</a></p>
                        <p><button  class="btn btn-big btn-primary" data-toggle="modal" data-target="#deleteModal" value="{{$album->name}}" id="delete_record" >delete Album</button></p>

                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </div><!-- /.container -->
</div>
<script>

    $(document).ready(function() {
        $(document).on('click', '#delete_record', function () {
            var x = document.getElementById("delete_record").value;
            alert(x);
        });

            $(document).on('click', '#delItem', function () {
            console.log($('.data-id').val());
        });
    });



    $("#movItem").click(function (e) {
        e.preventDefault();
        var ele = $(this).val();
        $("#move").click(function (e) {
            var elem = $(this).val();
        $.ajax({
            url: "{{'deletemovealbum'}}/" + $('#delItem').val()+"/"+$('#move').val(),
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
