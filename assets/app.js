// Importar CSS de Bootstrap
import 'bootstrap/dist/css/bootstrap.min.css';

// Importar JS de Bootstrap
import 'bootstrap';

/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

import { createApp } from 'vue'
import App from './vue/App.vue'

createApp(App).mount('#app')
