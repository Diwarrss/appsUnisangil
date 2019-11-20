const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/appHome.js', 'public/js/appHome.js') //js de Home inicio de Pagina
    .js('resources/js/appAdmin.js', 'public/js/appAdmin.js') //js de Admin de la pagina
    .sass('resources/sass/app.scss', 'public/css')

    //Creamos los CSS General para las vistas de Coreui
    .styles(
        [
            "public/adminCoreui/node_modules/@coreui/icons/css/coreui-icons.min.css",
            "public/adminCoreui/node_modules/flag-icon-css/css/flag-icon.min.css",
            "public/adminCoreui/node_modules/font-awesome4.7/css/font-awesome.min.css",
            "public/adminCoreui/node_modules/fontawesome-free-5.10.2-web/css/all.min.css",
            "public/adminCoreui/node_modules/simple-line-icons/css/simple-line-icons.css",
            "public/adminCoreui/css/style.css",
            "public/adminCoreui/vendors/pace-progress/css/pace.min.css"
        ],
        "public/css/allCoreui.css"
    )
    //Creamos el JS General para las vistas de Coreui
    .scripts(
        [
            "public/adminCoreui/node_modules/jquery/dist/jquery.min.js",
            "public/adminCoreui/node_modules/popper.js/dist/umd/popper.min.js",
            "public/adminCoreui/node_modules/bootstrap/dist/js/bootstrap.min.js",
            "public/adminCoreui/node_modules/pace-progress/pace.min.js",
            "public/adminCoreui/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js",
            "public/adminCoreui/node_modules/@coreui/coreui/dist/js/coreui.min.js",
            "public/adminCoreui/js/sweetalert2/sweetalert2.all.min.js"
        ],
        "public/js/allCoreui.js"
    );
