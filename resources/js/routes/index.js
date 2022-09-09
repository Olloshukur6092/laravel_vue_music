import { createRouter, createWebHashHistory } from 'vue-router';
import TheSinger from '../components/TheSinger';
import HomeView from '../components/HomeView';
import EditSinger from '../components/EditSinger';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: HomeView,
    },
    {
        path: '/singers',
        name: 'Singer',
        component: TheSinger,
    },
    {
        path: '/singers/edit/:singerId',
        name: 'EditSinger',
        component: EditSinger,

    },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;