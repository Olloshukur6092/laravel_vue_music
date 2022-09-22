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
        path: '/admin/dashboard',
        name: 'Home',
        component: HomeView,
    },
    {
        path: '/admin/singers',
        name: 'Singer',
        component: TheSinger,
    },
    {
        path: '/admin/singers/edit/:singerId',
        name: 'EditSinger',
        component: EditSinger,
    },
    {
        path: '/admin/song-lang',
        name: 'SongLang',
        component: SongLang,
    },
    {
        path: '/admin/song-genre',
        name: 'SongGenre',
        component: SongGenre,
    },
    {
        path: '/admin/songs',
        name: 'Songs',
        component: Songs,
    },
    {
        path: '/admin/song/add',
        name: 'AddSong',
        component: AddSong,
    },
    {
        path: '/admin/song/edit/:songId',
        name: 'EditSong',
        component: EditSong,
    },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;