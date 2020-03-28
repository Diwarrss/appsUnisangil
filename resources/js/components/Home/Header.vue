<template>
    <div>
        <header id="header" class="header_content">
            <div id="topbar">
                <div class="container">
                    <div class="row">
                        <div class="social-links col align-self-end">
                            <a href='http://mesadeayuda.unisangil.edu.co/' target="_blank" type="button" class="text-primary" title="Buzón para radicar un PQRSF"> <i class="fa fa-exclamation-circle"></i> GLPI </a>
                            <a href='http://moodle.unisangil.edu.co/login/index.php' target="_blank" type="button" class="text-primary" title="Buzón para radicar un PQRSF"> <i class="fas fa-atlas"></i> Ágora </a>
                            <a href='http://vortal.unisangil.edu.co' target="_blank" type="button" class="text-primary" title="Buzón para radicar un PQRSF"><i class="fa fa-sign-in"></i> Vortal</a>
                            <a href='https://www.google.com/a/unisangil.edu.co/ServiceLogin?service=mail&passive=true&rm=false&continue=http%3A%2F%2Fmail.google.com%2Fa%2Funisangil.edu.co%2F&bsv=zpwhtygjntrz&' target="_blank" type="button" class="text-primary" title="Buzón para radicar un PQRSF"><i class="fa fa-envelope"></i> Correo</a>
                            <a @click="openBuzon" type="button" class="text-primary" title="Buzón para radicar un PQRSF"><i class="fas fa-envelope-open-text"></i> PQRSF</a>
                            <a href="https://twitter.com/unisangil" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.facebook.com/UNISANGIL" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.linkedin.com/school/fundaci%C3%B3n-universitaria-de-san-gil---unisangil/about/" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="https://www.instagram.com/unisangil/" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.youtube.com/user/miunisangil" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="float-left">
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <h1 class="text-light"><a href="/" class="scrollto"><span>Sistemas y Tics</span></a></h1> -->
                    <a href="/" class="scrollto"><img src="storage/img/Logo-Name.png" alt="" class="img-fluid" width="250"></a>
                </div>

                <nav class="main-nav float-right d-none d-lg-block">
                    <ul>
                        <li><a href="/">Inicio</a></li>
                        <li><a href="/services">Servicios</a></li>
                        <li><a href="/about">Nosotros</a></li>
                        <!-- <li><a href="/resources">Recursos</a>
                            Anydesk
                            Team viewer
                            Manuales
                        </li> -->
                        <!-- <li><a href="/security">Seguridad</a>
                            Tomado de : referenciandolo
                        </li> -->
                        <li><a href="http://www.unisangil.edu.co/index.php?option=com_content&view=article&id=1943&Itemid=999" target="_blank" rel="noopener noreferrer" class="btn btn-outline-danger"><i class="fas fa-exclamation-triangle text-warning"></i>  COVID-19</a></li>
                        <!-- <li><a href="/news">Noticias</a></li> -->
                        <!-- <li><a href="/infrastructure">Infraestructura</a></li> -->
                        <!-- <li><a href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Admin</a></li> -->
                    </ul>
                </nav>
            </div>
        </header>
        <!-- Modal de PQRSF -->
        <section>
            <div class="modal fade" id="modalPqrsf" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPqrsfLabel"><strong>PQRSF</strong>
                        <label>(Peticiones, Quejas, Reclamos, Sugerencias y Felicitaciones)</label>
                        </h5>

                            <!-- <button type="button" class="close" @click="closeBuzon">
                                <span aria-hidden="true" class="text-white">&times;</span>
                            </button> -->
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="nombres"><strong>Nombres y Apellidos</strong></label>
                                <input type="text" class="form-control" :class="{'is-invalid': errors['data.nombres']}" id="nombres" v-model="dataBuzon.nombres">
                                <div class="invalid-feedback" v-if="errors['data.nombres']">
                                    {{errors['data.nombres'][0]}}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="celular"><strong>Celular</strong></label>
                                    <input type="text" class="form-control" :class="{'is-invalid': errors['data.celular']}" id="celular" v-model="dataBuzon.celular">
                                    <div class="invalid-feedback" v-if="errors['data.celular']">
                                        {{errors['data.celular'][0]}}
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="email"><strong>Email</strong></label>
                                    <input type="email" class="form-control" :class="{'is-invalid': errors['data.email']}" id="email" placeholder="name@example.com" v-model="dataBuzon.email">
                                    <div class="invalid-feedback" v-if="errors['data.email']">
                                        {{errors['data.email'][0]}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tipoSolicitud"><strong>Tipo de Solicitud</strong></label>
                                <select class="form-control" :class="{'is-invalid': errors['data.tipo']}" id="tipoSolicitud" v-model="dataBuzon.tipo">
                                <option disabled value selected>Seleccionar...</option>
                                <option value="Felicitación">Felicitación</option>
                                <option value="Petición">Petición</option>
                                <option value="Queja">Queja</option>
                                <option value="Reclamo">Reclamo</option>
                                <option value="Sugerencia">Sugerencia</option>
                                </select>
                                <div class="invalid-feedback" v-if="errors['data.tipo']">
                                    {{errors['data.tipo'][0]}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descripcion"><strong>Descripción</strong></label>
                                <textarea class="form-control" :class="{'is-invalid': errors['data.descripcion']}" id="descripcion" rows="3" v-model="dataBuzon.descripcion"></textarea>
                            <div class="invalid-feedback" v-if="errors['data.descripcion']">
                                {{errors['data.descripcion'][0]}}
                            </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" @click="closeBuzon"><i class="far fa-times-circle"></i> Cancelar</button>
                        <button type="button" class="btn btn-success" id="sendPqrsf" @click="sendPqrsf"><i class="fas fa-paper-plane"></i> Enviar</button>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    data () {
        return {
            dataBuzon: {
                nombres: '',
                celular: '',
                email: '',
                tipo: '',
                descripcion: ''
            },
            errors: []
        }
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
        },
        sendPqrsf(){
            document.getElementById("sendPqrsf").disabled = true;
            let me = this
            let data = this.dataBuzon
            axios.post("buzon/save", {data})
                .then(function (response) {
                    // handle success
                    me.$swal({
                        position: 'top',
                        icon: 'success',
                        title: "PQRSF enviado con éxito",
                        showConfirmButton: false,
                        timer: 1800
                    });
                    me.closeBuzon()
                    document.getElementById("sendPqrsf").disabled = false;
                })
                .catch(function (error) {
                    if (error.response) {
                        if (error.response.status == 422) {
                            me.errors = error.response.data.errors;
                        }
                    }
                    document.getElementById("sendPqrsf").disabled = false;
                });
        },
        openBuzon(){
            $('#modalPqrsf').modal('show')
        },
        closeBuzon(){
            $('#modalPqrsf').modal('hide')
            this.errors = []
            this.dataBuzon.nombres = ''
            this.dataBuzon.celular = ''
            this.dataBuzon.email = ''
            this.dataBuzon.tipo = ''
            this.dataBuzon.descripcion = ''
        }
    },
}
</script>
<style lang="scss" scoped>
/* colocar estilo al router-link-active */
.router-link-exact-active {
  background: #a4d9ff;
}
.modal-header{
    label{
        font-size: 14px;
    }
}
.modal-primary .modal-header {
    color: #fff;
    background-color: #20a8d8;
}
.modal-primary .modal-content {
    border-color: #20a8d8;
}
.header_content{
    box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.3);
}
.header-scrolled{
    height: 100px !important;
}
#topbar{
    font-size: 15px;
    padding: 0 0 5px 0;
}
#topbar .social-links{
    text-align: right;
}
#header.header-scrolled #topbar,
#header.header-pages #topbar {
  display: block;
  margin: 0 0 0 0;
}
@media screen and (max-width: 580px) {
    .float-left{
        width: 100%;
        text-align: center;
        img{
            height: 45px;
            width: auto;
        }
    }
    #header{
        height: 100px !important;
    }
    #topbar{
        display: block;
        margin: 0 45px 0 0;
        .twitter{
            display: none;
        }
        .facebook{
            display: none;
        }
        .instagram{
            display: none;
        }
        .youtube{
            display: none;
        }
        .linkedin{
            display: none;
        }
    }
    #header.header-scrolled #topbar,
    #header.header-pages #topbar {
    display: block;
    margin: 0 40px 0 0;
        .twitter{
            display: none;
        }
        .facebook{
            display: none;
        }
        .instagram{
            display: none;
        }
        .youtube{
            display: none;
        }
        .linkedin{
            display: none;
        }
    }
    #topbar .social-links a {
        color: #535074;
        padding: 1px 2px;
        line-height: 1px;
        font-size: 12px;
    }
}
.btn-outline-danger{
    &:hover{
        color: white;
    }
}
</style>
