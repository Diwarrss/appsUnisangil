window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

//import vuex for vuejs
import Vuex from 'vuex'
Vue.use(Vuex)
    //import store for vuex
import store from './store/home.js';

//import global sweetalert vuejs
import VueSweetalert2 from 'vue-sweetalert2';
const options = {
    confirmButtonColor: '#41b882',
    cancelButtonColor: '#ff7674',
};
Vue.use(VueSweetalert2, options);

//import vue-select
import vSelect from 'vue-select'
Vue.component('v-select', vSelect)
import 'vue-select/dist/vue-select.css';

//import vue-tel-input
import VueTelInput from 'vue-tel-input'
Vue.use(VueTelInput)

Vue.component('headerhome', require('./components/Home/Header.vue').default);
Vue.component('footerhome', require('./components/Home/Footer.vue').default);
Vue.component('intro', require('./components/Home/Intro.vue').default);
Vue.component('services', require('./components/Home/Services.vue').default);
Vue.component('about', require('./components/Home/About.vue').default);
Vue.component('news', require('./components/Home/News.vue').default);
Vue.component('infrastructure', require('./components/Home/Infrastructure.vue').default);

//servicios
Vue.component('redes', require('./components/Home/Redes.vue').default);
Vue.component('seguridad', require('./components/Home/Seguridad.vue').default);
Vue.component('almacenamiento', require('./components/Home/Almacenamiento.vue').default);
Vue.component('directorio', require('./components/Home/Directorio.vue').default);
Vue.component('soporte', require('./components/Home/Soporte.vue').default);
Vue.component('sistemas', require('./components/Home/Sistemas.vue').default);
Vue.component('conceptos', require('./components/Home/Conceptos.vue').default);
Vue.component('cursos', require('./components/Home/Cursos.vue').default);
Vue.component('pruebas', require('./components/Home/Pruebas.vue').default);
Vue.component('licencias', require('./components/Home/Licencias.vue').default);

const app = new Vue({
    el: '#app',
    //le pasamos el Store vuex
    store: new Vuex.Store(store)
});