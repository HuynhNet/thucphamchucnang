<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('public/html/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/html/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/html/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/html/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/html/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/html/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/html/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/html/css/style.css') }}" type="text/css">

</head>

<body style="font-family: Times New Roman;">

@include('layouts.header')
@yield('hero_banner')

@yield('content')

@include('layouts.footer')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<!-- Js Plugins -->
<script src="{{ asset('public/html/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('public/html/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/html/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('public/html/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/html/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('public/html/js/mixitup.min.js') }}"></script>
<script src="{{ asset('public/html/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/html/js/main.js') }}"></script>

{{--<script type="text/javascript" src="//fsi-site.neptunelabs.com/fsi/viewer/applications/quickzoom/js/fsiquickzoom.js"></script>--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</body>

</html>
