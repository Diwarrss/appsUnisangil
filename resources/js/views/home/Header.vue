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
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLogin"><i class="fa fa-sign-in" aria-hidden="true"></i> Admin</button>
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
                        <li><router-link :to="{ name: 'intro'}">Inicio</router-link></li>
                        <li><router-link :to="{ name: 'services'}">Servicios</router-link></li>
                        <li><router-link :to="{ name: 'about'}">Nosotros</router-link></li>
                        <li><router-link :to="{ name: 'team'}">Equipo</router-link></li>
                    </ul>
                </nav>
            </div>
        </header>
        <!-- Modal Login -->
        <section>
            <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLoginLabel"><i class="fa fa-sign-in" aria-hidden="true"></i> Iniciar Sesión</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="_token" v-bind:value="csrf" />
                            <!-- <p class="text-muted">Ingresa a tu cuenta</p> -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-user"></i>
                                    </span>
                                </div>
                                <input v-model="email" type="email" placeholder="E-mail" class="form-control " name="email" value="" required="" autocomplete="email" autofocus="">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input v-model="password" placeholder="Password" type="password" class="form-control " name="password" required="" autocomplete="current-password">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4" @click="login"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-link px-0" href="password/reset">
                                        ¿Has olvidado la contraseña?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    props: ["csrf"],
    data() {
        return {
            email:'',
            password:''
        }
    },
    methods: {
        login(){
            let me = this;
            let params = {
                email: me.email,
                password: me.password
            };
            axios.post('login',params)
            .then(res => {
                console.log(res)
            })
            .catch(err => {
                console.error(err);
            })
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
