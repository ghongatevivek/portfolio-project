import './bootstrap';

import { createApp } from 'vue';
import App from './components/New.vue'

import router from './router';
createApp(App).use(router).mount('#app');
