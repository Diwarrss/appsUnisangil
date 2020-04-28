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

mix
.browserSync({
    proxy: 'http://appsunisangil.local:8081/'
})
.js('resources/js/appHome.js', 'public/js/appHome.js') //js de Home inicio de Pagina
.js('resources/js/appAdmin.js', 'public/js/appAdmin.js') //js de Admin de la pagina;
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
        "public/adminCoreui/node_modules/@coreui/coreui/dist/js/coreui.min.js"
    ],
    "public/js/allCoreui.js"
)
//styles to template home
.styles(
    [
        "public/templateHome/bootstrap/css/bootstrap.min.css",
        "public/adminCoreui/node_modules/fontawesome-free-5.10.2-web/css/all.min.css",
        "public/adminCoreui/node_modules/simple-line-icons/css/simple-line-icons.css",
        "public/templateHome/font-awesome/css/font-awesome.min.css",
        "public/templateHome/animate/animate.min.css",
        "public/templateHome/ionicons/css/ionicons.min.css",
        //"public/templateHome/owlcarousel/assets/owl.carousel.min.css",
        //"public/templateHome/lightbox/css/lightbox.min.css",
        "public/templateHome/style.css",
    ],
    "public/css/allHome.css"
)
//Creamos el JS General para la vista del home
.scripts(
    [
        "public/templateHome/jquery/jquery.min.js",
        "public/templateHome/jquery/jquery-migrate.min.js",
        "public/templateHome/bootstrap/js/bootstrap.bundle.min.js",
        "public/templateHome/easing/easing.min.js",
        "public/templateHome/wow/wow.min.js",
        //"public/templateHome/waypoints/waypoints.min.js",
        //"public/templateHome/counterup/counterup.min.js",
        //"public/templateHome/owlcarousel/owl.carousel.min.js",
        //"public/templateHome/isotope/isotope.pkgd.min.js",
        //"public/templateHome/lightbox/js/lightbox.min.js",
        "public/templateHome/mobile-nav/mobile-nav.js",
        "public/templateHome/main.js"
    ],
    "public/js/allHome.js"
)
