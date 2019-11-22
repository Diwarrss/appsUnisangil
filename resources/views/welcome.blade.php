<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistemas Unisangil</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicons -->
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

        <!-- All css template home -->
        <link href="{{ asset('css/allHome.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <headerhome></headerhome>
            <intro></intro>
            <footerhome></footerhome>
        </div>
    </body>
        <!-- Template Main Javascript File -->
        <script src="{{asset('/js/allHome.js')}}"></script>
        <script src="{{asset('/js/appHome.js')}}"></script>
</html>
