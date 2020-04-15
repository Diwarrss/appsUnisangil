<template>
    <div class="container py-5 mt-5">
        <section class="py-5">
            <header class="section-header mt-5 mb-5 text-center">
                <h3>Cursos de Informática</h3>
            </header>
            <div class="text_header">
                <h5>Responsable del servicio</h5>
                <div class="mb-4">
                    <span>
                        Funcionario de Departamento de Sistemas y TIC de UNISANGIL.
                        Dirección Departamento de Sistemas y TIC.
                        Director, Coordinador de Sistemas y TIC sede Yopal.
                        Coordinador de Sistemas y Tic, sede Chiquinquirá

                    </span>
                </div>
                <div class="row">
                    <div class="content_contact col-md-6">
                        <h5>Contacto de Soporte</h5>
                        <p>
                            Ticket a través de la Mesa de TI, plataforma GLPI, Llamada
                        </p>
                        <p>
                            •	Dirección departamento de sistemas sede San Gil, Teléfono 7245757 Extensión 231 <br>
                            •	Director, Coordinador de Sistemas y TIC sede Yopal  <br>
                            •	Coordinador de Sistemas y Tic, sede Chiquinquirá
                        </p>
                    </div>
                    <div class="content_suport col-md-6">
                        <h5>Horario de soporte</h5>
                        <p>
                            •	Lunes a viernes de 8:00 – 12:00 y  2:00 – 7:00 p.m. <br>
                            •	Sábado de 9:00 – 12:00 p.m.
                        </p>
                        <div class="text-center">
                            <img src="storage/img/services/cursos.png" alt="" class="img-fluid" width="250">
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <!-- <div class="col-md-6">
                        <button class="btn btn-primary btn-lg btn-block mt-4" id="downloadFile" @click="downloadFile">
                            <i class="fas fa-file-download"></i> Descargar formato de pago
                        </button>
                    </div> -->
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-lg btn-block mt-4" @click="openForm('register')">
                            <i class="fas fa-file-signature"></i> Inscripción a Cursos
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-lg btn-block mt-4" @click="openForm('file')">
                            <i class="fas fa-file-upload"></i> Adjuntar Comprobante de Pago
                        </button>
                    </div>
                </div>
                <div class="col-md-12 mt-5 text-center">
                    <h5 class="mb-0">SERVICIOS</h5>
                </div>
            </div>
            <div class="mt-0">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseSix" id="headingOne">
                            <h2 class="btn btn-link mb-0">
                                •	Informática básica UNISANGIL
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="content_body row mb-2">
                                    <div class="col-12 col-sm-4 col-md-3 text-center my-auto">
                                        <h5>
                                            <strong>Objetivo</strong>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-9">
                                        <p class="mb-2">
                                            Servicio de formación en competencia digital para los estudiantes, administrativos y docentes de UNISANGIL.
                                        </p>
                                    </div>
                                </div>
                                <div class="content_body row mb-2">
                                    <div class="col-12 col-sm-4 col-md-3 text-center my-auto">
                                        <h5>
                                            <strong>Descripción</strong>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-9">
                                        <p class="mb-2">
                                            Oferta de cursos de formación en informática básica para estudiantes de UNISANGIL, como requisito de grado. <br>

                                            Oferta de formación para personal administrativo y docente de UNISANGIL,  en competencias digitales.

                                        </p>
                                    </div>
                                </div>
                                <div class="content_body row mb-2">
                                    <div class="col-12 col-sm-4 col-md-3 text-center my-auto">
                                        <h5>
                                            <strong>Necesidad que Satisface</strong>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-9">
                                        <p class="mb-2">
                                            Extensión y proyección social <br>
                                            Desarrollo de la gestión académica y administrativa <br>
                                            Desarrollo de la gestión de la investigación  y la extensión
                                        </p>
                                    </div>
                                </div>
                                <div class="content_body row mb-2">
                                    <div class="col-12 col-sm-4 col-md-3 text-center my-auto">
                                        <h5>
                                            <strong>Usuario objetivo</strong>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-9">
                                        <p class="mb-2">
                                            Área administrativa y académica
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseSix" id="headingTwo">
                            <h2 class="btn btn-link mb-0">
                                •	Informática programas UNAB
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="content_body row mb-2">
                                    <div class="col-12 col-sm-4 col-md-3 text-center my-auto">
                                        <h5>
                                            <strong>Objetivo</strong>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-9">
                                        <p class="mb-2">
                                            Servicio de formación en competencia digital para los estudiantes, de los programas UNAB
                                        </p>
                                    </div>
                                </div>
                                <div class="content_body row mb-2">
                                    <div class="col-12 col-sm-4 col-md-3 text-center my-auto">
                                        <h5>
                                            <strong>Descripción</strong>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-9">
                                        <p class="mb-2">
                                            Oferta de cursos de formación en informática básica para estudiantes de los programas UNAB, de acuerdo a las directrices del plan de estudio.
                                        </p>
                                    </div>
                                </div>
                                <div class="content_body row mb-2">
                                    <div class="col-12 col-sm-4 col-md-3 text-center my-auto">
                                        <h5>
                                            <strong>Necesidad que Satisface</strong>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-9">
                                        <p class="mb-2">
                                            Extensión y proyección social <br>
                                            Desarrollo de la gestión académica y administrativa <br>
                                            Desarrollo de la gestión de la investigación  y la extensión
                                        </p>
                                    </div>
                                </div>
                                <div class="content_body row mb-2">
                                    <div class="col-12 col-sm-4 col-md-3 text-center my-auto">
                                        <h5>
                                            <strong>Usuario objetivo</strong>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-9">
                                        <p class="mb-2">
                                            Área administrativa y  académica
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- modal inscripcion cursos -->
        <section>
            <div class="modal fade" id="modalForm" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFormLabel" v-if="typeModal === 1">
                                <strong> <i class="fas fa-file-signature"></i> Formulario de registro</strong>
                            </h5>
                            <h5 class="modal-title" id="modalFormLabel" v-else>
                                <strong> <i class="fas fa-file-upload"></i> Enviar Comprobante de Pago</strong>
                            </h5>
                            <button type="button" class="close" @click="closeForm">
                                <span aria-hidden="true" class="text-white">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" v-if="typeModal === 1">
                            <form enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nombres"><strong>Nombres</strong></label>
                                    <input type="text" class="form-control" :class="{'is-invalid': errors['nombres']}" id="nombres" v-model="dataRegister.nombres">
                                    <div class="invalid-feedback" v-if="errors['nombres']">
                                        {{errors['nombres'][0]}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="apellidos"><strong>Apellidos</strong></label>
                                    <input type="text" class="form-control" :class="{'is-invalid': errors['apellidos']}" id="apellidos" v-model="dataRegister.apellidos">
                                    <div class="invalid-feedback" v-if="errors['apellidos']">
                                        {{errors['apellidos'][0]}}
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="tipDocumento"><strong>Tipo Documento</strong></label>
                                        <v-select :options="tiposDoc" placeholder="Seleccionar..." v-model="dataRegister.tipo_documento" :class="{'invalid__input_select': errors['tipo_documento']}"></v-select>
                                        <span class="invalid__input" v-if="errors['tipo_documento']">
                                            Obligatorio.
                                        </span>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="numDocumento"><strong>Número Documento</strong></label>
                                        <input type="string" class="form-control" id="numDocumento" v-model="dataRegister.numero_documento" :class="{'is-invalid': errors['numero_documento']}">
                                        <div class="invalid-feedback" v-if="errors['numero_documento']">
                                            {{errors['numero_documento'][0]}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email"><strong>Correo institucional</strong></label>
                                    <input type="text" class="form-control" id="email" placeholder="hola@unisangil.edu.co" v-model="dataRegister.email" :class="{'is-invalid': errors['email']}">
                                    <div class="invalid-feedback" v-if="errors['email']">
                                        {{errors['email'][0]}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sede"><strong>Sede</strong></label>
                                    <v-select :options="sedes" placeholder="Seleccionar..." v-model="dataRegister.sede" :class="{'invalid__input_select': errors['sede']}"></v-select>
                                    <span class="invalid__input" v-if="errors['sede']">
                                        {{errors['sede'][0]}}
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="academico"><strong>Programa académico</strong></label>
                                    <v-select :options="programas" placeholder="Seleccionar..." v-model="dataRegister.programa_academico" :class="{'invalid__input_select': errors['programa_academico']}"></v-select>
                                    <span class="invalid__input" v-if="errors['programa_academico']">
                                        {{errors['programa_academico'][0]}}
                                    </span>
                                </div>
                                <div class="form-group" >
                                    <label for="cursos"><strong>Cursos</strong></label>
                                    <v-select
                                        :options="cursos"
                                        label="nombre"
                                        :reduce="nvl => nvl.id"
                                        :multiple="true"
                                        placeholder="Seleccionar..."
                                        v-model="dataRegister.cursos"
                                        :class="{'invalid__input_select': errors['cursos']}"
                                        >
                                    </v-select>
                                    <span class="invalid__input" v-if="errors['cursos']">
                                        {{errors['cursos'][0]}}
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="modal-body body__search" v-if="typeModal === 2">
                            <form enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="tipDocumento"><strong>Tipo Documento</strong></label>
                                        <select class="form-control" @change="clearData" v-model="dataRegister.tipo_documento" placeholder="Seleccionar..." :class="{'is-invalid': errors['tipo_documento']}">
                                            <option value="" disabled selected>Seleccionar...</option>
                                            <option v-for="elemento in tiposDoc" v-bind:value="elemento">{{ elemento }}</option>
                                        </select>
                                        <!-- <v-select :options="tiposDoc" placeholder="Seleccionar..." v-model="dataRegister.tipo_documento" :class="{'invalid__input_select': errors['tipo_documento']}"></v-select> -->
                                        <span class="invalid__input" v-if="errors['tipo_documento']">
                                            Obligatorio.
                                        </span>
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label for="numDocumento"><strong>Número Documento</strong></label>
                                        <input type="string" class="form-control" id="numDocumento" v-model="dataRegister.numero_documento" :class="{'is-invalid': errors['numero_documento']}" @change="clearData">
                                        <div class="invalid-feedback" v-if="errors['numero_documento']">
                                            {{errors['numero_documento'][0]}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" v-if="dataUploadFile.data.length">
                                    <label for="soporte"><strong>Soporte de pago</strong></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" @change="obtenerArchivo" :class="{'is-invalid': errors['url_comprobante']}"/>
                                        <label class="custom-file-label" for="file" v-if="!dataUploadFile.url_comprobante">Elegir Archivo</label>
                                        <label class="custom-file-label" for="file" v-else>{{dataUploadFile.url_comprobante.name}}</label>
                                    </div>
                                    <span class="invalid__input" v-if="errors['url_comprobante']">
                                        {{errors['url_comprobante'][0]}}
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer" v-if="typeModal === 1">
                            <button type="button" class="btn btn-danger" @click="closeForm"><i class="far fa-times-circle"></i> Cancelar</button>
                            <button type="button" class="btn btn-success" @click="sendRegister" id="save" v-if="typeModal === 1"><i class="fas fa-paper-plane"></i> Enviar</button>
                        </div>
                        <div class="modal-footer" v-if="typeModal === 2">
                            <div v-if="dataUploadFile.data.length">
                                <button type="button" class="btn btn-danger" @click="closeForm"><i class="far fa-times-circle"></i> Cancelar</button>
                                <button type="button" class="btn btn-success" @click="sendFile" id="save" ><i class="fas fa-paper-plane"></i> Enviar</button>
                            </div>
                            <div v-else>
                                <button type="button" class="btn btn-danger" @click="closeForm"><i class="far fa-times-circle"></i> Cancelar</button>
                                <button type="button" class="btn btn-info" @click="search" id="save" ><i class="fas fa-search"></i> Buscar</button>
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
    data() {
        return {
            typeModal : '',
            errors: [],
            dataRegister:{
                tipo_documento: '',
                numero_documento: '',
                nombres: '',
                apellidos: '',
                email: '',
                sede: '',
                programa_academico: '',
                cursos: ''
            },
            dataUploadFile:{
                data: [],
                url_comprobante: ''
            }
        }
    },
    computed: {
        cursos(){
            return this.$store.state.dataCursos
        },
        programas(){
            return this.$store.state.programas
        },
        tiposDoc(){
            return this.$store.state.tiposDoc
        },
        sedes(){
            return this.$store.state.sedes
        }
    },
    async created () {
        this.$store.dispatch('getCursos')
    },
    methods: {
        closeForm(){
            $('#modalForm').modal('hide')
            this.errors = []
            this.dataRegister.tipo_documento = ''
            this.dataRegister.numero_documento = ''
            this.dataRegister.nombres = ''
            this.dataRegister.apellidos = ''
            this.dataRegister.email = ''
            this.dataRegister.sede = ''
            this.dataRegister.programa_academico = ''
            this.dataRegister.cursos = ''
            this.dataUploadFile.data = []
        },
        clearData(){
            this.dataUploadFile.data = []
        },
        openForm(value){
            if (value ==='register') {
                this.typeModal = 1
            } else {
                this.typeModal = 2
                //this.$store.dispatch('getInfoinProcess')
            }
            $('#modalForm').modal('show')
        },
        sendRegister(){
            document.getElementById("save").disabled = true;
            let me = this

            axios
                .post("insCursos/register", me.dataRegister)
                .then(function(response) {
                    me.$swal({
                        position: 'top',
                        icon: 'success',
                        title: "Registro enviado con éxito",
                        text: `${me.dataRegister.nombres}, en unos minutos recibirás un E-mail de control y registro académico!`,
                        showConfirmButton: true
                        //timer: 1800
                    });
                    me.closeForm()
                    document.getElementById("save").disabled = false;
                    //console.log(response);
                })
                .catch(function(error) {
                    if (error.response.status == 422) {
                        me.errors = error.response.data.errors;
                    }
                    document.getElementById("save").disabled = false;
                });
        },
        search(){
            let me = this
            axios
                .get("insCursos/getInfoinProcess", { params:
                    {
                        tipo_documento: me.dataRegister.tipo_documento,
                        numero_documento: me.dataRegister.numero_documento,
                    }
                })
                .then(function(response) {
                    me.dataUploadFile.data = response.data
                    me.errors = []
                    document.getElementById("save").disabled = false;
                    //console.log(response);
                })
                .catch(function(error) {
                    if (error.response.status == 422) {
                        me.errors = error.response.data.errors;
                    }
                    if (error.response.status == 404) {
                        me.$swal({
                            position: 'top',
                            icon: 'warning',
                            title: "No hay resultados",
                            text: 'Volver a intentar!',
                            showConfirmButton: true
                            //timer: 1800
                        });
                    }
                    document.getElementById("save").disabled = false;
                });
        },
        obtenerArchivo(e) {
            let file = event.target.files[0];
            this.dataUploadFile.url_comprobante = file;
            //console.log(this.dataForm.url_comprobante);
        },
        sendFile(){
            document.getElementById("save").disabled = true;
            let me = this

            let allData = new FormData()
            allData.append('id', me.dataUploadFile.data[0].id)
            allData.append('url_comprobante', me.dataUploadFile.url_comprobante)

            axios
                .post("insCursos/saveFile", allData)
                .then(function(response) {
                    me.$swal({
                        position: 'top',
                        icon: 'success',
                        title: "Comprobante enviado con éxito",
                        showConfirmButton: false,
                        timer: 1800
                    });
                    me.closeForm()
                    document.getElementById("save").disabled = false;
                    //console.log(response);
                })
                .catch(function(error) {
                    if (error.response.status == 422) {
                        me.errors = error.response.data.errors;
                    }
                    document.getElementById("save").disabled = false;
                });
        }
    },
}
</script>
<style lang="scss" scoped>
    .btn-primary {
        background: #053365;
        border-color: #053365;
    }
    .btn-link{
        font-size: 18px;
        font-weight: 600;
        &:hover {
            color: #413e66;
            text-decoration: none;
        }
    }
    .card-header{
        &:hover {
            background-color: #cac9dd;
            text-decoration: none;
        }
    }
    .content_body{
        border-bottom: 1px solid;
        h5{
            color: #696592;
            font-weight: 400;
            font-size: 16px;
            font-style: italic;
        }
    }
    .text_header{
        margin-bottom: 50px;
        h5{
            color: #696592;
            font-weight: 600;
            font-size: 22px;
            font-style: italic;
        }
        p{
            margin: 0 0 10px 0;
        }
        .content_contact{
            border-left: 1px solid;
            border-right: 1px solid;
        }
        .content_suport{
            border-right: 1px solid;
        }
    }
    .section-header{
        text-transform: uppercase;
    }
    .invalid__input{
        display: block;
        margin-top: .25rem;
        font-size: 80%;
        color: #dc3545;
    }
    .form-control{
        height: 34px;
    }
    .modal-primary {
        .modal-content{
            border-color: #20a8d8;
        }
        .modal-header{
            color: #fff;
            background-color: #20a8d8;
        }
        /* .body__search{
            height: 150px;
        } */
    }
    .custom-file-label::after{
        content: "Buscar Archivo";
    }
</style>
<style lang="scss">
    .invalid__input_select .vs__dropdown-toggle {
        border-color: #dc3545;
    }
    .vs__search::placeholder{
        color: gray;
    }
    .vs__clear{
        display: none;
    }
    /* .vs__dropdown-menu{
        z-index: 99;
    } */
</style>
