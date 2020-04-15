<template>
    <div class="container py-5 mt-5">
        <section>
            <header class="section-header mt-5 py-5 text-center">
                <h3>Pruebas de suficiencia en TICs</h3>
                <h2>(Administrativos y estudiantes)</h2>
            </header>
            <div class="text_header">
                <h5>Responsable del servicio</h5>
                <div class="mb-4">
                    <span>
                        Funcionario de Departamento de Sistemas y TIC de UNISANGIL.
                        Dirección Departamento de Sistemas y TIC.
                        Asistente Departamento de Sistemas y TIC.
                    </span>
                </div>
                <div class="row">
                    <div class="content_contact col-md-6">
                        <h5>Contacto de Soporte</h5>
                        <p>
                            Ticket a través de la Mesa de TI, plataforma GLPI, Llamada
                        </p>
                        <p>
                            •	Dirección departamento de sistemas sede San Gil, Administrador de servidores <br>
                            •	Teléfono 7245757  Extensión  231 <br>
                            •	Correo: <a href="mailto:dirtics@unisangil.edu.co">dirtics@unisangil.edu.co</a>
                        </p>
                    </div>
                    <div class="content_suport col-md-6">
                        <h5>Horario de soporte</h5>
                        <p>
                            •	Lunes a viernes de 8:00 – 12:00 y  2:00 – 7:00 p.m. <br>
                            •	Sábado de 9:00 – 12:00 p.m.
                        </p>
                        <div class="text-center">
                            <img src="storage/img/services/pruebas.jpg" alt="" class="img-fluid" width="250">
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-lg btn-block mt-4" id="downloadFile" @click="downloadFile">
                            <i class="fas fa-file-download"></i> Descargar formato de pago
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-lg btn-block mt-4" @click="openForm">
                            <i class="fas fa-file-signature"></i> Inscripción prueba de informática
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
                                •	Prueba de suficiencia TICs para Administrativos
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
                                            Contar con una apreciación del manejo de las competencias digitales del personal administrativo de UNISANGIL
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
                                            Servicio de validación en competencia digital para el personal administrativo de UNISANGIL
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
                                            Desarrollo de la gestión académica y administrativa
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
                                •	Prueba de suficiencia TICs para Estudiantes programas UNAB y UNISANGIL
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
                                            Contar con una apreciación en el  manejo de las competencias digitales de los estudiantes de UNISANGIL y programas UNAB
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
                                            Servicio de validación en competencia digital para el personal administrativo de UNISANGIL
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
                                            Desarrollo de la gestión académica y administrativa
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
        <!-- modal inscripcion pruebas -->
        <section>
            <div class="modal fade" id="modalForm" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFormLabel">
                            <strong> <i class="fas fa-file-signature"></i> Formulario de Inscripción</strong>
                        </h5>
                        <button type="button" class="close" @click="closeForm">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nombres"><strong>Nombres y Apellidos</strong></label>
                                <input type="text" class="form-control" :class="{'is-invalid': errors['nombres_apellidos']}" id="nombres" v-model="dataForm.nombres_apellidos">
                                <div class="invalid-feedback" v-if="errors['nombres_apellidos']">
                                    {{errors['nombres_apellidos'][0]}}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="tipDocumento"><strong>Tipo Documento</strong></label>
                                    <v-select :options="tiposDoc" placeholder="Seleccionar..." v-model="dataForm.tipo_documento" :class="{'invalid__input_select': errors['tipo_documento']}"></v-select>
                                    <span class="invalid__input" v-if="errors['tipo_documento']">
                                        Obligatorio.
                                    </span>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="numDocumento"><strong>Número Documento</strong></label>
                                    <input type="string" class="form-control" id="numDocumento" v-model="dataForm.numero_documento" :class="{'is-invalid': errors['numero_documento']}">
                                    <div class="invalid-feedback" v-if="errors['numero_documento']">
                                        {{errors['numero_documento'][0]}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="celular"><strong>Celular</strong></label>
                                <vue-tel-input v-model="dataForm.celular" placeholder="Ingrese su número" :class="{'invalid__input__tel': errors['celular']}"></vue-tel-input>
                                <span class="invalid__input" v-if="errors['celular']">
                                    {{errors['celular'][0]}}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="email"><strong>Correo institucional</strong></label>
                                <input type="text" class="form-control" id="email" placeholder="hola@unisangil.edu.co" v-model="dataForm.email" :class="{'is-invalid': errors['email']}">
                                <div class="invalid-feedback" v-if="errors['email']">
                                    {{errors['email'][0]}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="academico"><strong>Programa académico</strong></label>
                                <v-select :options="programas" placeholder="Seleccionar..." v-model="dataForm.programa_academico" @input="changeNivels" :class="{'invalid__input_select': errors['programa_academico']}"></v-select>
                                <span class="invalid__input" v-if="errors['programa_academico']">
                                    {{errors['programa_academico'][0]}}
                                </span>
                            </div>
                            <div class="form-group" v-if="dataForm.programa_academico ==='Ingeniería Financiera (UNAB)' || dataForm.programa_academico ==='Psicología (UNAB)'">
                                <label for="niveles"><strong>Niveles</strong></label>
                                <v-select
                                    :options="niveles"
                                    label="nivel"
                                    :reduce="nvl => nvl.id"
                                    :multiple="true"
                                    placeholder="Seleccionar..."
                                    v-model="dataForm.niveles"
                                    :class="{'invalid__input_select': errors['niveles']}"
                                    >
                                </v-select>
                                <span class="invalid__input" v-if="errors['niveles']">
                                    {{errors['niveles'][0]}}
                                </span>
                            </div>
                            <div class="form-group" v-else>
                                <label for="niveles"><strong>Niveles</strong></label>
                                <select class="form-control" v-model="dataForm.niveles" :class="{'is-invalid': errors['niveles']}">
                                    <option value="5" disabled selected>Nivel básico: Informática básica</option>
                                </select>
                                <div class="invalid-feedback" v-if="errors['niveles']">
                                    {{errors['niveles'][0]}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="soporte"><strong>Soporte de pago</strong></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" @change="obtenerArchivo" :class="{'is-invalid': errors['url_comprobante']}"/>
                                    <label class="custom-file-label" for="file" v-if="!dataForm.url_comprobante">Elegir Archivo</label>
                                    <label class="custom-file-label" for="file" v-else>{{dataForm.url_comprobante.name}}</label>
                                </div>
                                <span class="invalid__input" v-if="errors['url_comprobante']">
                                    {{errors['url_comprobante'][0]}}
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" @click="closeForm"><i class="far fa-times-circle"></i> Cancelar</button>
                        <button type="button" class="btn btn-success" @click="sendForm" id="sendForm"><i class="fas fa-paper-plane"></i> Enviar</button>
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
            errors: [],
            dataForm:{
                tipo_documento: '',
                numero_documento: '',
                nombres_apellidos: '',
                email: '',
                celular: '',
                programa_academico: '',
                url_comprobante: '',
                niveles: '5'
            }
        }
    },
    async created () {
        this.$store.dispatch('getNiveles')
    },
    computed: {
        niveles(){
            return this.$store.getters.doneNivels
        },
        programas(){
            return this.$store.state.programas
        },
        tiposDoc(){
            return this.$store.state.tiposDoc
        }
    },
    methods: {
        downloadFile() {
            document.getElementById("downloadFile").disabled = true;
            axios({
                url: "insPruebas/downloadFile",
                method: "GET",
                responseType: "blob" // important
            }).then(response => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement("a");
                link.href = url;
                link.setAttribute("download", "FormatoPago-ExamenTIC.pdf");
                document.body.appendChild(link);
                link.click();

                this.$swal({
                    position: 'top',
                    icon: 'success',
                    title: "Formato descargado con éxito!",
                    showConfirmButton: false,
                    timer: 2000
                });
                document.getElementById("downloadFile").disabled = false;
            });
        },
        openForm(){
            $('#modalForm').modal('show')
        },
        closeForm(){
            $('#modalForm').modal('hide')
            this.errors = []
            this.dataForm.tipo_documento = ''
            this.dataForm.numero_documento = ''
            this.dataForm.nombres_apellidos = ''
            this.dataForm.email = ''
            this.dataForm.celular = ''
            this.dataForm.programa_academico = ''
            this.dataForm.url_comprobante = ''
            this.dataForm.niveles = '5'
        },
        obtenerArchivo(e) {
            let file = event.target.files[0];
            this.dataForm.url_comprobante = file;
            //console.log(this.dataForm.url_comprobante);
        },
        changeNivels(){
            if (this.dataForm.programa_academico ==='Ingeniería Financiera (UNAB)' || this.dataForm.programa_academico ==='Psicología (UNAB)') {
                this.dataForm.niveles = []
            }else{
                this.dataForm.niveles = '5'
            }
        },
        sendForm(){
            document.getElementById("sendForm").disabled = true;
            let me = this
            function setprograma_academico(){
                if (me.dataForm.programa_academico === null) {
                    return ''
                }else{
                    return me.dataForm.programa_academico
                }
            }
            function settipo_documento(){
                if (me.dataForm.tipo_documento === null) {
                    return ''
                }else{
                    return me.dataForm.tipo_documento
                }
            }
            function setniveles(){
                if (me.dataForm.niveles === null) {
                    return ''
                }else{
                    return me.dataForm.niveles
                }
            }

            let allData = new FormData()
            allData.append('url_comprobante', me.dataForm.url_comprobante)
            allData.append("tipo_documento", settipo_documento())
            allData.append("numero_documento", me.dataForm.numero_documento)
            allData.append("nombres_apellidos", me.dataForm.nombres_apellidos)
            allData.append("email", me.dataForm.email)
            allData.append("celular", me.dataForm.celular)
            allData.append("programa_academico", setprograma_academico())
            allData.append("niveles", setniveles())

            axios
                .post("prueba/save", allData)
                .then(function(response) {
                    me.$swal({
                        position: 'top',
                        icon: 'success',
                        title: "Inscripción enviado con éxito",
                        showConfirmButton: false,
                        timer: 1800
                    });
                    me.closeForm()
                    document.getElementById("sendForm").disabled = false;
                    //console.log(response);
                })
                .catch(function(error) {
                    if (error.response.status == 422) {
                        me.errors = error.response.data.errors;
                    }
                    document.getElementById("sendForm").disabled = false;
                });
        }
    }
}
</script>
<style lang="scss" scoped>
.btn-primary{
    background: #053365;
    border-color: #053365;
}
.btn-primary:hover{
    background: #3478c1;
    border-color: #3478c1;
}
.modal-primary .modal-header {
    color: #fff;
    background-color: #20a8d8;
}
.modal-primary .modal-content {
    border-color: #20a8d8;
}
.custom-file-label::after{
    content: 'Examinar';
}
.form-control{
    height: 34px;
}
.invalid__input{
    display: block;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;
}
.invalid__input__tel{
    border-color: #dc3545;
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
</style>
