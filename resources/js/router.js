import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './pages/HomePage.vue';
import PropertyOverview from './pages/PropertyOverview.vue';

const router = new VueRouter ({
    mode: 'history',
    routes: [
        {
            path:'/',
            name:'HomePage',
            component:HomePage
        },
        {
            path:'/abitazione/:id',
            name: 'SingleHome',
            component: PropertyOverview,
        }
    ]
})

export default router;