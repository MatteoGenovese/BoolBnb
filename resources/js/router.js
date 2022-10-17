import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './pages/HomePage.vue';

const router = new VueRouter ({
    mode: 'history',
    routes: [
        {
            path:'/',
            name:'HomePage',
            component:HomePage
        }
    ]
})