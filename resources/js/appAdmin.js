window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');
//importacion de libreria Vue Router
import VueRouter from "vue-router";
Vue.use(VueRouter);
//importando VUEX
import Vuex from "vuex";
Vue.use(Vuex);

//importamos nuestras rutas
import routes from './routes';
//importamos nuestro store de vuex
import store from './store';

//Components show auth
Vue.component('headeradmin', require('./components/Admin/Header.vue').default);
Vue.component('sidebard', require('./components/Admin/Sidebard.vue').default);
Vue.component('footeradmin', require('./components/Admin/Footer.vue').default);

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
    //le pasamos el Store importado
    store: new Vuex.Store(store)
});
