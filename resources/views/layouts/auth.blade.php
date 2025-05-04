<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="APP GESTION CLINIQUE" name="description"/>
        <meta content="AJS" name="author"/>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">  

        <!-- vendor css -->
        <link href="{{ asset('public/lib/fontawesome-free/css/all.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('public/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('public/lib/typicons.font/typicons.css') }}" rel="stylesheet"/>

        <link href="{{ asset('public/css/azia.css') }}" rel="stylesheet"/>
    </head>
    <body class="az-body">
        {{ $slot }}

        <script src="{{ asset('public/lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('public/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('public/lib/ionicons/ionicons.js') }}"></script>
        
        <script src="{{ asset('public/js/azia.js') }}"></script>
        <script>
            $(function() { 'use strict' });
        </script>
        @stack('scripts')
    </body>
</html>
