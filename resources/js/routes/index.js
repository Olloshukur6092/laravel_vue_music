import { createRouter, createWebHashHistory } from 'vue-router';
import TheSinger from '../components/TheSinger';
import HomeView from '../components/HomeView';

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomeView,
    },
    {
        path: '/singers',
        name: 'Singer',
        component: TheSinger,
    },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;