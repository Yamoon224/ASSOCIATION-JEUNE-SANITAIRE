<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Site All Style Sheet Css -->
        <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/swiper.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/owl.theme.default.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/magnific-popup.css') }}" rel="stylesheet">
        
        <!-- Site Main Style Sheet Css -->
        <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
       
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">
    </head>
    <body>
        <x-g-loader></x-g-loader>
        <x-g-menu></x-g-menu>

        {{ $slot }}

        <x-g-footer></x-g-footer>
        <x-g-back-top></x-g-back-top>

        <script src="{{ asset('public/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/js/plugins.js') }}"></script>
        <script src="{{ asset('public/js/swiper.min.js') }}"></script>
        <script src="{{ asset('public/js/wow.min.js') }}"></script>
        <script src="{{ asset('public/js/validator.min.js') }}"></script>
        <script src="{{ asset('public/js/contact.js') }}"></script>
        <script src="{{ asset('public/js/main.js') }}"></script>
    </body>
</html>
