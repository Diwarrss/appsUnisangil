<template>
    <div class="container py-5 mt-5">
        <section>
            <header class="section-header mt-5">
                <h3>Pruebas de suficiencia en TICs (Administrativos y estudiantes)</h3>
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
                    <form>
                        <h1>Formulario de Inscripcion para Pruebas</h1>
                        <p>
                            Tipo Documento (CC, TI, ID)
                            Numero Documento
                            Nombres y Apellidos
                            Email institucional
                            Celular o WhatsApp
                            Programa academico (UNAB)

                            si es UNAB aparecer los niveles a Elegir multicheck
                            Niveles =
                                *Nivel 1: Introduccion a computadores
                                *Nivel 2: Procesador de texto basico
                                *Nivel 3: Hoja electronica
                                *Nivel 4: Internet

                            Adjuntar comprobante de pago
                        </p>
                    </form>
                </div>
            </div>
        </section>
        <!-- modal inscripcion pruebas -->
        <section>
            <div class="modal fade" id="modalForm" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFormLabel">
                            <strong> <i class="fas fa-file-signature"></i> Formulario de Inscripción</strong>
                        </h5>
                        <button type="button" class="close" @click="closeForm">
                            <span aria-hidden="true" class="text-danger">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Address 2</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                                </div>
                                <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-danger" @click="closeForm"><i class="far fa-times-circle"></i> Cancelar</button>
                        <button type="button" class="btn btn-success" @click="sendPqrsf"><i class="fas fa-paper-plane"></i> Enviar</button> -->
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
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
</style>
