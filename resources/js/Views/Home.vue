<template>
   <v-app rtl :style="{background:$vuetify.theme.themes.dark.background}">
        <sidebar  :rail="rail"/>
        <navbar  @railEvent="rail = !rail" />
   </v-app>
</template>
<script>
import Sidebar from '../components/sidebar/sidebar.vue';
import navbar from '../components/navbar/nav.vue';
import LangeSwitcher from "@/components/langswitch.vue"
import Tr from "@/i18n/translation"
export default {
    data:()=> ({
        rail:true
    }),
    setup() {
     return{Tr}
    },
  name: "Home",
  components: {Sidebar,LangeSwitcher ,navbar},
};
</script>
