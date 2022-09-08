require('./bootstrap');
import { createApp } from 'vue';
import App from './App.vue';
import axios from 'axios'
import VueAxios from 'vue-axios';
import router from './routes';


createApp(App)
.use(VueAxios, axios)
.use(router)
.mount('#app');
