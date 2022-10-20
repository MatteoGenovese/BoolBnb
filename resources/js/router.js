import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './pages/HomePage.vue';
import PropertyOverview from './pages/PropertyOverview.vue';
import AdvancedSearch from './pages/AdvancedSearch.vue';

const router = new VueRouter ({
    mode: 'history',
    routes: [
        {
            path:'/',
            name:'HomePage',
            component:HomePage
        },
        {
            path: '/ricerca-avanzata',
            name: 'AdvancedSearch',
            component: AdvancedSearch,
        },
        {
            path:'/abitazione/:id',
            name: 'SingleHome',
            component: PropertyOverview,
            props: true,
        }
    ]
})

export default router;