require('./bootstrap');

// Import modules...
import Vue from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';
import '@fortawesome/fontawesome-free/css/all.css';
import '@fortawesome/fontawesome-free/js/all.js';
import Toast from "vue-toastification";
import VueNumeric from 'vue-numeric';
import VueLoading from 'vuejs-loading-plugin';
import VueSwal from 'vue-swal/src/index.js';
import vClickOutside from 'v-click-outside';




/**
 * TOAS NOTIFICATIONS
 */
        //parametros del la libreria TOAS NOTIFICATIONS
        const optionsToas = {
            // You can set your default options here
        };
        Vue.use(Toast, optionsToas);//crea el objeto y le pasa los parametros


/**
 * LOADING SPINNER
 */
        //parametros para libreria LOADING SPINNER
        const optionsLoading = {
            dark: true, // default false
            text: 'Cargando', // default 'Loading'
            loading: false, // default false
            background: 'rgba(0,0,0,0.7)', // set custom background
        };
        Vue.use(VueLoading,optionsLoading);//crea el objeto y le pasa los parametros
/**
 *
 *
 */
Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(PortalVue);
Vue.use(VueNumeric);
Vue.use(VueSwal);
Vue.use(vClickOutside);


const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
