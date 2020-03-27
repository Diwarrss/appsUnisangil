<template>
    <div>
        <section id="intro" class="clearfix">
            <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center">
                <div class="col-md-6 intro-info order-md-first order-last">
                    <div class="text-center">
                        <div>
                            <img src="storage/img/logo.png" alt="" class="img-fluid img_unisangil" width="300">
                        </div>
                        <div class="mt-5">
                            <a href="/about" class="btn-get-started scrollto">
                                <i class="fa fa-info-circle" aria-hidden="true"></i> Nosotros
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 intro-img order-md-last order-first">
                    <img src="storage/img/intro-img.svg" alt="" class="img-fluid">
                </div>
            </div>

            </div>
        </section>
    </div>
</template>
<style lang="scss" scoped>
#intro {
    height: auto;
    padding: 220px 0 60px 0;
}
@media screen and (max-width: 580px) {
    #intro {
        padding: 150px 0 60px 0;
    }
    .img_unisangil{
        width: 60%;
    }
}
</style>
