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
                                <strong><i class="fas fa-file-invoice"></i> Nómina Electrónica</strong>
                            </h4>
                        </div>
                      <form class="form_filters p-4" @submit.prevent="getInfoTables(paramsTable)">
                          <!-- <h3>Filtrar:</h3> -->
                          <div class="form-row">
                            <div class="form-group col-md-3 col-12">
                              <label for="inputState" class="font-weight-bold">Estado</label>
                              <select id="inputState" class="form-control" v-model="paramsTable.params.criterio">
                                <option  value="todos">Todos</option>
                                <option selected value="REGISTRADO"> PENDIENTE ENVIAR JSON </option>
                                <option value="PROCESADO"> PROCESADAS CON ÉXITO </option>
                                <option value="PENDIENTE"> PENDIENTE GESTASOFT </option>
                                <option value="RECHAZADO"> RECHAZADO </option>
                                <option value="ANULADO"> ANULADO </option>
                                <option value="REVERSADO"> REVERSADO </option>
                              </select>
                            </div>
                            <div class="form-group col-md-2 col-6">
                              <label for="numFactura" class="font-weight-bold">Consecutivo/Num. Factura</label>
                              <input type="text" class="form-control" id="numFactura" placeholder="Ej. 101" v-model="paramsTable.params.buscar">
                            </div>
                            <div class="form-group col-md-3 my-auto ml-md-3">
                              <button
                                type="submit"
                                class="btn btn-primary"
                              >
                                <i class="fas fa-search"></i> Filtrar Nóminas
                              </button>
                            </div>
                            <div class="col-md-12">
                              <button
                                id="generateFiles"
                                @click.prevent="generateFiles(urlApi+'download-nomina?criterio='+paramsTable.params.criterio+'&buscar='+paramsTable.params.buscar+'&zip=false')" target="_blank"
                                class="mt-2 btn btn-dark"
                                v-if="infoTables.data"
                              >
                                <i class="fas fa-file-export"></i> Generar Json x Factura en Servidor
                                <div class="spinner-border d-none spinner-border-sm" role="status" id="spinnerFiles">
                                  <span class="sr-only">Loading...</span>
                                </div>
                              </button>
                              <!-- <a
                                :href="urlApi+'download-factura?criterio='+paramsTable.params.criterio+'&buscar='+paramsTable.params.buscar+'&prefijo='+paramsTable.params.prefijo+'&tipoFactura='+paramsTable.params.tipoFactura" target="_blank"
                                class="mt-2 btn btn-success btn-lg"
                                v-if="infoTables.data"
                              >
                                <i class="fas fa-cloud-download-alt"></i> Descargar Json General
                              </a>
                              <a
                                :href="urlApi+'download-factura?criterio='+paramsTable.params.criterio+'&buscar='+paramsTable.params.buscar+'&prefijo='+paramsTable.params.prefijo+'&tipoFactura='+paramsTable.params.tipoFactura+'&zip=true'" target="_blank"
                                class="mt-2 btn btn-info btn-lg"
                                v-if="infoTables.data"
                              >
                                <i class="fas fa-cloud-download-alt"></i> Descargar Zip/Json x Factura
                              </a> -->
                              <!-- <button class="mt-2 btn btn-outline-success btn-lg" @click.prevent="openModal('file')">
                                <i class="fas fa-sync"></i> Actualizar Facturas Procesadas
                              </button> -->
                            </div>
                          </div>
                        </form>
                        <div class="card-body row" v-if="infoTables.data">
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
                            <div class="col-md-5 mt-1">
                                <strong>Cant. Nóminas:</strong> {{infoTables.total}}
                            </div>
                            <div class="col-md-12">
                                <table class="table table-responsive-xl table-sm">
                                    <thead>
                                      <tr>
                                        <th># Id</th>
                                        <th>Consecutivo</th>
                                        <th>Nómina de</th>
                                        <th>Fecha Generada</th>
                                        <th>Estado</th>
                                        <th>Sueldo</th>
                                        <th>Acciones</th>
                                      </tr>
                                    </thead>
                                    <tbody v-for="(data, index) in infoTables.data" :key="index">
                                      <td class="align-middle">{{data.important.id}}</td>
                                      <td class="align-middle">{{data.important.consecutivo}}</td>
                                      <td class="align-middle">{{getTrabajador(data.trabajador)}}</td>
                                      <td class="align-middle">{{data.informacionGeneral.fechaGen}}</td>
                                      <td class="align-middle">{{data.important.estado}}</td>
                                      <td class="align-middle">{{data.trabajador.sueldo}}</td>
                                      <td class="align-middle">
                                        <a :href="urlApi+'download-nomina?id='+data.important.id" target="_blank" class="btn btn-info m-1" title="Generar Json">
                                          <i class="fas fa-file-download"></i>
                                        </a>
                                        <button v-if="data.important.estado !== 'PROCESADO'" class="btn btn-success m-1" title="Procesar Factura" @click.prevent="updateStatus(data.important.id, 'PROCESADO')">
                                          <i class="fas fa-check-double"></i>
                                        </button>
                                        <!-- <button v-if="data.estado !== 'PROCESADO' && !data.listaAdquirentes[0]['email']" class="btn btn-warning m-1" title="Editar Factura" @click.prevent="openModal('edit', data.factura_id)">
                                          <i class="fas fa-edit"></i>
                                        </button> -->
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
    <!-- Modal Upload Files -->
    <!-- <div class="modal fade" id="modal-files" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal-filesLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-filesLabel"><i :class="`${iconoModal}`"></i> {{tituloModal}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="updateEmailFactura">
            <div class="modal-body">
              <div v-if="typeModal === 'edit'">
                <div class="form-group">
                  <label for="form-email">Email</label>
                  <input type="email" class="form-control" id="form-email" v-model="newEmail" autocomplete="off" required>
                </div>
              </div>
              <div v-else>
                CARGAR ARCHIVO
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                <i class="far fa-times-circle"></i> Cerrar
              </button>
              <button v-if="typeModal === 'file'" type="button" class="btn btn-success" @click.prevent="uploadFacturas">
                <i class="fas fa-sync"></i> Actualizar
              </button>
              <button v-else type="submit" class="btn btn-success">
                <i class="fas fa-sync"></i> Actualizar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div> -->
  </main>
</template>
<script>
import { mapActions, mapMutations } from "vuex";
export default {
    data() {
      return {
        urlApi: process.env.MIX_API_ORACLE,
        errors: [],
        id: '',
        typeModal: '',
        tituloModal: '',
        iconoModal: '',
        paramsTable: {
          apiExt: true,
          url_api: 'nomina-electronica',
          params:{
            pagination: true,
            page: 1,
            criterio: 'REGISTRADO',
            buscar:'',
            cant: 5
          }
        },
        newEmail: ''
      }
    },
    computed: {
      dataUser(){
        return this.$store.state.dataUser
      },
      infoTables(){
        return this.$store.state.infoTables
      },
      getCurrentPage(){
        return this.infoTables.current_page
      },
      loading(){
        return this.$store.state.loading
      }
    },
    created() {
      //this.$store.dispatch('getInfoTables', this.paramsTable)
    },
    methods: {
        ...mapActions(['getInfoTables']),
        //para paginar recibimos la proxima pagina o la anterior
        getDataForPage(changePage){
          let allParams = {
            url_api: this.paramsTable.url_api,
            page: changePage,
            apiExt: true,
            params:{
              criterio: this.paramsTable.params.criterio,
              buscar: this.paramsTable.params.buscar,
              cant: this.paramsTable.params.cant
            }
          }
          this.$store.dispatch('getInfoTables', allParams)
        },
        generateFiles(url){
          let me = this
          $('#generateFiles').prop("disabled", true)
          let spinner = document.getElementById("spinnerFiles")
          spinner.classList.add("d-inline-block")
          axios.get(url)
          .then(res => {
            if (res.data.type === 'success') {
              me.$swal({
                position: 'top',
                icon: 'success',
                title: `${res.data.message}`,
                showConfirmButton: false,
                timer: 3000
              });
              $('#generateFiles').prop("disabled", false);
              spinner.classList.remove('d-inline-block')
            }else{
              me.$swal({
                position: 'top',
                icon: 'error',
                title: `${res.data.message}`,
                showConfirmButton: false,
                timer: 3000
              });
              $('#generateFiles').prop("disabled", false)
              spinner.classList.remove('d-inline-block')
            }
          })
          .catch(err => {
            me.$swal({
              position: 'top',
              icon: 'error',
              title: "Archivos no generados, intenta de nuevo!",
              showConfirmButton: false,
              timer: 3000
            });
            console.error(err);
            $('#generateFiles').prop("disabled", false);
            spinner.classList.remove('d-inline-block')
          })
        },
        updateStatus(id, state){
          let me = this
          axios.post(me.urlApi+'update-status-nomina',{ id: id, estado: state })
          .then(res => {
            if (res.data.type === 'success') {
              me.$swal({
                position: 'top',
                icon: 'success',
                title: `${res.data.message}`,
                showConfirmButton: false,
                timer: 2000
              });
              me.getDataForPage(1)
            }else{
              me.$swal({
                position: 'top',
                icon: 'error',
                title: `${res.data.message}`,
                showConfirmButton: false,
                timer: 2000
              });
            }
            //console.log(res)
          })
          .catch(err => {
            me.$swal({
              position: 'top',
              icon: 'error',
              title: "No existe nómima, no se actualizo!",
              showConfirmButton: false,
              timer: 3000
            });
            console.error(err);
          })
        },
        openModal(type, id = null){
          let me = this
          $('#modal-files').modal('show')
          switch (type) {
            case 'file':
              me.typeModal = 'file'
              me.tituloModal = 'Actualizar Nóminas'
              me.iconoModal = 'fas fa-sync'
              break;
            case 'edit':
              me.typeModal = 'edit'
              me.tituloModal = 'Editar Nómina'
              me.iconoModal = 'fas fa-edit'
              me.id = id
              break;
            default:
              //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
              break;
          }
        },
        closeModal(){
          $('#modal-files').modal('hide')
          this.id = ''
          this.newEmail = ''
        },
        uploadFacturas(){
          console.log('CARGANDO FACTURAS A ACTUALIZAR')
        },
        updateEmailFactura(){
          let me = this
          axios.post(me.urlApi+'update-data-factura',{ id: me.id, email: me.newEmail })
          .then(res => {
            if (res.data.type === 'success') {
              me.$swal({
                position: 'top',
                icon: 'success',
                title: `${res.data.message}`,
                showConfirmButton: false,
                timer: 2000
              });
              me.getDataForPage(1)
              me.closeModal()
            }else{
              me.$swal({
                position: 'top',
                icon: 'error',
                title: `${res.data.message}`,
                showConfirmButton: false,
                timer: 2000
              });
              me.closeModal()
            }
            //console.log(res)
          })
          .catch(err => {
            me.$swal({
              position: 'top',
              icon: 'error',
              title: "No existe factura, no se actualizo!",
              showConfirmButton: false,
              timer: 3000
            });
            console.error(err)
            me.closeModal()
          })
        },
        getTrabajador(data){
          let nombre = `${data.primerNombre} ${data.otrosNombres ? data.otrosNombres : ''} ${data.primerApellido} ${data.segundoApellido ? data.segundoApellido : ''}`

          return nombre
        }
    },
}
</script>
<style lang="scss" scoped>
  .form_filters{
    border-bottom: 2px solid black;
  }
  tbody{
    &.error{
      background-color: red;
    }
  }
</style>
