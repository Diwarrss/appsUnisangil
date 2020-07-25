<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tics - UNISANGIL</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicons -->
        <link href="storage/img/favicon.png" rel="icon">
        <link href="storage/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

        <!-- All css template home -->
        <link href="{{ asset('css/allHome.css') }}" rel="stylesheet">
    </head>
    <body>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5e729c748d24fc2265887e88/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
        <div id="app">
            <headerhome></headerhome>
                @yield('content')
            <footerhome></footerhome>
        </div>
    </body>
        <!-- Template Main Javascript File -->
        <script src="{{asset('/js/allHome.js')}}"></script>
        <script src="{{asset('/js/appHome.js')}}"></script>
</html>
