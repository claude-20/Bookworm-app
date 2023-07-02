import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import { createApp } from 'vue';
import { createPinia } from 'pinia';

import './axios';
import App from './App.vue';
import router from './router';

const pinia = createPinia();
const app = createApp(App);
app.use(pinia);
app.use(router);

app.mount('#app');
