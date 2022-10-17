import Vue from 'vue';
import VueRouter from 'vue-router';

window.Vue = require('vue');

Vue.use(VueRouter);

import App from './views/App.vue';
import router from './router.js';

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});