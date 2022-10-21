import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './pages/HomePage.vue';
import PropertyOverview from './pages/PropertyOverview.vue';
import AdvancedSearch from './pages/AdvancedSearch.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/',
            name: 'HomePage',
            component: HomePage
        },
        {
            path: '/ricerca-avanzata/:query?',
            name: 'AdvancedSearch',
            component: AdvancedSearch,
            props: true,
        },
        {
            path: '/abitazione/:id',
            name: 'SingleHome',
            component: PropertyOverview,
            props: true,
        }
    ]
})

export default router;