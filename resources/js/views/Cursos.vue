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
                                                <th>Acción</th>
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
                                            </td>
                                            <td v-if="data.estado === '4'">
                                                <span class="badge badge-default">Pago Anulado</span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-check-circle"></i> Elegir
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <div v-if="data.estado === '0' && dataUser.roles_id === 2">
                                                            <a class="dropdown-item" href="#" @click.prevent="updateState(data, 'mail_send')">Enviar E-Mail</a>
                                                        </div>
                                                        <div v-if="data.estado === '2' && dataUser.roles_id === 1">
                                                            <a class="dropdown-item" href="#" @click.prevent="updateState(data, 'pay_success')">Aprobar Pago</a>
                                                            <a class="dropdown-item" href="#" @click.prevent="updateState(data, 'pay_reset')">Devolver Pago</a>
                                                            <a class="dropdown-item" href="#" @click.prevent="updateState(data, 'pay_error')">Anular Pago</a>
                                                        </div>
                                                        <div v-if="data.estado === '3' && dataUser.roles_id === 1">
                                                            <a class="dropdown-item" href="#" @click.prevent="updateState(data, 'pay_reset')">Devolver Pago</a>
                                                            <a class="dropdown-item" href="#" @click.prevent="updateState(data, 'pay_error')">Anular Pago</a>
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
    </main>
</template>
<script>
import { mapState, mapActions, mapMutations } from "vuex";
export default {
    data() {
        return {

        }
    },
    computed: {
        dataUser(){
            return this.$store.state.dataUser
        },
        ...mapState(['infoTables']),
        paramsTable(){
            let me = this
            let datos = {
                    url_api: 'insCursos/getDataTable',
                    params:{
                        page: me.getCurrentPage,
                        criterio: 'num_doc',
                        buscar:'',
                        cant:5,
                        sede: me.dataUser.sedes_id
                    }
                }
            return datos
        },
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
                        title: "Comprobante enviado con éxito",
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
