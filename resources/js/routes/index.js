import { createRouter, createWebHashHistory } from 'vue-router';
import TheSinger from '../components/singers/TheSinger';
import HomeView from '../components/HomeView';
import EditSinger from '../components/singers/EditSinger';
import SongLang from '../components/songslang/SongsLang';
import SongGenre from '../components/songgenre/SongGenre';
import Songs from '../components/songs/Songs';
import AddSong from '../components/songs/AddSong';
import EditSong from '../components/songs/EditSong';

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
    {
        path: '/song-lang',
        name: 'SongLang',
        component: SongLang,
    },
    {
        path: '/song-genre',
        name: 'SongGenre',
        component: SongGenre,
    },
    {
        path: '/songs',
        name: 'Songs',
        component: Songs,
    },
    {
        path: '/song/add',
        name: 'AddSong',
        component: AddSong,
    },
    {
        path: '/song/edit/:songId',
        name: 'EditSong',
        component: EditSong,
    },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;