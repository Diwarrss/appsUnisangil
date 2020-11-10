window.axios = require('axios');
export default {
    state: {
        dataUser: {},
        infoTables:{},
        popos: 5
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
        getInfoTables: async function ({commit, state}, paramsTable) {
            let nameUrl = paramsTable.url_api
            let params = paramsTable.params
            let page = paramsTable.page
            var apiExt = paramsTable.apiExt

            if (!page) {//cuando viene el json completo en params
              if (apiExt) {
                let urlApi = process.env.MIX_API_ORACLE
                const data = await axios.get(urlApi + nameUrl, {
                  params:{
                    page: params.page,
                    criterio: params.criterio,
                    buscar: params.buscar,
                    cant: params.cant,
                    sede: state.dataUser.sedes_id
                  }
                })
                const dataTable = data.data
                commit('setInfoTables', dataTable)
              } else {
                const data = await axios.get(nameUrl,{
                    params:{
                        page: params.page,
                        criterio: params.criterio,
                        buscar: params.buscar,
                        cant: params.cant,
                        sede: state.dataUser.sedes_id
                    }
                })
                const dataTable = data.data
                commit('setInfoTables', dataTable)
              }
            }
            //cuando viene el num de pagina y querramos cambiar
            else {
              if (apiExt) {
                let urlApi = process.env.MIX_API_ORACLE
                const data = await axios.get(urlApi + nameUrl, {
                  params:{
                    page: page,
                    criterio: params.criterio,
                    buscar: params.buscar,
                    cant: params.cant,
                    sede: state.dataUser.sedes_id
                  }
                })
                const dataTable = data.data
                commit('setInfoTables', dataTable)
              } else {
                const data = await axios.get(nameUrl,{
                    params:{
                        page: page,
                        criterio: params.criterio,
                        buscar: params.buscar,
                        cant: params.cant,
                        sede: state.dataUser.sedes_id
                    }
                })
                const dataTable = data.data
                commit('setInfoTables', dataTable)
              }
            }
        },
    },
    getters: {

    }
};
