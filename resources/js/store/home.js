window.axios = require('axios');
export default {
    state: {
        dataNivels: []
    },
    mutations: {
        setNivels(state, data) {
            state.dataNivels = data;
        }
    },
    actions: {
        getNiveles: async function({ commit }) {
            const data = await axios.get('nivel/getAll')
            commit('setNivels', data.data)
        }
    },
    getters: {
        doneNivels: state => {
            return state.dataNivels.map(dn => {
                return {
                    'nivel': dn.nombre + ': ' + dn.descripcion,
                    'id': dn.id
                }
            })
        }
    }
};