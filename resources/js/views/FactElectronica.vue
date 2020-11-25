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
                                <strong><i class="fas fa-file-invoice"></i> Facturación Electrónica</strong>
                            </h4>
                        </div>
                      <form class="form_filters p-4" @submit.prevent="getInfoTables(paramsTable)">
                          <h3>Filtrar:</h3>
                          <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="inputState" class="font-weight-bold">Estado</label>
                              <select id="inputState" class="form-control" v-model="paramsTable.params.criterio">
                                <option selected value="todos">Todos</option>
                                <option value="REGISTRADO"> REGISTRADO </option>
                                <option value="PROCESADO"> PROCESADO </option>
                                <option value="PENDIENTE"> PENDIENTE </option>
                                <option value="RECHAZADO"> RECHAZADO </option>
                                <option value="ANULADO"> ANULADO </option>
                              </select>
                            </div>
                            <div class="form-group col-md-3">
                              <label for="numFactura" class="font-weight-bold">Consecutivo/Num. Factura</label>
                              <input type="text" class="form-control" id="numFactura" v-model="paramsTable.params.buscar">
                            </div>
                            <div class="form-group col-md-3 my-auto ml-md-3">
                              <button
                                type="submit"
                                class="btn btn-primary"
                              >
                                <i class="fas fa-search"></i> Filtrar Resultados
                              </button>
                            </div>
                            <div class="col-md-12">
                              <button
                                @click.prevent="generateFiles(urlApi+'download-factura?criterio='+paramsTable.params.criterio+'&buscar='+paramsTable.params.buscar+'&zip=false')" target="_blank"
                                class="btn btn-dark btn-lg"
                                v-if="infoTables.data.length"
                              >
                                <i class="fas fa-file-export"></i> Generar Json x Factura en Servidor
                              </button>
                              <a
                                :href="urlApi+'download-factura?criterio='+paramsTable.params.criterio+'&buscar='+paramsTable.params.buscar" target="_blank"
                                class="btn btn-success btn-lg"
                                v-if="infoTables.data.length"
                              >
                                <i class="fas fa-cloud-download-alt"></i> Descargar Json General
                              </a>
                              <a
                                :href="urlApi+'download-factura?criterio='+paramsTable.params.criterio+'&buscar='+paramsTable.params.buscar+'&zip=true'" target="_blank"
                                class="btn btn-info btn-lg"
                                v-if="infoTables.data.length"
                              >
                                <i class="fas fa-cloud-download-alt"></i> Descargar Zip/Json x Factura
                              </a>
                            </div>
                          </div>
                        </form>
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
                            <div class="col-md-5 mt-1">
                                <strong>Cant. Registros:</strong> {{infoTables.total}}
                            </div>
                            <div class="col-md-12">
                                <table class="table table-responsive-xl table-sm">
                                    <thead>
                                        <tr>
                                            <th>Id Factura</th>
                                            <th>Prefijo</th>
                                            <th>Consecutivo/Num. Factura</th>
                                            <th>Facturado a</th>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Estado</th>
                                            <th>Sucursal</th>
                                            <th>Valor Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <!-- verificamos si el objeto es vacio -->
                                    <tbody v-if="!infoTables.data.length">
                                        <td colspan="7">
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
                                      <td>{{data.factura_id}}</td>
                                      <td>{{data.prefijo}}</td>
                                      <td>{{data.consecutivo}}</td>
                                      <td>
                                        <span v-for="cliente in data.listaAdquirentes" :key="cliente">
                                          {{cliente.nombreCompleto}}
                                        </span>
                                      </td>
                                      <td>{{data.fechafacturacion}}</td>
                                      <td>{{data.tipodocumentoDescripcion}}</td>
                                      <td>{{data.estado}}</td>
                                      <td>{{data.sucursal}}</td>
                                      <td>{{ priceFormatter(data.pago.totalfactura) }}</td>
                                      <td>
                                        <a :href="urlApi+'download-factura?idFactura='+data.factura_id" target="_blank" class="btn btn-outline-info" title="Generar Json">
                                          <i class="fas fa-file-download"></i>
                                        </a>
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
        urlApi: process.env.MIX_API_ORACLE,
        errors: [],
        tipo_modal: '',
        paramsTable: {
          apiExt: true,
          url_api: 'factura',
          params:{
            pagination: true,
            page: 1,
            criterio: 'todos',
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
            apiExt: true,
            params:{
              criterio: this.paramsTable.params.criterio,
              buscar: this.paramsTable.params.buscar,
              cant: this.paramsTable.params.cant
            }
          }
          this.$store.dispatch('getInfoTables', allParams)
        },
        priceFormatter(value){
          var formatter = new Intl.NumberFormat('es-US', {
            style: 'currency',
            currency: 'USD',
            maximumFractionDigits: 0
          });

          return formatter.format(value);
        },
        generateFiles(url){
          let me = this
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
            }else{
              me.$swal({
                position: 'top',
                icon: 'error',
                title: `${res.data.message}`,
                showConfirmButton: false,
                timer: 3000
              });
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
          })
        }
    },
}
</script>
<style lang="scss" scoped>
  .form_filters{
    border-bottom: 2px solid black;
  }
</style>
