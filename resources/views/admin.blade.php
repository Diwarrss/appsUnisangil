<!DOCTYPE html>
<html lang="es">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!--Colocar icono del software en la barra del nombre de la pagina-->
    <link href="img/favicon.png" rel="icon">
    <title>Apps Unisangil</title>
    <!-- Todos los JS del Coreui-->
    <link href="{{asset('/css/allCoreui.css') }}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
      <div id="app">
          {{-- Barra Navegación Top Header --}}
          <navbarheader csrf="{{ csrf_token() }}"></navbarheader>
            <div class="app-body">
                <sidebard></sidebard>

                {{-- llamamos el componete que cargara todo el contenido de la pagina admin --}}
                <router-view></router-view>
            </div>
            <footeradmin></footeradmin>
      </div>
  </body>
    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('/js/allCoreui.js')}}"></script>
    <script src="{{asset('/js/appAdmin.js')}}"></script>
</html>
