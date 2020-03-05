<template>
    <div class="container py-5 mt-5">
        <section>
            <header class="section-header mt-5 text-center">
                <h3>Pruebas de suficiencia en TICs</h3>
                <h2>(Administrativos y estudiantes)</h2>
            </header>
            <div class="row mt-5">
                <div class="col-md-6">
                    <button class="btn btn-primary btn-lg btn-block" @click="downloadFile">
                        <i class="fas fa-file-download"></i> Descargar formato de pago
                    </button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-lg btn-block" @click="openForm">
                        <i class="fas fa-file-signature"></i> Inscripción prueba de informática
                    </button>
                </div>
            </div>
        </section>
        <!-- modal inscripcion pruebas -->
        <section>
            <div class="modal fade" id="modalForm" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-primary" role="document">
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
                                <input type="text" class="form-control" id="nombres" v-model="dataForm.nombres_apellidos">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="tipDocumento"><strong>Tipo Documento</strong></label>
                                    <v-select :options="tiposDoc" placeholder="Seleccionar..." v-model="dataForm.tipo_documento"></v-select>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="numDocumento"><strong>Número Documento</strong></label>
                                    <input type="string" class="form-control" id="numDocumento" v-model="dataForm.numero_documento">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="celular"><strong>Celular</strong></label>
                                <vue-tel-input v-model="dataForm.celular" placeholder="Ingrese su número"></vue-tel-input>
                            </div>
                            <div class="form-group">
                                <label for="email"><strong>Correo institucional</strong></label>
                                <input type="text" class="form-control" id="email" placeholder="hola@unisangil.edu.co" v-model="dataForm.email">
                            </div>
                            <div class="form-group">
                                <label for="academico"><strong>Programa académico</strong></label>
                                <v-select :options="programas" placeholder="Seleccionar..." v-model="dataForm.programa_academico" @input="changeNivels"></v-select>
                            </div>
                            <div class="form-group" v-if="dataForm.programa_academico ==='Ingeniería Financiera (UNAB)' || dataForm.programa_academico ==='Psicología (UNAB)'">
                                <label for="niveles"><strong>Niveles</strong></label>
                                <v-select
                                    :options="niveles"
                                    label="nivel"
                                    :reduce="nvl => nvl.id"
                                    :multiple="true"
                                    placeholder="Seleccionar..."
                                    v-model="dataForm.niveles">
                                </v-select>
                            </div>
                            <div class="form-group" v-else>
                                <label for="niveles"><strong>Niveles</strong></label>
                                <select class="form-control" v-model="dataForm.niveles">
                                    <option value="5" disabled selected>Nivel básico: Informática básica</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="soporte"><strong>Soporte de pago</strong></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" @change="obtenerArchivo"/>
                                    <label class="custom-file-label" for="file" v-if="!dataForm.url_comprobante">Elegir Archivo</label>
                                    <label class="custom-file-label" for="file" v-else>{{dataForm.url_comprobante.name}}</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" @click="closeForm"><i class="far fa-times-circle"></i> Cancelar</button>
                        <button type="button" class="btn btn-success" @click="sendForm"><i class="fas fa-paper-plane"></i> Enviar</button>
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
            },
            programas: [
                'Administración de Empresas',
                'Contaduría Pública',
                'Administración de Empresas Turísticas y Hoteleras',
                'Derecho',
                'Enfermería',
                'Ingeniería Agrícola',
                'Ingeniería Ambiental',
                'Ingeniería Electrónica',
                'Ingeniería de Sistemas',
                'Ingeniería de Mantenimiento',
                'Ingeniería Financiera (UNAB)',
                'Psicología (UNAB)',
                'Tecnología en Sistemas de Información',
                'Tecnología en Gestión de Empresas de Economía Solidaria',
                'Licenciatura en educación para la primera infancia'
            ],
            tiposDoc: [
                'CC',
                'TI',
                'ID',
                'CE'
            ]
        }
    },
    async created () {
        this.$store.dispatch('getUserAuth')
    },
    computed: {
        niveles(){
            return this.$store.getters.doneNivels
        }
    },
    methods: {
        downloadFile() {
            axios({
                url: "inscripcion/downloadFile",
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
            });
        },
        openForm(){
            $('#modalForm').modal('show')
        },
        closeForm(){
            $('#modalForm').modal('hide')
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
            let me = this

            let allData = new FormData()
            allData.append('url_comprobante', me.dataForm.url_comprobante)
            allData.append("tipo_documento", me.dataForm.tipo_documento)
            allData.append("numero_documento", me.dataForm.numero_documento)
            allData.append("nombres_apellidos", me.dataForm.nombres_apellidos)
            allData.append("email", me.dataForm.email)
            allData.append("celular", me.dataForm.celular)
            allData.append("programa_academico", me.dataForm.programa_academico)
            allData.append("niveles", me.dataForm.niveles)

            axios
                .post("inscripcion/save", allData)
                .then(function(response) {
                    me.$swal({
                        position: 'top',
                        icon: 'success',
                        title: "Inscripción enviado con éxito",
                        showConfirmButton: false,
                        timer: 1800
                    });
                    me.closeForm()
                    //console.log(response);
                })
                .catch(function(error) {
                    if (error.response.status == 422) {
                        me.errors = error.response.data.errors;
                    }
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
</style>
