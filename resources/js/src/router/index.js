import { createRouter , createWebHistory } from 'vue-router';
import Home from '../pages/website/home.vue';
import Login from '../pages/website/auth/login.vue';

const routes  = [
    { path: '/' , name: 'home' , component : Home } ,
    { path: '/login' , name: 'login' , component : Login }
]

const router = createRouter({
    history : createWebHistory() ,
    routes
})

export default router
