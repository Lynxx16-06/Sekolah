import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import AOS from 'aos';
import 'aos/dist/aos.css';
import router from './router'
import Swal from 'sweetalert2';

const app = createApp(App)

app.use(router)

app.mount('#app')
AOS.init();