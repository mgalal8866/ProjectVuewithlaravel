// import './bootstrap';
import { createApp } from "vue";
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

import store from "./store/index.js";
import router from "./router";
import We from "./Views/welcome.vue";

import { createI18n } from 'vue-i18n'
import en from './i18n/en.js'
import ar from './i18n/ar.js'

const i18n = createI18n({
    locale: 'en',
    messages: {
        en,
        ar
    }
})

const vuetify = createVuetify({
    components,
    directives,
})
createApp(We).use(vuetify).use(store).use(i18n).use(router).mount("#app");