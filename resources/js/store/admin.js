window.axios = require('axios');
export default {
    state: {
      dataUser: {},
      infoTables:{},
      loading: false
    },
    mutations: {
        setDataUser(state, data) {
          state.dataUser = data;
        },
        setInfoTables(state, actionGet){
          state.infoTables = actionGet
        },
    },
    actions: {
        getDataUser: async function({ commit, state }) {
            const data = await axios.get('user/getData')
            commit('setDataUser', data.data[0])
        },
        getInfoTables: function ({commit, state}, paramsTable) {
            let nameUrl = paramsTable.url_api
            let params = paramsTable.params
            let page = paramsTable.page
            var apiExt = paramsTable.apiExt

            if (!page) {//cuando viene el json completo en params
              if (apiExt) {
                let urlApi = process.env.MIX_API_ORACLE
                axios.get(urlApi + nameUrl, {
                  params:{
                    page: params.page,
                    criterio: params.criterio,
                    buscar: params.buscar,
                    prefijo: params.prefijo,
                    tipoFactura: params.tipoFactura,
                    cant: params.cant,
                    sede: state.dataUser.sedes_id
                  }
                })
                .then(res => {
                  const dataTable = res.data
                  commit('setInfoTables', dataTable)
                  if(res.data.type === 'error'){
                    Vue.swal({
                      position: 'top',
                      icon: 'warning',
                      title: `${res.data.message}`,
                      showConfirmButton: false,
                      timer: 2500
                    });
                  }
                  //console.log(res)
                })
                .catch(err => {
                  state.loading = false
                  console.error(err);
                })
              } else {
                axios.get(nameUrl,{
                  params:{
                    page: params.page,
                    criterio: params.criterio,
                    buscar: params.buscar,
                    prefijo: params.prefijo,
                    tipoFactura: params.tipoFactura,
                    cant: params.cant,
                    sede: state.dataUser.sedes_id
                  }
                })
                .then(res => {
                  const dataTable = res.data
                  commit('setInfoTables', dataTable)
                  //console.log(res)
                })
                .catch(err => {
                  console.error(err);
                  state.loading = false
                })
              }
            }
            //cuando viene el num de pagina y querramos cambiar
            else {
              if (apiExt) {
                let urlApi = process.env.MIX_API_ORACLE
                axios.get(urlApi + nameUrl, {
                  params:{
                    page: page,
                    criterio: params.criterio,
                    buscar: params.buscar,
                    prefijo: params.prefijo,
                    tipoFactura: params.tipoFactura,
                    cant: params.cant,
                    sede: state.dataUser.sedes_id
                  }
                })
                .then(res => {
                  const dataTable = res.data
                  commit('setInfoTables', dataTable)
                  //console.log(res)
                })
                .catch(err => {
                  console.error(err);
                  state.loading = false
                })
              } else {
                axios.get(nameUrl,{
                  params:{
                    page: page,
                    criterio: params.criterio,
                    buscar: params.buscar,
                    prefijo: params.prefijo,
                    tipoFactura: params.tipoFactura,
                    cant: params.cant,
                    sede: state.dataUser.sedes_id
                  }
                })
                .then(res => {
                  const dataTable = res.data
                  commit('setInfoTables', dataTable)
                  //console.log(res)
                })
                .catch(err => {
                  console.error(err);
                  state.loading = false
                })
              }
            }
        },
    },
    getters: {

    }
};
