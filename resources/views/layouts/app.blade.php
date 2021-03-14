<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
    @yield('styles')
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggle"data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span lclass="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Awesome Albums</a>
        <div class="nav-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{URL::route('create_album_form')}}">Create New Album</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<!-- Modal -->


@yield('content')
</body>


</html>
