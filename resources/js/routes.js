//importo vue
import Vue from 'vue';

//importo il router
import VueRouter from 'vue-router';

//gli dico d usarlo
Vue.use(VueRouter);

//importo i componenti di cui voglio le rotte
import HomeComp from './components/pages/HomeComp';
import AdvancedComp from './components/pages/AdvancedComp';
import TestComp from './components/pages/TestComp';


//creo il router
const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass :'active',

    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComp,
        },
        {
            path: '/advanced-research',
            name: 'advanced',
            component: AdvancedComp,
        },

    ]
});

//lo esporto
export default router;
