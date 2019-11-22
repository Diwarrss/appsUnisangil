window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');
import VueRouter from "vue-router";
Vue.use(VueRouter);
//importamos nuestras rutas
import routes from './routes';

Vue.component('headeradmin', require('./components/Admin/Header.vue').default);
Vue.component('sidebard', require('./components/Admin/Sidebard.vue').default);
Vue.component('footeradmin', require('./components/Admin/Footer.vue').default);

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
});
