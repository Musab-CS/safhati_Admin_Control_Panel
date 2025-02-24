// import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp , router } from '@inertiajs/vue3'

import NProgress from 'nprogress'
import VueClickAway from "vue3-click-away";
import SnapAlert from 'vue-snap-alert';
import 'vue-snap-alert/dist/snapAlert.min.css'; // Import the CSS

import $ from "jquery";
//import router from './src/router';

import '&/assets/plugins/snap-dialog/snap-dialog.min.css'
import '&/assets/plugins/snap-dialog/snap-dialog.min.js'

import "&/assets/plugins/bootstrap-5.2.3/css/bootstrap.rtl.min.css";
import "&/assets/css/boxicons.min.css";
import "&/assets/css/font.css";
import "&/assets/css/custom-botstrap.css";
import "&/assets/css/main.css";
import "&/assets/css/auth.css";
import "&/assets/js/alpine.min";


import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();``
window.$ = window.jQuery = $;

createInertiaApp({

    title: title => 'OurInfo - '+`${title}`,

    resolve: name => {
        const pages = import.meta.glob('./src/**/*.vue', { eager: true })
        return pages[`./src/${name}.vue`]
    },

    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
        //.use(router)
        .use( plugin )
        .use(VueClickAway)
        .use(SnapAlert)
        .mount('body')
    },

    progress: { delay: 250, color: '##53b3cb', includeCSS: true, showSpinner: true, },
})

const isAuthenticated = () => {
    return localStorage.getItem('token') ? true : false;
};

const exceptAuth=[
    'pages/auth/login' ,
    'pages/auth/reset-password' ,
];

router.on('navigate' , (event) => {
    const target = event.detail.page.component;
    if( !exceptAuth.includes(target) && isAuthenticated() == false){
        router.visit('/auth/login')
    }
})


router.on('start', (event) => {
    NProgress.start();
});

router.on('finish', (event) => {
    if (event.detail.visit.completed) {
      NProgress.done()
    } else if (event.detail.visit.interrupted) {
      NProgress.set(0)
    } else if (event.detail.visit.cancelled) {
      NProgress.done()
      NProgress.remove()
    }
});

router.on('progress', (event) => {
    if (event.detail.progress.percentage) {
      NProgress.set((event.detail.progress.percentage / 100) * 0.9)
    }
});
