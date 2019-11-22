<template>
    <div>
        <header id="header">
            <div id="topbar">
                <div class="container">
                    <div class="social-links">
                        <a href="https://twitter.com/unisangil" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.facebook.com/UNISANGIL" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.linkedin.com/school/fundaci%C3%B3n-universitaria-de-san-gil---unisangil/about/" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="https://www.instagram.com/unisangil/" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="https://www.youtube.com/user/miunisangil" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Admin</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="logo float-left">
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <h1 class="text-light"><a href="/" class="scrollto"><span>Sistemas y Tics</span></a></h1>
                    <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
                </div>

                <nav class="main-nav float-right d-none d-lg-block">
                    <ul>
                        <li><a href="/">Inicio</a></li>
                        <li><a href="/services">Servicios</a></li>
                        <li><a href="/about">Nosotros</a></li>
                        <li><a href="/team">Equipo</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>
</template>
<script>
export default {
    mounted() {
        this.showMobile();
    },
    methods: {
        showMobile()
        {
            // Mobile Navigation
            if ($('.main-nav').length) {
                var $mobile_nav = $('.main-nav').clone().prop({
                class: 'mobile-nav d-lg-none'
                });
                $('body').append($mobile_nav);
                $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="fa fa-bars"></i></button>');
                $('body').append('<div class="mobile-nav-overly"></div>');

                $(document).on('click', '.mobile-nav-toggle', function(e) {
                $('body').toggleClass('mobile-nav-active');
                $('.mobile-nav-toggle i').toggleClass('fa-times fa-bars');
                $('.mobile-nav-overly').toggle();
                });

                $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
                e.preventDefault();
                $(this).next().slideToggle(300);
                $(this).parent().toggleClass('active');
                });

                $(document).click(function(e) {
                var container = $(".mobile-nav, .mobile-nav-toggle");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('fa-times fa-bars');
                    $('.mobile-nav-overly').fadeOut();
                    }
                }
                });
            } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
                $(".mobile-nav, .mobile-nav-toggle").hide();
            }
        }
    },
}
</script>
<style scoped>
/* colocar estilo al router-link-active */
.router-link-exact-active {
  background: #a4d9ff;
}
</style>
