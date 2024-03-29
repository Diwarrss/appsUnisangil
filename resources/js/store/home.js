window.axios = require('axios');
export default {
    state: {
        dataNivels: [],
        dataCursos: [],
        programasPruebas: [
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
        programasCursos: [
            'Derecho (UNAB)',
            'Ingeniería Financiera (UNAB)',
            'Psicología (UNAB)'
        ],
        tiposDocPruebas: [
            'CC',
            'TI',
            'ID',
            'CE'
        ],
        tiposDocCursos: [
            'CC',
            'TI',
            'CE'
        ],
        dataSedes: {}
    },
    mutations: {
        setNivels(state, data) {
            state.dataNivels = data;
        },
        setCursos(state, data) {
            state.dataCursos = data;
        },
        setSedes(state, data) {
            state.dataSedes = data;
        }
    },
    actions: {
        getNiveles: async function({ commit }) {
            const data = await axios.get('nivel/getAll')
            commit('setNivels', data.data)
        },
        getCursos: async function({ commit }) {
            const data = await axios.get('curso/getAll')
            commit('setCursos', data.data)
        },
        getSedes: async function({ commit }) {
            const data = await axios.get('sede/getAll')
            commit('setSedes', data.data)
        },
    },
    getters: {
        doneNivels: state => {
            return state.dataNivels.map(dn => {
                return {
                    'nivel': dn.nombre + ': ' + dn.descripcion,
                    'id': dn.id
                }
            })
        },
        getCursoFilter: (state) => (id) => {
            return state.dataCursos.filter(dc => dc.sedes_id === id)
        }
    }
};
