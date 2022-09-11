require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');
import App from './App.vue';

import router from './routes';

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    router,

    render : h => h(App)
});

