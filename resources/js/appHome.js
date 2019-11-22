window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

Vue.component('headerhome', require('./components/Home/Header.vue').default);
Vue.component('intro', require('./components/Home/Intro.vue').default);
Vue.component('footerhome', require('./components/Home/Footer.vue').default);

const app = new Vue({
    el: '#app',
});
