window.axios = require('axios');
export default {
    state: {
        dataUser: {},
        infoTables:{},
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
            let url_api = paramsTable.url_api
            let params = paramsTable.params
            let page = paramsTable.page

            if (!page) {//cuando viene el json completo en params
                const data = await axios.get(url_api,{
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
            //cuando viene el num de pagina y querramos cambiar
            else {
                const data = await axios.get(url_api,{
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
        },
    },
    getters: {

    }
};
