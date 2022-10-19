import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import ContactPage from './pages/ContactPage.vue';
import AboutusPage from './pages/AboutusPage.vue';
import HomePage from './pages/HomePage.vue';

const router = new VueRouter({
    mode: "history",
    routes:[
        {
            path:'/',
            name: 'home',
            component: HomePage
            },
        {
            path:'/contact',
            name: 'contact',
            component: ContactPage
        },
        {
            path:'/aboutus',
            name: 'aboutus',
            component: AboutusPage
        }
    ]
});

export default router;
