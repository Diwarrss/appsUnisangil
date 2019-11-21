<template>
    <div>
        <!--==========================
        Header
        ============================-->
        <Header v-bind:csrf="csrf"/>

        <main id="main">
            <!--==========================
                Show \views\home
            ============================-->
            <transition>
                <router-view></router-view>
            </transition>

        </main>
        <!--==========================
        Footer
        ============================-->
        <Footer />
    </div>
</template>
<script>
import Header from '../../views/home/Header';
import Footer from '../../views/home/Footer';
export default {
    props: ["csrf"],
    components:{
        Header,
        Footer
    },
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
