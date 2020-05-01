<template>
    <main class="main" v-if="dataUser">
        <div class="container-fluid py-5">
            <div class="ui-view">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-accent-primary">
                                <div class="card-header">
                                    <h4>
                                        <strong><i class="fas fa-users-cog"></i> Solicitudes de Cursos</strong>
                                    </h4>
                                </div>
                                <div class="card-body row">
                                    <div class="col-sm-3 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <select
                                                class="form-control"
                                                v-model="paramsTable.params.cant"
                                                v-on:change="getInfoTables(paramsTable)"
                                                >
                                                <option value="5" selected>5</option>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-5 col-lg-5">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <select class="form-control" v-model="paramsTable.params.criterio">
                                                    <option value="num_doc" selected>Número Documento</option>
                                                    <option value="id_unab">ID UNAB</option>
                                                    <option value="email">E-Mail</option>
                                                    <option value="nombres">Nombres</option>
                                                    <option value="celular">Celular</option>
                                                </select>
                                                <!-- keydown para ejecutar cuando vayan escribiendo -->
                                                <input
                                                type="text"
                                                placeholder="Escriba aquí"
                                                v-model="paramsTable.params.buscar"
                                                class="form-control"
                                                @keyup.enter="getInfoTables(paramsTable)"
                                                />
                                                <span class="input-group-append">
                                                    <button
                                                        type="button"
                                                        class="btn btn-primary"
                                                        @click="getInfoTables(paramsTable)"
                                                    >
                                                        <i class="fas fa-search"></i> Buscar
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mt-1">
                                        <strong>Cant. Registros:</strong> {{infoTables.total}}
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-responsive-xl table-hover table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombres y Apellidos</th>
                                                    <th>Documento y ID Unab</th>
                                                    <th>Email</th>
                                                    <th>Celular</th>
                                                    <th>Sede</th>
                                                    <th>Cursos</th>
                                                    <th>Pago</th>
                                                    <th>Fecha Solicitud</th>
                                                    <th>Estado</th>
                                                    <th v-if="dataUser.roles_id != 4">Acción</th>
                                                </tr>
                                            </thead>
                                            <!-- verificamos si el objeto es vacio -->
                                            <tbody v-if="!infoTables.data">
                                                <td colspan="11">
                                                <div role="alert" class="alert alert-danger text-center">
                                                    <div class="form-group">
                                                    <strong>
                                                        <h5>¡Sin información!</h5>
                                                    </strong>
                                                    </div>
                                                </div>
                                                </td>
                                            </tbody>
                                            <tbody v-else v-for="(data, index) in infoTables.data" :key="index.id">
                                                <td>{{++index}}</td>
                                                <td class="capitalize_name">{{data.nombres}} {{data.apellidos}}</td>
                                                <td>
                                                    <strong>{{data.tipo_documento}}</strong> {{data.numero_documento}} <br>
                                                    <strong>ID Unab:</strong> {{data.numero_id.toUpperCase()}}
                                                </td>
                                                <td>
                                                    <a class="data_email" :href="`mailto:${data.email}`">
                                                        {{data.email}}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="data_celular" :href="`https://wa.me/57${data.celular.replace(' ', '')}?text=Hola, ${data.nombres}`" target="_blank" title="Enviar Mensaje">
                                                        <i class="fab fa-whatsapp"></i> {{data.celular.replace(' ', '')}}
                                                    </a>
                                                </td>
                                                <td>{{data.sede.nombre}}</td>
                                                <td>
                                                    <li v-for="(curso, keyCurso) in data.cursos" :key="keyCurso" class="form-inline">
                                                        <label class="mr-2">{{curso.nombre}}  &nbsp; <strong> Nrc: </strong> {{curso.nrc}}</label>
                                                    </li>
                                                </td>
                                                <td>
                                                    <button class="btn btn-outline-info" @click.prevent="downloadFile(data)" v-if="data.url_comprobante && data.estado != '1'" title="Ver Pago">
                                                        <i class="fas fa-file-download fa-2x"></i>
                                                    </button>
                                                </td>
                                                <td>{{data.created_at | moment("YYYY-MM-DD h:mm:ss a")}}</td>

                                                <td v-if="data.estado === '0'">
                                                    <span class="badge badge-danger">Pte. Generar Polígrafo</span>
                                                </td>
                                                <td v-if="data.estado === '1'">
                                                    <span class="badge badge-mailSend">Polígrafo Enviado</span>
                                                </td>
                                                <td v-if="data.estado === '2'">
                                                    <span class="badge badge-warning">Pte. Validar Pago</span>
                                                </td>
                                                <td v-if="data.estado === '3'">
                                                    <span class="badge badge-success">Pago Aprobado</span>
                                                    <button class="btn btn-outline-dark" title="Ver descripción" @click.prevent="showDesc(data.nota_aprobado)"><i class="fas fa-eye"></i></button>
                                                </td>
                                                <td v-if="data.estado === '4'">
                                                    <span class="badge badge-default">Pago Anulado</span>
                                                    <button class="btn btn-outline-dark" title="Ver descripción" @click.prevent="showDesc(data.nota_anulado)"><i class="fas fa-eye"></i></button>
                                                </td>
                                                <td v-if="data.estado === '5'">
                                                    <span class="badge badge-dark">Registro Anulado</span>
                                                    <button class="btn btn-outline-dark" title="Ver descripción" @click.prevent="showDesc(data.nota_anulado)"><i class="fas fa-eye"></i></button>
                                                </td>
                                                <td v-if="dataUser.roles_id != 4">
                                                    <div class="btn-group" role="group">
                                                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="far fa-check-circle"></i> Elegir
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                            <div v-if="data.estado === '0' && dataUser.roles_id === 2">
                                                                <a class="dropdown-item" href="#" @click.prevent="updateState(data, 'mail_send')">Enviar E-Mail</a>
                                                            </div>
                                                            <div v-if="data.estado === '2' && dataUser.roles_id === 3">
                                                                <a class="dropdown-item" href="#" @click.prevent="showModal(data, 'pay_success')"><i class="far fa-check-circle" style="color: #67b30b;"></i>Aprobar Pago</a>
                                                                <a class="dropdown-item" href="#" @click.prevent="updateState(data, 'pay_reset')"><i class="fas fa-reply-all" style="color: #e4b213;"></i>Devolver Pago</a>
                                                                <a class="dropdown-item" href="#" @click.prevent="showModal(data, 'pay_error')"><i class="fas fa-times-circle" style="color: #f30a0a;"></i>Anular Pago</a>
                                                            </div>
                                                            <div v-if="data.estado === '3' && dataUser.roles_id === 3">
                                                                <a class="dropdown-item" href="#" @click.prevent="updateState(data, 'pay_reset')"><i class="fas fa-reply-all" style="color: #e4b213;"></i>Devolver Pago</a>
                                                                <a class="dropdown-item" href="#" @click.prevent="showModal(data, 'pay_error')"><i class="fas fa-times-circle" style="color: #f30a0a;"></i>Anular Pago</a>
                                                            </div>
                                                            <div v-if="dataUser.roles_id === 1 && data.estado != '5'">
                                                                <a class="dropdown-item" href="#" @click.prevent="showModal(data, 'data_delete')"><i class="fas fa-times-circle" style="color: #f30a0a;"></i>Eliminar Registro</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tbody>
                                        </table>
                                        <!-- Implementa el vue pagination para poder cambiar pagina -->
                                        <pagination
                                            :data="infoTables"
                                            @pagination-change-page="getDataForPage"
                                            align="center"
                                            :limit="1"
                                        ></pagination>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal modal Nota-->
        <section>
            <div
            class="modal"
            id="modalNota"
            role="dialog"
            aria-labelledby="myModalLabel2"
            data-backdrop="static"
            data-keyboard="false"
            >
            <div class="modal-dialog modal-dialog-centered modal-primary" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <div v-if="tipo_modal==='showDesc'">
                        <h4 class="modal-title">
                            <i class="fas fa-eye"></i> Descripción registrada
                        </h4>
                    </div>
                    <div v-else>
                        <h4 class="modal-title">
                            <i class="fas fa-exclamation-triangle"></i> Actualizar Estado de Pago
                        </h4>
                    </div>
                    <button class="close" type="button" @click="closeModal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-form-label font-weight-bold">Observación:</label>
                            <div>
                                <textarea v-if="tipo_modal==='showDesc'" class="form-control" type="text" readonly v-model="observacion"></textarea>
                                <textarea v-else class="form-control" type="text" v-model="observacion"></textarea>
                                <span
                                    class="help-block text-danger"
                                    v-if="errors.length"
                                    v-text="errors[0]"
                                ></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" v-if="tipo_modal==='showDesc'">
                    <button class="btn btn-danger" type="button" @click="closeModal">
                        <i class="far fa-times-circle"></i> Cerrar
                    </button>
                </div>
                <div class="modal-footer" v-else>
                    <button class="btn btn-danger" type="button" @click="closeModal">
                        <i class="far fa-times-circle"></i> Cancelar
                    </button>
                    <button class="btn btn-success" @click="updateStateNota">
                        <i class="far fa-check-circle"></i> Guardar
                    </button>
                </div>
                </div>
            </div>
            </div>
        </section>
    </main>
</template>
<script>
import { mapState, mapActions, mapMutations } from "vuex";
export default {
    data() {
        return {
            errors: [],
            observacion: '',
            params_observacion: {},
            tipo_modal: '',
            paramsTable: {
                url_api: 'insCursos/getDataTable',
                params:{
                    page: 1,
                    criterio: 'num_doc',
                    buscar:'',
                    cant: 5
                }
            }
        }
    },
    computed: {
        ...mapState(['infoTables', 'dataUser']),
        getCurrentPage(){
            return this.infoTables.current_page
        },
    },
    async created() {
        this.$store.dispatch('getInfoTables', this.paramsTable)
    },
    methods: {
        ...mapActions(['getInfoTables']),
        //para paginar recibimos la proxima pagina o la anterior
        getDataForPage(changePage){
            let allParams = {
                url_api: this.paramsTable.url_api,
                page: changePage,
                params:{
                    criterio: this.paramsTable.params.criterio,
                    buscar: this.paramsTable.params.buscar,
                    cant: this.paramsTable.params.cant,
                    pagActual: this.paramsTable.params.pagActual,
                    sede: this.dataUser.sedes_id
                }
            }
            this.$store.dispatch('getInfoTables', allParams)
        },
        showModal(data, type){
            let me = this
            $("#modalNota").modal("show")
            if(type === 'pay_success'){
                me.tipo_modal = 'pay_success'
                let params = {
                    id: data.id,
                    type: type
                }
                this.params_observacion = params
            }
            if(type === 'pay_error'){
                me.tipo_modal = 'pay_error'
                let params = {
                    id: data.id,
                    type: type
                }
                this.params_observacion = params
            }
            if(type === 'data_delete'){
                me.tipo_modal = 'data_delete'
                let params = {
                    id: data.id,
                    type: type
                }
                this.params_observacion = params
            }
        },
        closeModal() {
            $("#modalNota").modal("hide");
            this.observacion = ''
        },
        showDesc(desc){
            this.tipo_modal = 'showDesc'
            this.observacion = desc
            $("#modalNota").modal("show");
        },
        updateStateNota(){
            let me = this
            me.errors = [];

            if (!me.observacion) {
                this.errors.push('La observación es obligatoria.');
            }else{
                let paramsAll = {
                    ...me.params_observacion,
                    nota: me.observacion
                }

                axios.post("insCursos/updateState", paramsAll)
                    .then(function(response) {
                        me.$swal({
                            position: 'top',
                            icon: 'success',
                            title: "Estado actualizado con éxito!",
                            showConfirmButton: false,
                            timer: 1800
                        });
                        me.getInfoTables(me.paramsTable)
                        me.closeModal()
                    })
                    .catch(function(error) {
                        console.error(error)
                    });

                console.log(paramsAll)
            }
        },
        updateState(data, type){
            let me = this
            let params = {
                id: data.id,
                type: type
            }
            axios.post("insCursos/updateState", params)
                .then(function(response) {
                    me.$swal({
                        position: 'top',
                        icon: 'success',
                        title: "Estado actualizado con éxito!",
                        showConfirmButton: false,
                        timer: 1800
                    });
                    me.getInfoTables(me.paramsTable)
                })
                .catch(function(error) {
                    console.error(error)
                });
        },
        downloadFile(data){
            axios({
                url: 'insCursos/downloadPay',
                method: 'GET',
                responseType: 'blob',
                params: {url_comprobante: data.url_comprobante}
            }).then((response) => {
                var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                var fileLink = document.createElement('a');

                fileLink.href = fileURL;
                fileLink.setAttribute('download', `Poligrafo.${data.url_comprobante.substr(-3)}`);
                document.body.appendChild(fileLink);

                fileLink.click();
                this.$swal({
                    position: 'top',
                    icon: 'success',
                    title: "Descarga éxitosa!",
                    showConfirmButton: false,
                    timer: 1800
                });
            }).catch(function(error) {
                this.$swal({
                    position: 'top',
                    icon: 'error',
                    title: "Error al descargar!",
                    showConfirmButton: false,
                    timer: 1800
                });
            });;
        }
    },
}
</script>
<style lang="scss" scoped>
    .capitalize_name{
        text-transform: capitalize;
    }
    .data_email{
        text-decoration: none;
        color: blue;
        font-weight: 600;
        font-size: 15px;
    }
    .data_celular{
        text-decoration: none;
        color: green;
        font-weight: 600;
        font-size: 15px;
    }
    .badge{
        font-size: 12px;
        &.badge-mailSend{
            background-color: #4c7aff;
            color: white;
        }
        &.badge-default{
            background-color: #6d6d6d;
            color: white;
        }
    }

</style>
