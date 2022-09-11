//importo vue
import Vue from 'vue';

//importo il router
import VueRouter from 'vue-router';

//gli dico d usarlo
Vue.use(VueRouter);

//importo i componenti di cui voglio le rotte
import HomeComp from './components/pages/HomeComp';
import AdvancedComp from './components/pages/AdvancedComp';
import AppartamentComp from './components/pages/AppartamentComp.vue';
import BecomeHostComp from './components/pages/BecomeHostComp';

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
        {
            path: '/appartament-details/:ann',
            name: 'app-details',
            component: AppartamentComp,
        },
        {
            path: '/become-host',
            name: 'become-host',
            component: BecomeHostComp,
        },
          


    ]
});

//lo esporto
export default router;
