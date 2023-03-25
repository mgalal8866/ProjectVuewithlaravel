// import './bootstrap';
import { createApp } from "vue";
import 'vuetify/styles'
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import '@fortawesome/fontawesome-free/css/all.css';
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import '@mdi/font/css/materialdesignicons.css'
import store from "./store/index.js";
import router from "./router";
// import We from "./Views/welcome.vue";
import App from "./App.vue";


import i18n from "./i18n";



const vuetify = createVuetify({
    icons: {
        iconfont: 'fa' || 'md' || 'mdi'
    },
    theme: {
        themes: {
            dark: {
                background: '#f4f5f9'
            }
        }
    },
    components,
    directives,
})
createApp(App).use(store).use(i18n).use(router).use(vuetify).mount("#app");