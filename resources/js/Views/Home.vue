<template>
    <v-locale-provider :rtl="locale === 'ar'" >
        <v-layout>
            <v-app  class=" custom-font"  :style="{background:$vuetify.theme.themes.dark.background} ">
                <sidebar :rail="rail" />
                <navbar @railEvent="rail = !rail" />
                <v-card>       ssssssssssssssssssssssssssssssssssssssss {{locale}}dddddddddddddddddddddddTr</v-card>
            </v-app>
        </v-layout>
    </v-locale-provider>
</template>
<script>
import Sidebar from '../components/sidebar/sidebar.vue';
import navbar from '../components/navbar/nav.vue';
import LangeSwitcher from "@/components/langswitch.vue"

import { useI18n } from 'vue-i18n';
export default {

    data:()=> ({
        rail:true
    }),
    setup() {
        const { t, locale } = useI18n()
        return{t, locale }
    },
  name: "Home",
  components: {Sidebar,LangeSwitcher ,navbar},
};
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap');
        .custom-font {
        font-family: "Cairo", sans-serif; /* or any other font size you want */
        }

</style>
